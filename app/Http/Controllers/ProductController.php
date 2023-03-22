<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Productimages;
use App\Models\Discount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(8);
        $pimage=Productimages::all();
        return view('admin.product.index', compact('products','pimage',));
    }

    public function create()
    {
        $categories = Category::all();
        $discount=Discount::all();
        $subcategory = Subcategory::all();
        return view('admin.product.create', compact('categories','discount','subcategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:product',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'discount_id' => 'required|integer',
            'size' => 'required|max:255',
            'description' => 'required|max:255',
            'stock' => 'required|integer',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif'

        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->discount_id = $request->discount_id;
        $product->status = 1;
        $product->trending = 0;
        $product->stock = $request->stock;
        $product->save();

        if ($request->hasfile('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $extenstion = $image->getClientOriginalName();
                $filename = 'Product_Image' . rand(1, 9999999999) . $product->id . time() . '.' . $extenstion;
                $image->move('assets/images/product', $filename);
                $productimg = new Productimages();
                $productimg->image = $filename;
                $productimg->product_id = $product->id;
                $productimg->save();
            }
        }
        return redirect()->route('product.index');
    }

    public function edit($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        $subcategories=Subcategory::where('category_id',$product->category_id)->get();
        $discount=Discount::all();
        $images=Productimages::where('product_id',$id)->get();

        return view('admin.product.edit', compact('product','categories','subcategories','discount','images','subcategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'max:255|unique:product,name,'.$id,
            'price' => 'integer',
            'category_id' => 'integer',
            'subcategory_id' => 'integer',
            'discount_id' => 'integer',
            'size' => 'max:255',
            'description' => 'max:255',
            'stock' => 'integer',
            'image.*' => 'image'

        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->discount_id = $request->discount_id;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->save();
        if ($request->image) {
            foreach ($request->image as $img) {
                $extenstion = $img->getClientOriginalName();
                $filename = 'Product_Image' . rand(1, 9999999999) . $product->id . time() . '.' . $extenstion;
                // dd($filename);exit;
                $img->move('assets/images/product', $filename);
                $product_images = new Productimages;
                $product_images->product_id = $product->id;
                $product_images->image = $filename;
                $product_images->save();

            }

        }
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $images = Productimages::select('image')->where('product_id', $id)->get();
        foreach ($images as $img) {
            $filePathName = 'assets/images/product/' . $img->image;
            if (file_exists($filePathName)) {
            }
            unlink($filePathName);
        }
        Productimages::where('product_id', $id)->delete();

        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
    public function deleteImage($id){
        $image = Productimages::find($id);
        $filePathName = 'assets/images/product/' . $image->image;
        if (file_exists($filePathName)) {
        }
        unlink($filePathName);

        Productimages::destroy($id);
        return redirect()->back();
    }
    public function status($id)
    {
        $product = Product::find($id);
        if ($product->status == 1) {
            $product->status = 0;
            $product->save();
        } else if ($product->status == 0) {
            $product->status = 1;
            $product->save();
        }
        $products = Product::all();
        $pimage=Productimages::all();
        return redirect()->route('product.index');
    }
    public function trending($id)
    {
        $product = Product::find($id);
        if ($product->trending == 1) {
            $product->trending = 0;
            $product->save();
        } else if ($product->trending == 0) {
            $product->trending = 1;
            $product->save();
        }

        return redirect()->route('product.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->paginate(10);
        return view('admin.product.search', compact('products'));
    }



}
