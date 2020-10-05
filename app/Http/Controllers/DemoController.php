<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class DemoController extends Controller
{
    public function home() {
        $post = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')
                ->select('posts.*', 'categories.name', 'categories.slug')
                ->simplePaginate(3);
        return view('pages.home', compact('post'));
    }

    public function about() {
        return view('pages.about');
    }
    
    public function AddCategory() {
        return view('pages.addcategory');
    }
    
    public function StoreCategory(Request $request) {
  
        $validateData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:3',
            'slug' => 'required|unique:categories|max:25|min:3'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        // return response()->json($data);
        // or,
        // echo "<pre>";
        // print_r($data);
        
        $category = DB::table('categories')->insert($data);
        
        if($category) {
            $notification = array(
                'message' => 'Successfully Category Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else {
            $notification = array(
                'message' => 'Insertion Failed',
                'alert-type' => 
                'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function ShowAllCategory() {
        $category = DB::table('categories')->get();
        
        return view('pages.allcategory')->with('cat', $category);
        // return view('pages.allcategory', compact('category'));
        // return response()->json($category);
    }

    public function ViewSingleCategory($id) {
        $category = DB::table('categories')->where('id', $id)->first();

        return view('pages.viewsinglecategory')->with('category', $category);
    }
    
    public function DeleteSingleCategory($id) {

        $delete = DB::table('categories')->where('id', $id)->delete();

        if($delete) {
            $notification = array(
                'message' => 'Successfully Category Deleted',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else {
            $notification = array(
                'message' => 'Deletion Failed',
                'alert-type' => 
                'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function EditSingleCategory($id) {

        $category = DB::table('categories')->where('id', $id)->first();

        return view('pages.editcategory', compact('category'));
    }
    public function UpdateCategory(Request $request, $id) {
        $validateData = $request->validate([
            'name' => 'required|max:25|min:3',
            'slug' => 'required|max:25|min:3'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        $category = DB::table('categories')->where('id', $id)->update($data);
        
        if($category) {
            $notification = array(
                'message' => 'Successfully Category Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('pages.allcategory')->with($notification);
        }else {
            $notification = array(
                'message' => 'Nothing to Update',
                'alert-type' => 
                'error'
            );
            return Redirect()->route('pages.allcategory')->with($notification);
        }

    }

  public function contact() {
        return view('pages.contact');
    }
}
