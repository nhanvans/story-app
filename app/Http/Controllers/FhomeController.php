<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;

class FhomeController extends Controller
{
    public $template;
    
    public function home()
    {
        $stories = Story::limit(8)->get();
        return view('front-ends.home',['stories' => $stories]);
    }

}
