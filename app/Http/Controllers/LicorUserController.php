<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licor;
use App\Models\Categoria;
use App\Models\Archivo;

class LicorUserController extends Controller
{
    public function index()
    {
        // $licors = Licor::with('categoria:id,nombre')->with('archivo')->orderBy('nombre')->get();

        return view('user.index');

    }
}
