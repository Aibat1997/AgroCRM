<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $author_id
 * @property string $description
 * @property \App\Enums\ApplicationStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application withoutTrashed()
 */
	class Application extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $identifier
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Debt> $debts
 * @property-read int|null $debts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client withoutTrashed()
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\CompanyBalance|null $balance
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Company> $childs
 * @property-read int|null $childs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Machinery> $machineries
 * @property-read int|null $machineries_count
 * @property-read Company|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Warehouse> $warehouses
 * @property-read int|null $warehouses_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company withoutTrashed()
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property int $balance
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CompanyBalance withoutTrashed()
 */
	class CompanyBalance extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $client_id
 * @property int $weigher_id
 * @property int|null $laboratorian_id
 * @property int $invoice_number
 * @property string $transport
 * @property int $gross_weight
 * @property int $container_weight
 * @property int $physical_weight
 * @property string|null $cotton_receiving_point
 * @property string|null $selective_variety
 * @property string|null $variety
 * @property int|null $pile
 * @property int|null $batch
 * @property string|null $picking_type
 * @property numeric|null $contamination
 * @property int|null $estimated_weight
 * @property numeric|null $humidity
 * @property int|null $conditioned_weight
 * @property int|null $price_per_kg
 * @property int|null $total_price
 * @property string $weighing_date
 * @property string|null $laboratory_date
 * @property \App\Enums\CottonPreparationStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\User|null $laboratorian
 * @property-read \App\Models\User $weigher
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereConditionedWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereContainerWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereContamination($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereCottonReceivingPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereEstimatedWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereGrossWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereHumidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereLaboratorianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereLaboratoryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation wherePhysicalWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation wherePickingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation wherePile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation wherePricePerKg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereSelectiveVariety($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereVariety($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereWeigherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation whereWeighingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPreparation withoutTrashed()
 */
	class CottonPreparation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $price
 * @property \App\Enums\CottonPurchasePriceType $purchase_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice wherePurchaseType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CottonPurchasePrice whereUserId($value)
 */
	class CottonPurchasePrice extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property string $bank_name
 * @property int $amount
 * @property int $term_in_months
 * @property int $payment_frequency_id
 * @property int $payment_frequency_amount
 * @property string $description
 * @property string $receipt_date
 * @property \App\Enums\CreditStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\PaymentFrequency $paymentFrequency
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit wherePaymentFrequencyAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit wherePaymentFrequencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereReceiptDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereTermInMonths($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Credit withoutTrashed()
 */
	class Credit extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property numeric $in_local_currency
 * @property string $symbol
 * @property int $sort_num
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereInLocalCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereSortNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Currency withoutTrashed()
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property int $client_id
 * @property int $amount
 * @property int $percent
 * @property string $issued_at
 * @property string $due_date
 * @property string|null $description
 * @property bool $paid_with_raw_materials
 * @property \App\Enums\DebtStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Transactionable|null $transactionable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereIssuedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt wherePaidWithRawMaterials($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt withoutTrashed()
 */
	class Debt extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $fileable_type
 * @property int $fileable_id
 * @property string $original_name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $fileable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereFileableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|File withoutTrashed()
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string|null $identifier
 * @property int $quantity
 * @property string|null $note
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Machinery withoutTrashed()
 */
	class Machinery extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property int $author_id
 * @property int|null $client_id
 * @property int|null $payment_method_id
 * @property int $total_amount
 * @property \App\Enums\OrderStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\PaymentMethod|null $paymentMethod
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order withoutTrashed()
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $order_id
 * @property int $warehouse_item_id
 * @property int $unit_price
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\WarehouseItem $warehouseItem
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct whereWarehouseItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProduct withoutTrashed()
 */
	class OrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentFrequency withoutTrashed()
 */
	class PaymentFrequency extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PaymentMethod withoutTrashed()
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $real_estate_type_id
 * @property string $address
 * @property numeric $area
 * @property int $unit_id
 * @property string|null $cadastral_number
 * @property string|null $rented_from
 * @property string|null $rented_to
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\RealEstateType $realEstateType
 * @property-read \App\Models\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereCadastralNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereRealEstateTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereRentedFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereRentedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstate withoutTrashed()
 */
	class RealEstate extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $real_estate_id
 * @property int $client_id
 * @property string $from_date
 * @property string|null $to_date
 * @property int $payment_frequency_id
 * @property int $amount
 * @property numeric|null $area
 * @property int|null $unit_id
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\File|null $file
 * @property-read \App\Models\PaymentFrequency $paymentFrequency
 * @property-read \App\Models\RealEstate $realEstate
 * @property-read \App\Models\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental wherePaymentFrequencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereRealEstateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateRental withoutTrashed()
 */
	class RealEstateRental extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateType withoutTrashed()
 */
	class RealEstateType extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $transaction_type_id
 * @property int $company_id
 * @property int $author_id
 * @property int $amount
 * @property string $description
 * @property bool $is_income
 * @property \App\Enums\TransactionStatus $status
 * @property string $committed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\Order|null $order
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransactionDetail> $transactionDetails
 * @property-read int|null $transaction_details_count
 * @property-read \App\Models\TransactionType $transactionType
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCommittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereIsIncome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTransactionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction withoutTrashed()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $transaction_id
 * @property int $transaction_form_field_id
 * @property string $field_value
 * @property-read \App\Models\Transaction $transaction
 * @property-read \App\Models\TransactionFormField $transactionFormField
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDetail whereFieldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDetail whereTransactionFormFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionDetail whereTransactionId($value)
 */
	class TransactionDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $parent_id
 * @property string $field_title_ru
 * @property string $field_title_kk
 * @property string $field_tag
 * @property string $field_name
 * @property string|null $field_type
 * @property string|null $field_values_url
 * @property array<array-key, mixed>|null $field_attributes
 * @property string|null $field_validation
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $field_title
 * @property-read \App\Models\TransactionTypeFormField|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransactionType> $transactionTypes
 * @property-read int|null $transaction_types_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldValidation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereFieldValuesUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionFormField withoutTrashed()
 */
	class TransactionFormField extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TransactionTypeFormField|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransactionFormField> $formFields
 * @property-read int|null $form_fields_count
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionType withoutTrashed()
 */
	class TransactionType extends \Eloquent {}
}

namespace App\Models{
/**
 * @property-read \App\Models\TransactionFormField|null $transactionFormField
 * @property-read \App\Models\TransactionType|null $transactionType
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionTypeFormField filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionTypeFormField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionTypeFormField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransactionTypeFormField query()
 */
	class TransactionTypeFormField extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $transaction_id
 * @property string $transactionable_type
 * @property int $transactionable_id
 * @property-read \App\Models\Transaction $transaction
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $transactionable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable whereTransactionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transactionable whereTransactionableType($value)
 */
	class Transactionable extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property \App\Enums\UnitType $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit withoutTrashed()
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $role_id
 * @property int|null $company_id
 * @property string $name
 * @property string $phone
 * @property string|null $avatar
 * @property int|null $salary
 * @property string|null $device_token
 * @property string $password
 * @property \App\Enums\UserStatus $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Application> $applications
 * @property-read int|null $applications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $oauthApps
 * @property-read int|null $oauth_apps_count
 * @property-read \App\Models\UserRole $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTask> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent implements \Laravel\Passport\Contracts\OAuthenticatable {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title_ru
 * @property string|null $title_kk
 * @property string $code_type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereCodeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserRole withoutTrashed()
 */
	class UserRole extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $author_id
 * @property int $executor_id
 * @property string $title
 * @property string|null $description
 * @property string $start_date
 * @property string $finish_date
 * @property \App\Enums\UserTaskStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\User $executor
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereExecutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereFinishDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTask withoutTrashed()
 */
	class UserTask extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WarehouseItem> $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warehouse withoutTrashed()
 */
	class Warehouse extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $warehouse_id
 * @property string $title
 * @property string|null $article_number
 * @property int $quantity
 * @property int $unit_id
 * @property int $currency_id
 * @property numeric $currency_rate
 * @property numeric $original_unit_price
 * @property int $unit_price
 * @property string|null $supplier
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Currency $currency
 * @property-read \App\Models\Unit $unit
 * @property-read \App\Models\Warehouse $warehouse
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem filter($filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereArticleNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereCurrencyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereOriginalUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem whereWarehouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WarehouseItem withoutTrashed()
 */
	class WarehouseItem extends \Eloquent {}
}

