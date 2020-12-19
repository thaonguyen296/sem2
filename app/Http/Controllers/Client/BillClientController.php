<?php

namespace App\Http\Controllers\Client;

use App\Tracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class BillClientController extends Controller
{
    public function __construct()
    {
        session_start();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($_SESSION['cart']) {
            if (isset($_SESSION['cart'])) {
                return view('client.checkout');
//                return redirect('cart');
            } else {
                return redirect('cart');
            }
        }
        return redirect('cart');
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
        $quantity = 0;
        $total = 0;
        foreach ($_SESSION['cart'] as $cart) {
            $quantity += $cart['number']; //số lượng sản phẩm có trong cart
            $total += $cart['number']*$cart['price']; //tổng tiền
        }
        $table = new Order(); //tạo dữ liệu bill
        $table->user_id = Auth::user()->id;
        $table->name = $request->name;
        $table->email = $request->email;
        $table->phone_number = $request->number;
        $table->address = $request->address;
        $table->quantity = $quantity;
        $table->total = $total;
        $table->note = $request->note;
        $table->payment = $request->payment;
        $table->save();
        $table = Order::find($table->id);  //tạo code cho bill
        if ($request->payment == 0) {
            $table->code = 'CD1000'.($table->id+15);
        } elseif ($request->payment == 1) {
            $table->code = 'PK1000'.($table->id+15);
        }
        $table->save();
        foreach ($_SESSION['cart'] as $session_cart) { //lưu chi tiết những sản phẩm theo bill
            $cart = new Cart();
            $cart->product_id = $session_cart['id'];
            $cart->order_id = $table->id;
            $cart->number_product = $session_cart['number'];
            $cart->save();
        }
        if ($request->payment == 0) {
            $track = new Tracking();
            $track->order_id = $table->id;
            $track->status = 0;
            $track->save();
            session_unset();
            return redirect('/bill_'.$table->code);
        } elseif ($request->payment == 1) {
            return redirect('/credit')->with( ['id_bill' => $table->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
