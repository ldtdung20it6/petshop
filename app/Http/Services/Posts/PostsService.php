<?php

namespace App\Http\Services\Posts;

use App\Models\Posts;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class PostsService
{
    public function insert($request)
    {
        try {
            $request->except('_token');
            Posts::create($request->all());

            Session::flash('success', 'Thêm Bài Viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Bài Viết lỗi');
            Log::info($err->getMessage());
            return  false;
        }
    }
    public function get()
    {
        return Posts::where('active', 1)->orderByDesc('id')->get();

    }
    public function update($request,$posts)
    {
        try{
            $posts->fill($request->input());
        $posts->save();
        session::flash('success','cập nhật Bài Viết thành công');
        }catch(\Exception $err){
            session::flash('error','thất bại');
            log::info($err->getMessage());
            return false;
        }

        return true;
    }
}
