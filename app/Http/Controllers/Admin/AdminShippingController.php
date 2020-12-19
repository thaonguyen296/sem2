<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Level;
use App\Order;
use App\Tracking;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Order::all()->sortByDesc('created_at');
        return view('admin.shipping.list_ship', compact('shippings'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_id = Order::where('code', $id)->first()->id;
        $cart = Cart::where('order_id', $order_id)->get();
        dd($cart);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippers = Level::where('level', 3)->get();
        $order = Order::where('code', $id)->first();
        return view('admin.shipping.edit_shipping', compact('order','shippers'));
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
        if (isset($request->shipper)) {
            $request->validate([
                'shipper' => 'required',
            ]);
        }
        $table = Tracking::where('order_id', $id)->first();
        if (isset($request->shipper)){
            $table->shipper = $request ->shipper;
        }
        if (isset($request->status)) {
            $table->status = $request->status;
        }
        $table->save();
        return redirect()->back();
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
