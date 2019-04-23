<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddNewProductRequest;

class ProductController extends Controller
{
    public function addNewProduct($id)
    {
        return view('product.product_add');
    }

    public function newAdd(AddNewProductRequest $request)
    {
        $newproduct = new Product;
        $newproduct->name = $request->name;
        $newproduct->number = $request->number;
        $newproduct->store_id = Auth::user()->store_id;
        $newproduct->save();
        return redirect()->back()->with('alert', trans('alert.createProduct'));
    }
    public function subProduct($id)
    {
        $products = Product::where('store_id', $id)->get();
        return view('product.product_sub', compact('products'));
    }

    public function updateSub(AddProductRequest $request)
    {
        $product = Product::where('name', $request->product)
        ->where('store_id', Auth::user()->store_id)->first();
        $number = $product->number;
        if (($request->number > 0) && ($request->number < $number)) {
            $product->number = $number - $request->number;
            $product->save();
            return redirect()->route('store.show', Auth::user()->store_id)
            ->with('alert', trans('alert.subProduct'));
        } else {
            return redirect()->back()->with('alert', trans('alert.number'));
        }
    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        return view('product.product_update', compact('product'));
    }

    public function productAdd(AddProductRequest $request, $id)
    {
        if ($request->number > 0) {
            $product = Product::find($id);
            $number = $product->number;
            $product->number = $number + $request->number;
            $product->save();
            return redirect()->route('store.show', Auth::user()->store_id)
                             ->with('alert', trans('alert.updateProduct'));
        } else {
            return redirect()->back()
                             ->with('alert', trans('alert.numberUpdate'));
        }
    }

    public function ajaxPost(Request $request)
    {
        $product = Product::where('name', $request->name)
        ->where('store_id', Auth::user()->store_id)->first();
        $number = $product->number;
        return $number;
    }
}
