<?php

namespace App\Http\Controllers;

use App\Models\PhanTrang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhanTrangController extends Controller
{
    public function index()
    {
        return view('layouts.paginationlinks',[
            'products' => DB::table('products')->paginate(15)
        ]);
    }
}
