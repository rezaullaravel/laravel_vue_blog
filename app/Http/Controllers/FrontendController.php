<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //get all blogs
    public function getBlogpost(){
        $posts = Blog::orderBy('id','desc')->get();

        return response()->json([
            'posts'=>$posts
        ]);
    }//end method


    //get blog categories
    public function getBlogCategory(){
        $categories = Category::all();

        return response()->json([
            'categories'=>$categories
        ]);
    }//end method


    //get blog post by category id
    public function getBlogPostByCategoryId($id){
        $blogs = Blog::with('category')->where('category_id',$id)->get();
        return response()->json([
            'blogs'=>$blogs
        ]);
    }//end method
}
