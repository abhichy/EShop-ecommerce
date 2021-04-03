<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\model\Product\Product;
use Session;

class CartController extends Controller
{

    public function add_to_cart(Request $request)
    {
        // return $request->all();
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'qty' => $request->qty,
            'price' => $product->product_price,
            'weight' => 550,
            'options' =>
                [
                    'image' => $product->product_image,
                    'discount' => $product->discount,
                    'percent' => $product->discount_percent,
                ],
            ]);
        //Cart::tax(0);
        //     return back();

        $count=Cart::content()->count();
        $data=array(
            "count" => $count,
        );
        echo json_encode($data);

    }

    public function isCartExist(){
        $total = Cart::subtotal();
        $data=array(
            "total" => $total,
        );
        echo json_encode($data);
    }

    public function show_cart()
    {
        $cart = Cart::content();
        //return $cart;
        // print_r($cart);
        $total = Cart::subtotal();
        return view('Client.cart.cart',[
            'cart' => $cart,
            'total' => $total,
        ]);
        // return $cart;
    }

    public function delete_cart($id)
    {
        Cart::remove($id);
       $this->getCartInfoAfterChange();
    }

    public function update_cart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        $this->getCartInfoAfterChange();
    }
    public function getCartInfoAfterChange(){
        ///$info=Cart::get($request->rowId);
        $info=array();
        $sub_total = Cart::subtotal();
        $total = Cart::total();
        $cart_list = Cart::content();
        $count=Cart::content()->count();
        $data=array(
            "row" => $info,
            "list" => $cart_list,
            "sub_total" => $sub_total,
            "total" => $total,
            "count" => $count,
        );
        echo json_encode($data);
    }
}
