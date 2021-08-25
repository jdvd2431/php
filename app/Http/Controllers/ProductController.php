<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
class ProductController extends Controller
{
     function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $productlist = Product::has('brand')->get();
        $productlist = Product::has('category')->get();
        return view('product/list',['list' => $productlist]);
    }

    function delete($id){
        //product::destroy($id);
        $product = Product::findOrfail($id);
        $product->delete();
        return redirect('/products')->with('message', 'El producto fue borrado.');
    }

    function form($id = null){
        $product = new Product();
        $brands = Brand::orderBy('name')->get();
        $category = Category::orderBy('name')->get();
        if($id != null){
            $product = Product::findOrFail($id);
        }
        return view('product/form', ['product' =>$product, 'brands' =>$brands,'product' =>$product, 'categories' =>$category]);
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brand' => 'required|max:50',
            'category' => 'required|max:50'
        ]);


        $product = new Product();
        $message = 'Se ha creado el producto';
        if (intval($request->id)>0) {
            $product = Product::findOrfail($request->id);
            $message = 'Se ha modificado el product';
        }

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;

        $product->save();
        return redirect('/products')->with('succesMessage',$message);
    }
}
