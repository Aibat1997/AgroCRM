<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Machinery\StoreMachineryRequest;
use App\Http\Requests\Api\Machinery\UpdateMachineryRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\Machinery\MachineryCollection;
use App\Http\Resources\Machinery\MachineryResource;
use App\Models\Machinery;
use Illuminate\Http\Request;

class MachineryController extends Controller
{
    public function index(Request $request)
    {
        $machineries = Machinery::with('company')->filter($request->all())->paginate(15);
        return new MachineryCollection($machineries);
    }

    public function store(StoreMachineryRequest $request)
    {
        $machinery = Machinery::create($request->validated());
        return new MachineryResource($machinery);
    }

    public function show(Machinery $machinery)
    {
        return new MachineryResource($machinery);
    }

    public function update(UpdateMachineryRequest $request, Machinery $machinery)
    {
        $machinery->update($request->validated());
        return new MachineryResource($machinery);
    }

    public function destroy(Machinery $machinery)
    {
        $machinery->delete();
        return EmptyResource::success();
    }

    public function restore(Machinery $machinery)
    {
        //
    }
}
