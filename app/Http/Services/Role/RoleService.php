<?php

namespace App\Http\Services\Role;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RoleService{
    public function getUser()
    {
        return User::where('id',0)->get();
    }
    public function create($request)
    {
        try {
            User::create([
                'email' => (string)$request->input('email'),
                'password' =>bcrypt((string)$request->input('password')),
                'fullname' => (string)$request->input('fullname'),
                'phone' => (int)$request->input('phone'),
                'address' => (string)$request->input('address'),
                'thumb' => $request->input('thumb'),
                'role' => (string)$request->input('role')
            ]);
            Session::flash('success', 'Thêm Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
    public function getAll()
    {
        return User::orderbyDesc('id')->paginate(20);
    }
    public function update($request, $user)
    {
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
    public function delete($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }
}
