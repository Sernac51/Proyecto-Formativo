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
        return view('abastecimiento.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Abastecimiento::create($request->all());
        $producto = Products::findOrFail($request->products_id);
        $cantidadActual = $producto->Cantidad;
        $cantidadNueva = $cantidadActual + $request->cantidad_id;
        $producto->Cantidad = $cantidadNueva;
        $producto->save();

        return redirect()->route('abastecimiento.index')->with('exito', '¡El abastecimiento se a realizado satisfactoriamente!');;
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
        //
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
