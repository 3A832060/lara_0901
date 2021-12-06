<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Env\Request;

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
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }

    public function store(Request $request)
    {
        Post::create($request->all()); //將表單送過來的資料用model寫入資料庫
        return redirect()->route('admin,posts.index'); //頁面跳轉
    }
}
