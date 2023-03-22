<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Discount;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Productimages;
use App\Models\Profile;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //index
    public function index()
    {

        $featuredrow = Product::orderBy('id', 'desc')->limit(4)->get();
        $latestrow = Product::orderBy('id', 'desc')->limit(6)->get();
        $oldestrow = Product::orderBy('id', 'desc')->limit(6)->get();

        $featuredReturn = [];
        $latestReturn = [];
        $oldestReturn = [];

        foreach ($featuredrow as $featuredget) {
            $getItems = Productimages::where('product_id', $featuredget->id)->first();
            array_push($featuredReturn, array(
                "p_id" => $featuredget->id,
                "img" => $getItems->image,
                "title" => $featuredget->name,
                "price" => $featuredget->price,
                "trend" => $featuredget->trending,
            ));
        }
        foreach ($latestrow as $featuredget) {
            $getItems = Productimages::where('product_id', $featuredget->id)->first();
            $getdiscount = Discount::find($featuredget->discount_id);
            $selling_price = $featuredget->price - ($featuredget->price * ($getdiscount->discount_percent / 100));
            array_push($latestReturn, array(
                "p_id" => $featuredget->id,
                "img" => $getItems->image,
                "title" => $featuredget->name,
                "price" => $featuredget->price,
                "trend" => $featuredget->trending,
                "discount" => $featuredget->discount_id,
                "discount_name" => $getdiscount->name,
                "discount_percent" => $getdiscount->discount_percent,
                "selling_price" => $selling_price,
            ));
        }

        foreach ($oldestrow as $featuredget) {
            $getItems = Productimages::where('product_id', $featuredget->id)->first();
            array_push($oldestReturn, array(
                "p_id" => $featuredget->id,
                "img" => $getItems->image,
                "title" => $featuredget->name,
                "price" => $featuredget->price,
                "trend" => $featuredget->trending,
            ));
        }

        return view('User.index', compact('featuredReturn', 'latestReturn', 'oldestReturn'));
    }

    //Contact
    public function contact()
    {
        return view('User.contact');
    }

    //Submit Contact Form
    public function submit_contact(request $request)
    {
        Contact::create(
            [
                'name' => $request->fullname,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]
        );

        $response = "successfully Submited Contact Form";

        return $response;

    }

    //Feedback
    public function feedback()
    {
        return view('User.feedback');
    }

    //Submit Feedback
    public function submit_feedback(request $request)
    {
        Feedback::create(
            [
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'feedback' => $request->feedback,
            ]
        );

        $response = "successfully Submitted Feedback Form";

        return $response;
    }

    //Products
    public function products()
    {
        $products = Product::latest()->paginate(8);
        $pimage = Productimages::all();

        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('User.product', compact('products', 'pimage', 'categories', 'subcategories'));
    }

    //Product Details
    public function product_details($id)
    {
        $product = Product::all()->where('id', $id)->first();
        $pimage = Productimages::all()->where('product_id', $id);
        $discounts = Discount::all();

        return view('User.product_detail', compact('product', 'pimage', 'discounts'));
    }

    //Add To Cart
    public function add_to_cart($id, $amount)
    {

    }

    //Checkout
    public function checkout(Request $request)
    {
        // dd($request->userId);

        if (Auth::check()) {
            $cart = Cart::where('user_id', $request->userId)->get();
            $userdata = User::find($request->userId);
            $address = Profile::where('users_id', $request->userId)->first();
            $desc = [];
            foreach ($cart as $cartitem) {
                $prod = Product::where('id', $cartitem->product_id)->first();
                $prodi = Productimages::where('product_id', $cartitem->product_id)->first();
                array_push($desc, array(
                    "c_id" => $cartitem->id,
                    "p_id" => $prod->id,
                    "p_img" => $prodi->image,
                    "title" => $prod->name,
                    "price" => $prod->price,
                    "quantity" => $cartitem->product_quantity,
                ));
            }
            return view('User.checkout', compact('desc', 'userdata', 'address'));
        } else {
            return redirect()->route('login');
        }
    }

    //User
    public function user_details()
    {
        $user = User::all()->where('id', Auth::user()->id)->first();

        $address = Profile::all()->where('users_id', Auth::user()->id)->first();

        return view('User.user', compact('user', 'address'));
    }

    //Update User Profile
    public function update_user_profile(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        $profile = Profile::updateOrCreate(
            ['users_id' => Auth::user()->id],
            [
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
            ]
        );

        $response = "Successfully Updated Profile";

        return $response;

    }

    public function cart()
    {
        return view('User.cart');
    }

    public function wishlist()
    {
        return view('User.wishlist');
    }

    public function order()
    {
        return view('User.order');
    }
    public function about()
    {
        return view('User.about');
    }

}