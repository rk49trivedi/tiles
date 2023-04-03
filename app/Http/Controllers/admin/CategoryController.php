<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(){
        $allCategory = Category::all();

        
        if(isset($_REQUEST['categoryid'])){
            $delCategory = Category::find($_REQUEST['categoryid'])->delete();
            return redirect()->back()->with('success','Category Successfully deleted');
        }

        return view('admin/category/manage_category',compact('allCategory'));
    }
    
    public function createCategory(){
        return view('admin/category/create_category');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin/category/edit_category',compact('category'));
    }

    public function updateCategory(Request $request){

        if(Category::where('name',$request->catName)->where('id','<>',$request->hidid)->first()){
            return redirect()->back()->with('error','Category already exist');
        }
        $saveCat = Category::find($request->hidid);
        $saveCat->name = $request->catName;
        $saveCat->save();

       return redirect()->back()->with('success','Category Successfully saved');

    }

    public function addCategory(Request $request){

        if(Category::where('name',$request->catName)->first()){
            return redirect()->back()->with('error','Category already exist');
        }
        $saveCat = new Category();
        $saveCat->name = $request->catName;
        $saveCat->save();

       return redirect()->back()->with('success','Category Successfully saved');

    }
    
}
