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
        return view('product/product_add');
    }

    public function newAdd(AddNewProductRequest $request)
    {
        $newproduct = new Product;
        $newproduct->name = $request->name;
        $newproduct->number = $request->number;
        $newproduct->store_id = Auth::user()->store_id;
        $newproduct->save();
        return redirect()->back()->with('alert', 'Đã thêm sản phẩm vào kho');
    }
    public function subProduct($id)
    {
        $products = Product::where('store_id', $id)->get();
        return view('product/product_sub', compact('products'));
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
            ->with('alert', 'Xuất hàng thành công');
        } else {
            return redirect()->back()->with('alert', 
            'số lượng không hợp lệ, số cần nhập phải lớn hơn 0 và nhỏ hơn số hàng đang có');
        }
    }

    public function updateProduct($id)
    {
        $product = Product::find($id);
        return view('product/product_update', compact('product'));
    }

    public function productAdd(AddProductRequest $request, $id)
    {
        if ($request->number > 0) {
            $product = Product::find($id);
            $number = $product->number;
            $product->number = $number + $request->number;
            $product->save();
            return redirect()->route('store.show', Auth::user()->store_id)
            ->with('alert', 'Cập nhật thành công');
        } else {
            return redirect()->back()->with('alert', 'Số lượng phải lớn hơn 0');
        }
    }
}
