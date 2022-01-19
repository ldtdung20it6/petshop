<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Posts\PostsService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use App\Models\PhanTrang;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\log;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    /**
     * Class constructor.
     */
    public function __construct(SliderService $slider , MenuService $menu,ProductService $product,PostsService $posts)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->posts = $posts;

        if(Auth::check())
        {
            view()->share('nguoidung',Auth::user());
        }
    }
    public function index(){
        return view('home',[
            'title' => 'Cửa hàng thú cưng',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get(),
            'posts' => $this->posts->get(),
        ]);
    }
    public function loadProduct(request $request)
    {
        $page = $request-> input('page',0);
        $result = $this->product->get($page);
        if(count($result) !== 0){
            $html = view('products.list',['products'=> $result])->render();

            return response()->json(['html' => $html]);

        }
        return response()->json(['html' => '']);
    }
    public function lienhe()
    {
        return view('lienhe',[
            'title' => 'Liên hệ '
        ]);
    }
    public function logout(Request $request)
    {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }
    public function profile()
    {
        return view('profile',[
            'title' => 'Thông Tin Cá Nhân'
        ]);
    }
    public function updateProfile($request, $user)
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
    public function chinhsach()
    {
        return view('chinhsach',[
            'title' => 'Chính Sách Cửa Hàng'
        ]);
    }
}
