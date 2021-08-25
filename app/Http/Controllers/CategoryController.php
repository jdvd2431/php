<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function show(){
        $categoryList = Category::all();
        return view('category/list',['list' => $categoryList]);
    }

    function delete($id){
        //product::destroy($id);
        $category = Category::findOrfail($id);
        $category->delete();
        return redirect('/category')->with('message', 'La categoria fue borrado.');
    }

    function form($id = null){
        $category = new Category();
        if($id != null){
            $category = Category::findOrFail($id);
        }
        return view('category/form', ['category' =>$category]);
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'description' =>'required|max:50'
        ]);


        $category = new Category();
        $message = 'Se ha creado la marca';
        if (intval($request->id)>0) {
            $category = Category::findOrfail($request->id);
            $message = 'Se ha modificado la categoria';
        }

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect('/category')->with('succesMessage',$message);
    }
}
