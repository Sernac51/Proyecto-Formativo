<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\products;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Gate;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $categoria = Categorias::findOrFail($id);
        if($request)
        {
            $query = $request->buscar;
            $products = Products::where('nombre','like', '%'. $query . '%')
                                    ->orderBy('nombre','asc')
                                    ->paginate(5);
            return view('products.index', compact('products','query'));
        }
        // Obtener todos los registros 
        $products = Products::orderBy('nombre', 'asc')->paginate(6);
        
        // enviar a la vista
        return view('products.index', compact('products'));
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
            return redirect()->route('products.index');
        }
        //consultar categorias
        $categorias = Categorias::orderBy('nombre', 'asc')
                            ->get();
        //enviar a la vist
        return view('products.insert', compact('categorias'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /////////////////pendiente aqui////////////////////////////////////////
        $datosProducts = $request->except('_token');
        Products::insert($datosProducts);

        // $nombre = $request->nombre;
        // $precio = $request->precio;
        // $cantidad = $request->Cantidad;
        
        // echo $request;   
        // Products::create($request->all());
 
        return redirect()->route('products.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /////////////////pendiente aqui////////////////////////////////////////
        if(Gate::denies('administrador'))
        {
            return redirect()->route('products.index');
        }
        $products = Products::join('categorias','products.categorias_id','categorias.id')
                                            ->select('products.id','products.nombre', 
                                            'products.precio', 'products.Cantidad',
                                            'categorias.nombre as categorias')
                                            ->where('products.id',$id)
                                            ->first();
        // $products = products::findOrFail($id);
        return view('products.show', compact('products'));
    
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $products = Products::findOrFail($id);
        $categoria = Categorias::orderBy('nombre', 'asc')
                                ->get();
        return view('products.edit', compact('products', 'categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request ,$id)
    {
        $products = Products::findOrFail($id);   
        // $products->nombre = $request->nombre;
        // $products->precio = $request->precio;
        // $products->Cantidad = $request->Cantidad;
        // $products->save();     
        $products->update($request->all());
        return redirect()->route('products.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('products.index');
        }
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('products.index');
    }
}
