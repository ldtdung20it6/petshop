<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // if(Gate::allows('admin')){
            return view('admin.home',[
                'title' => 'Trang Quản Trị'
            ]);
        // }
    }
    // public function admin()
    // {
    //     if(Gate::allows('admin')){
    //         return view('admin.home',[
    //             'title' => 'Trang Quản Trị'
    //         ]);
    //     }
    // }
}
