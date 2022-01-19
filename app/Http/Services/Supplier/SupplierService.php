<?php

namespace App\Http\Services\Supplier;

use App\Models\Supplier;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class SupplierService
{
    public function create($request)
    {
        try {
            Supplier::create([
                'name' => (string)$request->input('name'),
                'email' =>(string)$request->input('email'),
                'phone' => (int)$request->input('phone'),
                'address' => (string)$request->input('address'),
                'supplying' => (string)$request->input('supplying'),
                'thumb' => (string)$request->input('thumb')

            ]);
            Session::flash('success', 'Thêm Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
    public function get()
    {
        return Supplier::orderbyDesc('id')->paginate(20);
    }
}
