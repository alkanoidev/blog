<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogPostController extends Controller
{
    public function store(Request $request)
    {
        $blog = new BlogPost;
        Log::error($request->content."----------------------");
        $blog->title = "aaa";
        $blog->content = $request->content;
        $blog->user_id = "123123";  // na index page da se poravi nova
        // i ond ana  save dugme samo update
        $blog->save();

        return redirect('/dashboard');
    }
}
