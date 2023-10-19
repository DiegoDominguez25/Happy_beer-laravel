<?php

namespace App\Http\Controllers;

use App\Models\Licor;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LicorRequest;
use App\Http\Resources\LicorResource;

class ApiLicorController extends Controller
{
    public function index()
    {
        return LicorResource::collection(Licor::all());
    }

    public function store(LicorRequest $request)
    {
        $licor = Licor::create($request->all());
        return response()->json([
            'success' => true,
            'data' => new LicorResource($licor)
        ], 201);
    }

    public function show(string $id)
    {
        $licor = Licor::find($id);
        /*return response()->json($licor,200);*/
        return new LicorResource($licor);
    }

    public function update(LicorRequest $request, string $id)
    {
        /*$licor = Licor::find($id);
        $licor->nombre = $request->nombre;
        $licor->precio = $request->precio;
        $licor->barcodelicor->codigo = $request->barcodelicor->codigo;*/
        Licor::create($request->all());

        $licor->save();
        return response()->json([
            'success' => true,
            'data' => $licor
        ],200);
    }

    public function destroy(string $id)
    {
        Licor::find($id)->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
}
