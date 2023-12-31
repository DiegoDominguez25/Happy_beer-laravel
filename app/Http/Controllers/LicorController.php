<?php

namespace App\Http\Controllers;

use App\Models\Licor;
use App\Models\Categoria;
use App\Models\Archivo;
use Illuminate\Http\Request;
use App\Http\Requests\LicorRequest;
use RealRashid\SweetAlert\Facades\Alert;

class LicorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:licor.index');
    }

    public function index()
    {
        /*
            Retornarmos la vista con la varible a la que se pueden acceder a todos los datos
            y la utilizamos en la vista como nos sirva.

        $licors = Licor::with('categoria:id,nombre')->orderBy('nombre')->get();
        return view('licor.index', compact('licors'));
        */
        return view('licor.index');
    }

    public function create()
    {
        /*Retornamos la vista en dónde tenemos el formulario para crear con los datos
        de la tabla relacionada*/
        $categorias = Categoria::all();
        return view('licor.create', compact('categorias'));
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
        $licor = new Licor($request->all());
        $categoria = Categoria::find($request->categoria_id);
        $categoria->licors()->save($licor);


        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo')->store('archivos', 'public');
            $licor->archivo()->create(['ruta' => $archivo]);
        }



        return redirect()->route('licor.index')->with('success','Producto agregado con éxito.');
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
        $categorias = Categoria::all();
        return view('licor.edit', compact('licor','categorias'));
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
        $categoria = Categoria::find($request->categoria_id);
        $categoria->licors()->save($licor);
        $licor->update($request->all());

        //Alert::success('Guardado', 'Los cambios han sido guardados');
        return redirect()->route('licor.index')->with('success','Producto editado con éxito.');
    }

    public function destroy(Licor $licor)
    {
        $licor->delete();
        return redirect()->route('licor.index');
    }
}
