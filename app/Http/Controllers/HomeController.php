<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TilesImage;

class HomeController extends Controller
{
    public function home(){

        $categories = Category::orderBy('name','asc')->get();
        return view('welcome',compact('categories'));
    }
}
