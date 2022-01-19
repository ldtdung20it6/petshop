<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Routing\Route;

class ProductController extends Controller
{
    protected $ProductService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index($id = '',$slug = '',$name = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('products.content',[
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }
    public function search(Request $request){
        $products = Product::where('name','like','%'.$request->key . '%')
                            ->orWhere('price',$request->key)
                            ->get();

        return view('products.search',compact('products'),[
            'title' =>'Kết Quả Tìm Kiếm'
        ]
        );
    }
}
