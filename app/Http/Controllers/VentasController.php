<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Ventas::join('products','products.categoria_id','products.id')
                            ->select('products.id','products.nombre', 
                            'products.precio', 'products.Cantidad',
                            'categorias.nombre as categorias')
                            ->where('products.id',$id)
                            ->first();
        //consultar productos
        $products = Products::orderBy('nombre', 'asc')
                                ->get();
        return view('ventas.index', compact('products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ventas $ventas)
    {
        //
    }
}
