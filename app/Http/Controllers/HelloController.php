<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Support\Str;
use App\Post;

class HelloController extends Controller
{
 public function index() {

     $post = DB::table('posts')
         ->join('categories','posts.category_id','categories.id')
         ->select('posts.*','categories.name','categories.slug')
         ->paginate(3);
    return view('index',compact('post'));
 }

public function about(){
    return view('about');
}
public function contact(){
    return view('contact');
}


public  function addCategory(){
    return view('add_category');
}

public  function storeCategory(Request $request){
// using model
/*$category = new Category();
$category->name = $request->ca_name;
$category->slug = $request->ca_slug;
$category->save();*/

//Validation
    $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:25|min:4',
    ]);
//  using one line in model

//$category = Category::create($request->all());





//     using query builder
        $data=array();
        $data["name"]=$request->name;
        $data["slug"]=$request->slug;
//    return response()->json($data);
//    var_dump($data);//Show data with data type
//    echo '<pre>';
//    print_r($data);
     $category=DB::table('categories')->insert($data);

     if($category){
         $notifications = array(
             'message'=>'Succesfully category inserted',
             'alert-type'=>'success'
         );
         return redirect()->back()->with($notifications);
     }
    else{
        $notifications = array(
             'message'=>'error',
             'alert-type'=>'error',
         );
         return redirect()->back()->with($notifications);
     }
}

public function allCategory(){

    $category = DB::table('categories')->get();
//    echo "<pre>";
//    print_r($category);
    return view('all_category',compact('category'));
//    return view('all_categor')->with('category','category');
}

public function viewCategory($id){
    $category=DB::table('categories')
        ->where('id',$id)
        ->first();
    return view('single_category_view')->with('cat',$category);
}
public function deleteCategory($id){
     $category = DB::table('categories')
         ->where('id',$id)
         ->delete();

    if($category){
        $notifications = array(
            'message'=>'Succesfully category Deleted',
            'alert-type'=>'success'
        );
        return redirect('/all/category')->with($notifications);
    }
    else{
        $notifications = array(
            'message'=>'error',
            'alert-type'=>'error',
        );
        return redirect('/all/category')->with($notifications);
    }
}


public function editCategory($id){
    $category=DB::table('categories')
        ->where('id',$id)
        ->first();
    return view('edit_category')->with('cat',$category);
}
public function updateCategory(Request $request,$id){
    //Validation
    $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',

    ]);
//  using one line in model

//$category = Category::create($request->all());





//     using query builder
    $data=array();
    $data["name"]=$request->name;
    $data["slug"]=$request->slug;
//    return response()->json($data);
//    var_dump($data);//Show data with data type
//    echo '<pre>';
//    print_r($data);
    $category=DB::table('categories')
        ->where('id',$id)
        ->update($data);

    if($category){
        $notifications = array(
            'message'=>'Succesfully category updated',
            'alert-type'=>'success'
        );
        return redirect('all/category')->with($notifications);
    }
    else{
        $notifications = array(
            'message'=>'error',
            'alert-type'=>'error',
        );
        return redirect('all/category')->with($notifications);
    }
}

//Post page
public function writePost(){
        $category=Category::all();
//        print_r($category);
        return view('writepost',compact('category'));
    }

public function storePost(Request $request){
    $request->validate([
        'title' => 'required|max:255',
        'details' => 'required',
        'image' => 'required',

    ]);
    $data = array();
    $data['title']=$request->title;
    $data['category_id']=$request->category_id;
    $data['details']=$request->details;
//    $data['category_id']=$request->category_id;
    $image=$request->file('image');
    if($image){
    $image_name=Str::random(5);
    $ext=strtolower($image->getClientOriginalExtension());
    $img_full_name=$image_name.".".$ext;
    $upload_path='frontEnd/images/';
    $image_url=$upload_path.$img_full_name;
    $image->move($upload_path,$img_full_name);
    $data['image']=$image_url;
    DB::table('posts')->insert($data);
        $notifications = array(
            'message'=>'Succesfully post inserted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notifications);

    }
    else{
     DB::table('posts')->insert($data);
        $notifications = array(
            'message'=>'Succesfully post inserted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notifications);
    }



}

public function allPost(){
// $allPost=Post::all();
    $allPost=DB::table('posts')
             ->join('categories','posts.category_id','categories.id')
             ->select('posts.*','categories.name')
              ->get();
    return view('all_post',compact('allPost'));
}
public function viewPost($id){
    $single_post=DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*','categories.name')
        ->where('posts.id',$id)
        ->first();
    return view('single_post_view',compact('single_post'));

}
public function editPost($id){
    $category=DB::table('categories')->get();
    $post=DB::table('posts')->where('id',$id)->first();
    return view('edit_post',compact('category','post'));


}

public function updatePost(Request $request,$id){
    $request->validate([
        'title' => 'required|max:255',
        'details' => 'required'


    ]);
    $data = array();
    $data['title']=$request->title;
    $data['category_id']=$request->category_id;
    $data['details']=$request->details;

    $image=$request->file('image');
    if($image){
        $image_name=Str::random(5);
        $ext=strtolower($image->getClientOriginalExtension());
        $img_full_name=$image_name.".".$ext;
        $upload_path='frontEnd/images/';
        $image_url=$upload_path.$img_full_name;
        $image->move($upload_path,$img_full_name);
        $data['image']=$image_url;
        unlink($request->old_photo);
        DB::table('posts')->where('id',$id)->update($data);
        $notifications = array(
            'message'=>'Succesfully post updated',
            'alert-type'=>'success'
        );
        return redirect()->route('all.post')->with($notifications);

    }
    else{
        $data['image']=$request->image;
        DB::table('posts')->where('id',$id)->update($data);
        $notifications = array(
            'message'=>'Succesfully post updated',
            'alert-type'=>'success'
        );
        return redirect()->route('all.post')->with($notifications);
    }
}


        public function deletePost($id){
        $del_post = DB::table('posts')->where('id',$id)->delete();
            if($del_post){
                $notifications = array(
                    'message'=>'Succesfully post deleted',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notifications);
            }
            else{
                $notifications = array(
                    'message'=>'error',
                    'alert-type'=>'error',
                );
                return redirect()->back()->with($notifications);
            }

        }
//End
}
