<?php

namespace App\Http\Controllers;

use App\Models\Licor;
use Illuminate\Http\Request;

class LicorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licors = Licor::all();
        return view('licor.index', compact('licors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('licor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Licor::create($request->all());
        return redirect()->route('licor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Licor $licor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licor $licor)
    {
        return view('licor.edit', compact('licor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licor $licor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licor $licor)
    {
        //
    }
}
