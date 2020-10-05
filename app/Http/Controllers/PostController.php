<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    
    public function writePost() {
        $category = DB::table('categories')->get();
        return view('pages.writepost', compact('category'));
    }
    
    public function storePost(Request $request) {
        $validateData = $request->validate([
            'title' => 'required|min:5|max:255',
            'image' => 'mimes:jpeg,png,jpg|max:4096',
            'details' => 'required'
            ]);
            
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image'); // file er vitorer image name ta img input field er namer same hote hobe 
            
        if ($image) {
            // Define upload path
            $upload_path=public_path('/postImage/');
            // $image_name=hexdec(uniqid());
            // Upload original image
            $ext=strtolower($image->getClientOriginalExtension());
            $image_name = date('YmdHis') . "." . $ext;
            
            $image->move($upload_path, $image_name);
            $data['image']= $image_name;
            
            DB::table('posts')->insert($data);
            $notification=array(
                'messege'=>'Successfully Post Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('home')->with($notification);
    	}else{
            DB::table('posts')->insert($data);
    		 $notification=array(
                 'messege'=>'Successfully Post Inserted',
                 'alert-type'=>'success'
                );
                return Redirect()->route('home')->with($notification);
            }
    }
    public function viewPost($id) {
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->select('posts.*', 'categories.name')
                ->where('posts.id', $id)
                ->first();
        return view('pages.viewpost', compact('post') );
    }
    public function allPost() {
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', 'categories.id')
                ->select('posts.*', 'categories.name')
                ->get();
        return view('pages.viewallpost')->with('post', $post);
    }
}


