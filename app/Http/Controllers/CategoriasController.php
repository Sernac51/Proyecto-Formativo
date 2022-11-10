<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\products;
use Illuminate\Http\Request;
use Gate;
use Auth;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if($request)
        {
            $query = $request->buscar;
            $categorias = Categorias::where('nombre','like', '%'. $query . '%')
                                    ->orderBy('nombre','asc')
                                    ->paginate(5);
            return view('categorias.index', compact('categorias','query'));
        }
        // Obtener todos los registros 
        $categorias = Categorias::orderBy('nombre','asc')->paginate(6);

        // enviar a la vista
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('categorias.index');
        }
        return view('categorias.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->nombre;

        Categorias::create($request->all());

        return redirect()->route('categorias.index')->with('exito', '¡La categoria se a creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = Categorias::findOrFail($id);
        $products = Products::where('categoria_id',$id)
                                            ->orderBy('nombre','asc')
                                            ->get();
        return view('categorias.show', compact('categorias', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('categorias.index');
        }
        $categorias = Categorias::findOrFail($id);
        return view('categorias.edit', compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //depues de la coma: Categorias $categorias
    {
        $categorias = Categorias::findOrFail($id);
        //Metodo 1
        // $proyecto->nombre = $request->nombre;
        // $proyecto->save();

        //metodo 2
        $categorias->update($request->all());
        return redirect()->route('categorias.index')->with('exito', '¡El cambio se ha echo satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('categorias.index');
        }
        $categorias = Categorias::findOrFail($id);
        $categorias->delete();
        return redirect()->route('categorias.index');
    }
}
