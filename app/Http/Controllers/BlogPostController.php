<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    public function index($id)
    {
        $post = BlogPost::find($id);
        return $post;
    }
    public function show()
    {
        return view("pages.create-new-post");
    }
    public function store(Request $request)
    {
        $blog = new BlogPost;

        $validator = Validator::make($request->all(), $rules = [
            'title' => "required|max:255",
            'content' => "required",
        ], $messages = [
            'title.required' => 'Please specify the title by entering and heading block.',
            'content.required' => 'Please enter the blog post content.',
        ]);

        if ($validator->fails()) {
            return redirect('create-new-post')
                ->withErrors($validator)
                ->withInput();
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::id();

        $blog->save();

        return redirect('/dashboard');
    }

    public function destroy($postId)
    {
        BlogPost::destroy($postId);

        return redirect("/dashboard")->with(['posts' => BlogPost::all()]);
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);
        if ($request->isMethod("get")) {
            return view("pages.edit-post");
        }
    }
}
