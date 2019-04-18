<?php

namespace App\Http\Controllers;

use App\User;
use App\Store;
use App\Product;
use App\Exports\StoresExport;
use Illuminate\Http\Request;
use App\Http\Requests\AddStoreRequest;
use Maatwebsite\Excel\Facades\Excel;

class StoreController extends Controller
{
    public function addStore()
    {
        $users = User::where('store_id', null)
                       ->where('role', '<>', 'admin')
                       ->get();
        if ($users->first() == null) {
            return redirect('home')
            ->with('alert', trans('alert.freeUser'));
        } else {
            return view('store/store_create', compact('users'));
        }
    }

    public function createStore(AddStoreRequest $request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->save();
        $user = User::where('username', $request->user)
                      ->update(['store_id' => $store->id]);
        return redirect('home')->with('alert', trans('alert.addStore'));
    }

    public function showStore($id)
    {
        $products = Product::where('store_id', $id)->get();
        $store = Store::find($id);
        return view('store/store_show', 
               ['store' => $store, 'products' =>$products]);
    }

    public function export()
    {
        return Excel::download(new StoresExport, 'store.xlsx');
    }
}
