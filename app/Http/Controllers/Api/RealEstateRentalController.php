<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RealEstateRental\RealEstateRentalRequest;
use App\Http\Resources\RealEstateRentalResource;
use App\Models\RealEstateRental;
use Illuminate\Http\Request;

class RealEstateRentalController extends Controller
{
    public function index(Request $request)
    {
        $realEstateRentals = RealEstateRental::with(['real_estate', 'payment_frequency'])->filter($request->all())->paginate(15);
        return RealEstateRentalResource::collection($realEstateRentals)->additional(['success' => true]);
    }

    public function store(RealEstateRentalRequest $request)
    {
        $realEstateRental = RealEstateRental::create($request->validated());
        return $this->return_success(new RealEstateRentalResource($realEstateRental));
    }

    public function show(RealEstateRental $realEstateRental)
    {
        return $this->return_success(new RealEstateRentalResource($realEstateRental));
    }

    public function update(RealEstateRentalRequest $request, RealEstateRental $realEstateRental)
    {
        $realEstateRental->update($request->validated());
        return $this->return_success(new RealEstateRentalResource($realEstateRental));
    }

    public function destroy(RealEstateRental $realEstateRental)
    {
        $realEstateRental->delete();
        return $this->return_success();
    }

    public function restore(RealEstateRental $realEstateRental)
    {
        //
    }
}
