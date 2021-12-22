<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    public function store(Request $request)
    {
        Post::create($request->all()); //將表單送過來的資料用model寫入資料庫
        return redirect()->route('admin.posts.index'); //頁面跳轉
    }

    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.post.index');
    }
}
