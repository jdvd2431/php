<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $brandlist = Brand::all();
        return view('brand/list',['list' => $brandlist]);
    }

    function delete($id){
        //product::destroy($id);
        $brand = Brand::findOrfail($id);
        $brand->delete();
        return redirect('/brand')->with('message', 'La marca fue borrado.');
    }

    function form($id = null){
        $brand = new Brand();
        if($id != null){
            $brand = Brand::findOrFail($id);
        }
        return view('brand/form', ['brand' =>$brand]);
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',
        ]);
        
        
        $brand = new Brand();
        $message = 'Se ha creado la marca';
        if (intval($request->id)>0) {
            $brand = Brand::findOrfail($request->id);
            $message = 'Se ha modificado la marca';
        }

        $brand->name = $request->name;

        $brand->save();
        return redirect('/brand')->with('succesMessage',$message);
    }
}
