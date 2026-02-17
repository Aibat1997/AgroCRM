<?php

namespace App\Http\Controllers\Api;

use App\DTO\RealEstateRentalDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RealEstateRental\RealEstateRentalRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\RealEstateRental\RealEstateRentalCollection;
use App\Http\Resources\RealEstateRental\RealEstateRentalResource;
use App\Models\RealEstateRental;
use App\Services\RealEstateRentalService;
use Illuminate\Http\Request;

class RealEstateRentalController extends Controller
{
    public function __construct(private readonly RealEstateRentalService $realEstateRentalService) {}

    public function index(Request $request)
    {
        $realEstateRentals = RealEstateRental::with('file')->filter($request->all())->paginate(15);
        return new RealEstateRentalCollection($realEstateRentals);
    }

    public function store(RealEstateRentalRequest $request)
    {
        $dto = RealEstateRentalDTO::fromArray($request->validated());
        $realEstateRental = $this->realEstateRentalService->store($dto);

        return new RealEstateRentalResource($realEstateRental);
    }

    public function show(RealEstateRental $realEstateRental)
    {
        return new RealEstateRentalResource($realEstateRental);
    }

    public function update(RealEstateRentalRequest $request, RealEstateRental $realEstateRental)
    {
        $dto = RealEstateRentalDTO::fromArray($request->validated());
        $this->realEstateRentalService->update($dto, $realEstateRental);

        return new RealEstateRentalResource($realEstateRental);
    }

    public function destroy(RealEstateRental $realEstateRental)
    {
        $realEstateRental->delete();
        return EmptyResource::success();
    }

    public function restore(RealEstateRental $realEstateRental)
    {
        //
    }
}
