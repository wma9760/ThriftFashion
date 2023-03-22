<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.index', compact('discounts'));
    }
    public function create()
    {
        return view('admin.discount.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:2551|unique:discount',
            'discount_percent' => 'required|integer',
        ]);
        $discount = new Discount();
        $discount->name = $request->name;
        $discount->discount_percent = $request->discount_percent;
        $discount->save();
        return redirect()->route('discount.index');
    }
    public function edit($id)
    {
        $discount = Discount::find($id);
        return view('admin.discount.edit', compact('discount'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>  'max:255|unique:discount',
            'discount_percent' => 'integer',
        ]);
        $discount = Discount::find($id);
        $discount->name = $request->name;
        $discount->discount_percent = $request->discount_percent;
        $discount->save();
        return redirect()->route('discount.index');
    }
    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete();
        return redirect()->route('discount.index');
    }

}
