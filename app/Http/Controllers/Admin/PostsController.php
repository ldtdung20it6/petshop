<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Posts\PostsService;
use App\Models\Posts;

class PostsController extends Controller
{
    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;
    }

    public function create()
    {
        return view('admin.posts.add',[
            'title' => 'Thêm Bài Viết Mới'
        ]);
    }
    public function store(Request $request)
    {
        $this->postsService->insert($request);

        return redirect()->back();
    }
    public function index()
    {
        return view('admin.posts.list',[
            'title' => 'Quản Lí Bài Viết',
            'posts' => $this->postsService->get()
        ]);
    }
    public function show(Posts $posts)
    {
        return view('admin.posts.edit',[
            'title' => 'Chỉnh Sửa bài Viết',
            'posts' => $posts
        ]);
    }
    public function update(Request $request , Posts $posts)
    {
        $result = $this->postsService->update($request,$posts);
    }
}
