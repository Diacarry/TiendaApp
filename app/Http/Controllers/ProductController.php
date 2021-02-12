<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
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
        $data = Product::paginate(5);
        return view('product.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('product.register', [
            'marcas' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Product;
        $report->name = $request->get('nombre');
        $report->size = $request->get('size');
        $report->fk_brand = $request->get('fk_brand');
        $report->observations = $request->get('observations');
        $report->quantity = $request->get('quantity');
        $report->shipping_date = $request->get('shipping_date');
        $report->save();
        return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brands
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $brands = Brand::all();
        $data = Product::find($product);
        return view('product.edit', [
            'data' => $data,
            'marcas' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $report = Product::find($product);
        $report->name = $request->get('nombre');
        $report->size = $request->get('size');
        $report->fk_brand = $request->get('fk_brand');
        $report->observations = $request->get('observations');
        $report->quantity = $request->get('quantity');
        $report->shipping_date = $request->get('shipping_date');
        $report->save();
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $registro = Product::find($product);
        $registro->delete();
        return redirect('productos');
    }
}
