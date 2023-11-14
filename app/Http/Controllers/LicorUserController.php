<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licor;
use App\Models\Categoria;

class LicorUserController extends Controller
{
    public function index()
    {
        return view('user.index');

    }
}
