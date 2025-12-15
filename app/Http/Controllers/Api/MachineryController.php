<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Machinery\StoreMachineryRequest;
use App\Http\Requests\Api\Machinery\UpdateMachineryRequest;
use App\Http\Resources\MachineryResource;
use App\Models\Machinery;
use Illuminate\Http\Request;

class MachineryController extends Controller
{
    public function index(Request $request)
    {
        $machineries = Machinery::with(['company', 'driver'])->filter($request->all())->paginate(15);
        return MachineryResource::collection($machineries)->additional(['success' => true]);
    }

    public function store(StoreMachineryRequest $request)
    {
        $machinery = Machinery::create($request->validated());
        return $this->return_success(new MachineryResource($machinery));
    }

    public function show(Machinery $machinery)
    {
        return $this->return_success(new MachineryResource($machinery));
    }

    public function update(UpdateMachineryRequest $request, Machinery $machinery)
    {
        $machinery->update($request->validated());
        return $this->return_success(new MachineryResource($machinery));
    }

    public function destroy(Machinery $machinery)
    {
        $machinery->delete();
        return $this->return_success();
    }

    public function restore(Machinery $machinery)
    {
        //
    }
}
