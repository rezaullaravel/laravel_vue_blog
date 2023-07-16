<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    //store blog
    public function store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'author_name'=>'required',
            'image'=>'required|image',
        ],[
            'category_id.required'=>'Category is required',
            'title.required'=>'Title is required',
            'description.required'=>'Description is required',
            'author_name.required'=>'Author name is required',
            'image.required'=>'Image is required',
            'image.image'=>'File must be image type',
        ]);

        //image upload
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/',$imageName);
            $imageUrl = 'upload/'.$imageName;
        }

        Blog::create([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'author_name'=>$request->author_name,
            'image'=>$imageUrl,
        ]);

        return response()->json();
    }//end method


    //show blog
    public function show(){
        $blogs = Blog::with('category')->orderBy('id','desc')->get();

        return response()->json([
            'blogs'=> $blogs
        ]);
    }//end method


    //get blog by id
    public function getBlogById($id){
        $blog = Blog::find($id);

        return response()->json([
            'blog'=> $blog
        ]);
    }//end method


    //update blog
    public function updateBlog(Request $request,$id){
        $request->validate([
            'category_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'author_name'=>'required',
        ],[
            'category_id.required'=>'Category is required',
            'title.required'=>'Title is required',
            'description.required'=>'Description is required',
            'author_name.required'=>'Author name is required',
        ]);

        $blog = Blog::find($id);

        if($request->file('image')){
            if(File::exists($blog->image)){
                unlink($blog->image);
            }

            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/',$imageName);
            $imageUrl = 'upload/'.$imageName;

            $blog->image =  $imageUrl;
        }

        $blog->update([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'author_name'=>$request->author_name,
        ]);
    }//end method

    //delete blog
    public function deleteBlog($id){
        $blog = Blog::find($id);

        if(File::exists($blog->image)){
            unlink($blog->image);
        }

        $blog->delete();
    }//end method
}//end class
