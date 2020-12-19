<?php

namespace App\Http\Controllers\Client;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_SESSION['cart'])) {
            return view('client.cart');
        } else {
            $cart = $_SESSION['cart'];
            return view('client.cart', compact('cart'));
        }
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
    public function store(Request $request, $id)
    {
//        nhận number từ ajax post
        $number = $_POST['number'];

        $product = Product::find($id);
        $name = $product->name;
        $img = $product->image;
        $price = $product->price;

        if(isset($id)&& isset($number)) {

            if (!isset($_SESSION['cart'])) {
                $cart = array(); //tạo array cart
                $cart[$id] = array(
                    'id' => $id,
                    'image' => $img,
                    'name' => $name,
                    'price' => $price,
                    'number' => $number,
                );
            } else {
                $cart = $_SESSION['cart'];
                if (array_key_exists($id, $cart)) { //kiểm tra key
                    $cart[$id] = array(
                        'id' => $id,
                        'image' => $img,
                        'name' => $name,
                        'price' => $price,
                        'number' => (int)$cart[$id]['number'] + $number,
                    );
                } else {
                    $cart[$id] = array(
                        'id' => $id,
                        'image' => $img,
                        'name' => $name,
                        'price' => $price,
                        'number' => $number,
                    );
                }
            }
        }
        $quantity = 0;
        $_SESSION['cart'] = $cart;
        //ajax
        foreach ($cart as $cart) {
            $quantity += $cart['number'];
        }
        print_r($quantity);
        die;
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
        $number = $request->number;
        $validatedData = Validator::make($request->all(),[
            'number' => ['required', 'numeric', 'min:1','max:100'],
        ]);
        if ($validatedData->fails())
        {
            return response()->json(['error'=>$validatedData->errors()->all()]);
        } else {
            if (isset($id) && isset($number)) {
                $cart = $_SESSION['cart'];
                if (array_key_exists($id, $cart)) {
                    if ($number) {
                        $cart[$id] = array(
                            'id' => $cart[$id]['id'],
                            'image' => $cart[$id]['image'],
                            'name' => $cart[$id]['name'],
                            'price' => $cart[$id]['price'],
                            'number' => $number,
                        );
                    } else {
                        unset($cart['id']);
                    }
                    $price = $cart[$id]['price'];
                    $quantity = 0;
                    $_SESSION['cart'] = $cart;
                    foreach ($_SESSION['cart'] as $cart) {
                        $quantity += $cart['number'];
                    }
                    $data = [$quantity, $price];
                    print_r(json_encode($data));
                    die;
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = $_SESSION['cart'];  //để gọi ss
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
        $quantity = 0;
        foreach ($cart as $cart) {
            $quantity += $cart['number'];
        }
        print_r($quantity);
        //trả dữ liệu về client (giỏ hàng)
        die;
    }
}
