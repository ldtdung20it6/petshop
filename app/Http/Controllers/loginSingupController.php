<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginSingupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.login',[
            'title' => 'trang đăng nhập '
        ]);
    }
    public function index1()
    {
        return view('users.singup',[
            'title' => 'trang đăng nhập '
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        User::create([
            'fullname' => (string)$request->input('fullname'),
            'email' => (string)$request->input('email'),
            'password' =>bcrypt((string)$request->input('password')),
            'role' => 'user'
        ]);
        return redirect('/users/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ],
    );
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request ->input('password')
        ],  $request->input('remember'))){
            return redirect('/');
       }
       Session::flash('error' ,'Thông Tin Tài Khoản Hoặc Mật Khẩu Không Chính Xác');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
