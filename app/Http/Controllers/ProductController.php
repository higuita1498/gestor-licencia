<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\PartnerType;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'ProductName' => 'required',
                'ProductStatus' => 'required',
                'NumberOfLicenses' => 'required',
                'LicenseDuration' => 'required',
                'IdProduct' => 'required'
            ]);

            $product = Product::create($request->all());

            return back()->withStatus(__('Producto '.$product->ProductName.' creado correctamente.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        if(!$product){
            return back();
        }


        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'ProductName' => 'required',
            'ProductStatus' => 'required',
            'NumberOfLicenses' => 'required',
            'LicenseDuration' => 'required',
            'IdProduct' => 'required'
        ]);

         $product->update($request->all());

         return back()->withStatus(__('Producto '.$product->id.' actualizado correctamente.'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
