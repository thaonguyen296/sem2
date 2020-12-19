<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Category;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;


class ProductController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE' ,'%'.$request->value_search.'%')->paginate(9);
        return view('client.category', compact('products'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9); //phân trang
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        return view('client.category', compact('products','category','manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request)
    {
        $products = Product::where('manufacturer_id', $request->id_manufacturer)->where('category_id', $request->id_category)->paginate(9);
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        return view('client.category', compact('products','category','manufacturer'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('client.single-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
