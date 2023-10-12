<?php

namespace App\Http\Controllers;

use App\Models\Licor;
use Illuminate\Http\Request;
use App\Http\Requests\LicorRequest;

class LicorController extends Controller
{
    public function index()
    {
        /*
            Retornarmos la vista con la varible a la que se pueden acceder a todos los datos
            y la utilizamos en la vista como nos sirva.
        */
        $licors = Licor::all();
        return view('licor.index', compact('licors'));
    }

    public function create()
    {
        //Retornamos la vista en dónde tenemos el formulario para crear.
        return view('licor.create');
    }

    //Reglas de validación en LicorRequest
    public function store(LicorRequest $request)
    {

        /*
            Al tener el mismo nombre en el formulario en su campo "name" que como se llaman las columnas
            en la base de datos, podemos meter los datos con una sola línea de código sin la necesidad de
            crear un array para asignar para que va cada cosa.
            
            Licor::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ])
        */
        Licor::create($request->all());
        return redirect()->route('licor.index')->with('success', 'Licor añadido');
    }

    public function show(Licor $licor)
    {
        return view('licor.show', compact('licor'));
    }

    public function edit(Licor $licor)
    {
        /* 
            Retornamos la vista en dónde tenemos el otro formulario para editar.
            Y al tener ya en parametro la variable que vamos a editar, no es necesario buscarla.

            $licor = Licor::find($licor);

        */
        return view('licor.edit', compact('licor'));
    }

    //Reglas de validación en LicorRequest
    public function update(LicorRequest $request, Licor $licor)
    {
        /* 
            Al igual que en la funcion de store, como tienen mismo nombre en su campo nombre y
            base de datos simplemente usamos una sola línea de código.

            $licor = Licor::find($licor);
            $licor->nombre = $request->nombre;
            $licor->descripcion = $request->descripcion;
            $licor->save();

        */
        $licor->update($request->all());
        return redirect()->route('licor.index')->with('success','Licor editado');
    }

    public function destroy(Licor $licor)
    {
        $licor->delete();
        return redirect()->route('licor.index')->with('danger', 'Licor borrado');
    }
}