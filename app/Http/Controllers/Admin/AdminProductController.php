<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Manufacturer;
use App\Category;
use JD\Cloudder\Facades\Cloudder;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all()->sortByDesc('created_at');
        return view('admin.product.list_product', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturer = Manufacturer::all();
        $category = Category::all();
        return view('admin.product.add_product', compact('manufacturer','category'));
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
            'code_product' => 'required',
            'product_name' => 'required|string|min:2',
            'image' => 'required',
            'price' => 'required|numeric|min:0.5',
            'detail' => 'required|string|min:10',
            'trending' => 'required',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
        ]);
        // up ảnh lên server cloudinary
        $image = $request->file('image');
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        // list($width, $height) = getimagesize($image_name);
        $image_id = Cloudder::getPublicId();
        $image->move(public_path("uploads"));

        $table = new Product();
        $table->code_product = $request->code_product;
        $table->name = $request->product_name;
        $table->image = $image_id;
        $table->price = $request->price;
        $table->detail = $request->detail;
        $table->manufacturer_id = $request->manufacturer_id;
        $table->category_id = $request->category_id;
        $table->trending = $request->trending;
        $table->save();
        return redirect('/admin/list_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $product = Product::find($id);
//        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $manufacturer = Manufacturer::all();
        $category = Category::all();
        return view('admin.product.edit_product',compact('manufacturer','category','product'));
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
        $request->validate([
            'code_product' => 'required',
            'product_name' => 'required|string|min:2',
            'price' => 'required|numeric|min:0.5',
            'detail' => 'required|string|min:10',
            'trending' => 'required',
            'manufacturer_id' => 'required',
            'category_id' => 'required',
        ]);
        $table = Product::find($id);
        $table->code_product = $request->code_product;
        $table->name = $request->product_name;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            // list($width, $height) = getimagesize($image_name);
            $image_id = Cloudder::getPublicId();
            $image->move(public_path("uploads"));

            $table->image = $image_id;
        }
        $table->detail = $request->detail;
        $table->price = $request->price;
        $table->manufacturer_id = $request->manufacturer_id;
        $table->category_id = $request->category_id;
        $table->trending = $request->trending;
        $table->save();
        return redirect('/admin/list_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Product::find($id);
        $table->delete();
        return redirect('/admin/list_product');
    }
}
