<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //category store
    public function store(Request $request){
        $request->validate([
            'categoryName'=>'required|unique:categories'
        ],[
            'categoryName.required'=>'Category name can not be empty'
        ]);


        Category::create([
            'categoryName'=>$request->categoryName
        ]);


        return response()->json([
            'status'=>'success',
        ]);
    }//end method



    //category list show
    public function show(){
        $categories = Category::orderBy('id','desc')->get();

        return response()->json([
            'categories'=>$categories,
        ]);
    }//end method



    //category edit
    public function edit($id){
        $category = Category::find($id);

        return response()->json([
            'category'=>$category,
        ]);
    }//end method


    //category update
    public function update(Request $request,$id){
        $request->validate([
            'categoryName'=>'required|unique:categories,categoryName,'.$id,
        ],[
            'categoryName.required'=>'Category name can not be empty'
        ]);
        Category::find($id)->update([
            'categoryName'=>$request->categoryName
        ]);
    }//end method


    //category delete
    public function delete($id){
        Category::find($id)->delete();

    }//end method











}//end class
