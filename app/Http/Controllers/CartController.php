<?php

namespace App\Http\Controllers;
use App\Models\Home;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('client.home.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'main_image' => $request->main_image,
            )
        ]);
        session()->flash('success', 'Sản phẩm được thêm vào giỏ hàng thành công! !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Giỏ hàng được cập nhật thành công! !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Xoá thành thành công! !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Xoá toàn bộ giỏ hàng thành công! !');

        return redirect()->route('cart.list');
    }
}
