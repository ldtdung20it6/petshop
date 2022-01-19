<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function index()
    {
        return view('admin.carts.customer',[
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer(),
        ]);
    }
    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);
        return view('admin.carts.detail',[
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function show1(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);
        return view('carts.productstatus',[
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function updateCartAdmin(Request $request,Customer $customer)
    {
        $result = $this->cart->updateCartAdmin($request , $customer);
        if($result){
            return redirect('/admin/customers');
        }
        return redirect()->back();
    }
    public function delivered(Request $request,Customer $customer)
    {
        $result = $this->cart->updateCartAdmin1($request , $customer);
        if($result){
            return redirect('/admin/customers');
        }
        return redirect()->back();
    }
}
