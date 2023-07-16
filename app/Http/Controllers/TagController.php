<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //store tag
    public function store(Request $request){

        $request->validate([
            'tagName'=>'required',
        ],[
            'tagName.required'=>'Tag name must be given',
        ]);

        $tag = Tag::create([
            'tagName'=>$request->tagName
        ]);

        return response()->json([
            'success'=>'Tag created successfully',
        ]);
    }//end method


    //show tag
    public function show(){
        $tags=Tag::orderBy('id','desc')->get();
        return response()->json([
            'status'=>200,
            'tags'=>$tags

        ]);
    }//end method


    //edit tag
    public function edit($id){
        $tag = Tag::find($id);

        return response()->json([
            'tag' => $tag,
        ]);
    }//end method


    //update tag
    public function update(Request $request, $id){
        $request->validate([
            'tagName'=>'required',
        ],[
            'tagName.required'=>'Tag name must be given',
        ]);

        $tag = Tag::find($id)->update([
            'tagName'=>$request->tagName
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }//end method


    //delete tag
    public function delete($id){
        Tag::find($id)->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }//end method




}//end method
