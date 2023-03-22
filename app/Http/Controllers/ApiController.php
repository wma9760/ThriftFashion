<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Productimages;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCartAPI(Request $request)
    {
        // $cart = Cart::where('user_id', $request->user_id)->get();
        // $cart = Cart::join('product', 'product.id', '=', 'cart.product_id')->select('cart.*', 'product.name', 'product.price')->where('cart.user_id', $request->id)->get();

        $cart = Cart::where('user_id', $request->user_id)->get();

        $items = [];

        foreach ($cart as $fetch) {

            $getItem = Product::where('id', '=', $fetch->product_id)->first();
            $itemImage = Productimages::where('product_id', '=', $getItem->id)->first();
            $getdiscount = Discount::find($featuredget->discount_id);
            $selling_price = $featuredget->price - ($featuredget->price * ($getdiscount->discount_percent / 100));

            array_push($items, array(
                "id" => $fetch->id,
                "p_id" => $fetch->product_id,
                "title" => $getItem->name,
                "img" => $itemImage->image,
                "p_price" => $getItem->price,
                "quantity" => $fetch->product_quantity,
                "selling_price" => $selling_price,
            ));
        }

        return $items;
    }

    public function addCartAPI(Request $request)
    {
        if ($toUpdate = Cart::where('user_id', '=', $request->user_id)->where('product_id', '=', $request->product_id)->first()) {
            $toUpdate->product_quantity += $request->product_quantity;
            if ($toUpdate->save()) {
                return 1;
            } else {
                return 0;
            };
        } else {
            $cartTb = new Cart();
            $cartTb->product_id = $request->product_id;
            $cartTb->user_id = $request->user_id;
            $cartTb->product_quantity = $request->product_quantity;
            if ($cartTb->save()) {
                return 1;
            } else {
                return 0;
            };
        }
    }

    public function deleteCartAPI(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart->delete()) {
            return 1;
        } else {
            return 0;
        };
    }
    // delete all cart items of a user
    public function deleteAllCartAPI(Request $request)
    {
        $cart = Cart::where('user_id', $request->user_id)->delete();
        if ($cart) {
            return 1;
        } else {
            return 0;
        };
    }
    //Update quantity in cart
    public function updateAddCartAPI(Request $request)
    {
        $cart = Cart::find($request->id);

        $cart->product_quantity = $cart->product_quantity + 1;
        if ($cart->save()) {
            return 1;
        } else {
            return 0;
        };
    }

    public function updateRemoveCartAPI(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart->product_quantity > 1) {
            $cart->product_quantity = $cart->product_quantity - 1;
            if ($cart->save()) {
                return 1;
            } else {
                return 0;
            };
        } else {
            $cart = Cart::find($cart->id);
            if ($cart->delete()) {
                return 1;
            } else {
                return 0;
            };
        }
    }
    public function getCartCountAPI(Request $request)
    {
        $cart = Cart::where('user_id', 1)->get();
        return count($cart);
    }

    public function addWishlistAPI(Request $request)
    {
        $wishlistTb = new Wishlist();
        $wishlistTb->product_id = $request->product_id;
        $wishlistTb->user_id = $request->user_id;
        if ($wishlistTb->save()) {
            return 1;
        } else {
            return 0;
        };
    }

    public function getWishlistAPI(Request $request)
    {
        $wishlist = Wishlist::where('user_id', $request->user_id)->get();
        return $wishlist;
    }

    public function deleteWishlistAPI(Request $request)
    {
        $wishlist = Wishlist::find($request->id);
        if ($wishlist->delete()) {
            return 1;
        } else {
            return 0;
        };
    }
// checkout api
    public function checkoutAPI(Request $request)
    {
        $cart = Cart::where('user_id', $request->user_id)->get();
        foreach ($cart as $item) {
            $product = Product::find($item->product_id);
            $product->stock = $product->stock - $item->product_quantity;
            $product->save();
        }
        $cart = Cart::where('user_id', $request->user_id)->delete();
        return 1;
    }
    //order api
//    add order api
    public function addOrderAPI(Request $request)
    {

        $orderTb = new Orders();
        $orderTb->user_id = $request->userId;
        $orderTb->status = 1;
        $orderTb->order_date = date('Y-m-d H:i:s');
        $orderTb->deliver_date = date('Y-m-d H:i:s');
        $orderTb->total = $request->totalCost;

        if ($orderTb->save()) {

            $getUserCart = Cart::where('user_id', $request->userId)->get();

            foreach ($getUserCart as $orderitem) {
                $orderItems = new OrderItems();
                $orderItems->order_id = $orderTb->id;
                $orderItems->product_id = $orderitem->product_id;
                $orderItems->quantity = $orderitem->product_quantity;
                $orderItems->status = 1;
                $orderItems->save();
            }

            if (Cart::where('user_id', '=', $request->userId)->delete()) {
                return view('User.afterorder');
            } else {
                return redirect()->route('index');
            }

        } else {
            return 0;
        };

    }

    public function getOrderAPI(Request $request)
    {
        $order = Orders::where('user_id', $request->user_id)->get();
        $toReturn = [];
        foreach ($order as $new) {
            $user = User::where('id', $new->user_id)->first();
            array_push($toReturn, array(
                "order_id" => $new->id,
                "order_name" => $user->name,
                "order_date" => $new->order_date,
                "status" => $new->status,
                "total" => $new->total,
            ));
        }
        return $toReturn;
    }

    public function cancelOrderAPI(Request $request)
    {
        $order = Orders::find($request->order_id);
        $order->status = 0;
        if ($order->save()) {
            return 1;
        } else {
            return 0;
        };
    }

    public function getOrderDetailAPI(Request $request)
    {
        $order = Orders::find($request->id);
        return $order;
    }

    public function getOrderCountAPI(Request $request)
    {
        $order = Orders::where('user_id', $request->user_id)->get();
        return count($order);
    }
//fetch order items api
    public function getOrderItemsAPI(Request $request)
    {
        $orderItems = OrderItems::where('order_id', 4)->get();
        return $orderItems;
    }

    // /api/fetch-subccategories
    public function fetchSubcategoryApi(Request $request)
    {
        $data['subcategories'] = Subcategory::where('category_id', $request->category_id)->get([
            'id',
            'subcategory_name',
        ]);
        return response()->json($data);
    }

    //Search Product Api
    public function searchProduct(Request $request)
    {
        $searched = Product::where('name', 'LIKE', $request->keyword . '%')->get();
        $searchReturn = [];
        foreach ($searched as $items) {
            $imgs = Productimages::where('product_id', $items->id)->first();
            array_push($searchReturn, array(
                "p_id" => $items->id,
                "title" => $items->name,
                "price" => $items->price,
                "img" => $imgs->image,
            ));
        }
        return $searchReturn;
    }

}