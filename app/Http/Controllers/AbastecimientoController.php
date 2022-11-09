<?php

namespace App\Http\Controllers;

use App\Models\Abastecimiento;
use App\Models\products;
use Illuminate\Http\Request;

class AbastecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //consultar productos
        $products = Products::orderBy('nombre', 'asc')
                                ->get();
        return view('abastecimiento.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $datosAbastecimiento = $request->except('_token');
        // Products::insert($datosAbastecimiento);
 
        // return redirect()->route('abastecimiento.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');

        // $products_id = $request->products_id;
        // $cantidad_id= $request->cantidad;
        // $valor = $request->valor;

        // Abastecimiento::create($request->all());


        // return redirect()->route('abastecimiento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abastecimiento  $abastecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Abastecimiento $abastecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abastecimiento  $abastecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Abastecimiento $abastecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abastecimiento  $abastecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $abastecimiento = Abastecimiento::findOrFail($id);   
        // $datosAbastecimiento = $request->except(['_token','_method']);

        // Products::where('id',$id)->update($datosAbastecimiento);
        // return redirect()->route('abastecimiento.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');

        // $abastecimiento = Abastecimiento::findOrFail($id);
        //Metodo 1
        // $proyecto->nombre = $request->nombre;
        // $proyecto->duracion = $request->duracion;
        // $proyecto->save();

        //metodo 2
        // $abastecimiento->update($request->all());
        // return redirect()->route('abastecimiento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abastecimiento  $abastecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abastecimiento $abastecimiento)
    {
        //
    }
}
