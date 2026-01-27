<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\CurrencyCacheService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetFreshCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-fresh-currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get fresh currency rates';

    public function handle(CurrencyCacheService $currencyCacheService)
    {
        $url = 'https://nationalbank.kz/rss/rates_all.xml';
        $currencies = Currency::all();

        $response = Http::retry(3, 500)
            ->withHeaders(['Accept' => 'application/xml, text/xml, */*'])
            ->get($url);

        if (!$response->ok()) {
            $this->error("NBK request failed: HTTP {$response->status()}");
        }

        $xml = @simplexml_load_string($response->body());

        if ($xml === false) {
            $this->error('Failed to parse XML.');
            return self::FAILURE;
        }

        $items = $xml->channel->item;

        if (empty($items)) {
            $this->warn('No <item> nodes found in feed.');
        }

        foreach ($items as $item) {
            $code = strtoupper(trim((string) $item->title));
            $available_codes = $currencies->pluck('title_ru')->toArray();

            if (in_array($code, $available_codes)) {
                Currency::where('title_ru', $code)->update(['in_local_currency' => (float) $item->description]);
            }
        }

        $currencyCacheService->clearCache();
        $currencyCacheService->warmupCache();

        $this->info('Currency rates updated successfully.');
    }
}
