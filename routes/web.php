<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Support\Facades\Route;



route::get( 'admin/users/login',[LoginController::class, 'index'])->name('login');
route::post( 'admin/users/login/store',[LoginController::class, 'store']);

route::middleware(['auth'])->group(function(){

    route::prefix('admin')->group(function(){

    route::get('/',[MainController::class, 'index']) -> name('admin');
    route::get('main',[MainController::class, 'index']);

    #menu
    route::prefix('menus')->group(function(){
        route::get('add',[MenuController::class,'create']);
        route::post('add',[MenuController::class,'store']);
        route::get('list',[MenuController::class,'index']);
        route::get('edit/{menu}',[MenuController::class,'show']);
        route::post('edit/{menu}',[MenuController::class,'update']);
        route::DELETE('destroy',[MenuController::class,'destroy']);
    });
    #product
    route::prefix('products')->group(function(){
        Route::get('add', [ProductController::class, 'create']);
        Route::post('add', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'index']);
        Route::get('edit/{product}', [ProductController::class, 'show']);
        Route::post('edit/{product}', [ProductController::class, 'update']);
        route::DELETE('destroy',[ProductController::class,'destroy']);

    });
    #slider
    route::prefix('sliders')->group(function(){
        Route::get('add', [SliderController::class, 'create']);
        Route::post('add', [SliderController::class, 'store']);
        Route::get('list', [SliderController::class, 'index']);
        Route::get('edit/{slider}', [SliderController::class, 'show']);
        Route::post('edit/{slider}', [SliderController::class, 'update']);
        route::DELETE('destroy',[SliderController::class,'destroy']);

    });

    #upload
    route::post('upload/services',[UploadController::class,'store']);

    #cart
    route::get('customers',[CartController::class,'index']);
    Route::get('customers/{id}/shippings', [CartController::class, 'updateCartAdmin']);
    Route::get('customers/{id}/delivered', [CartController::class, 'delivered']);


    route::get('customers/view/{customer}',[CartController::class,'show']);
    #role
    route::prefix('roles')->group(function(){
        route::get('add',[RoleController::class,'create']);
        route::post('add',[RoleController::class,'store']);
        route::get('list',[RoleController::class,'index']);
        route::get('edit/{user}',[RoleController::class,'show']);
        route::post('edit/{user}',[RoleController::class,'update']);
        route::DELETE('destroy',[RoleController::class,'destroy']);
    });

    #supplier
    route::prefix('supplier')->group(function(){
        route::get('add',[SupplierController::class,'create']);
        route::post('add',[SupplierController::class,'store']);
        route::get('list',[SupplierController::class,'index']);
        route::get('edit/{supplier}',[SupplierController::class,'show']);
        route::post('edit/{supplier}',[SupplierController::class,'update']);
        route::DELETE('destroy',[SupplierController::class,'destroy']);
    });

    #posts
    route::prefix('posts')->group(function(){
        route::get('add',[PostsController::class,'create']);
        route::post('add',[PostsController::class,'store']);
        route::get('list',[PostsController::class,'index']);
        route::get('edit/{posts}',[PostsController::class,'show']);
        route::post('edit/{posts}',[PostsController::class,'update']);
        route::DELETE('destroy',[PostsController::class,'destroy']);
    });



    });
});

route::get('/',[App\Http\Controllers\MainController::class,'index']);
// route::post('/services/load-product',[App\Http\Controllers\MainController::class,'loadProduct']);
route::get('danh-muc/{id}-{slug}.html',[App\Http\Controllers\MenuController::class , 'index']);
route::get('san-pham/{id}-{slug}.html',[App\Http\Controllers\ProductController::class , 'index']);
route::post('add-cart',[App\Http\Controllers\CartController::class,'index']);
route::get('carts',[App\Http\Controllers\CartController::class,'show']);
route::post('update-cart',[App\Http\Controllers\CartController::class,'update']);
route::get('carts/delete/{id}',[App\Http\Controllers\CartController::class,'remove']);
route::post('carts',[App\Http\Controllers\CartController::class,'addCart']);

route::get('search',[App\Http\Controllers\ProductController::class, 'search']);
route::get('lien-he',[App\Http\Controllers\MainController::class,'lienhe']);

route::get('users/login',[App\Http\Controllers\loginSingupController::class,'index']);
route::get('logout',[App\Http\Controllers\MainController::class,'logout']);
route::post('users/login/store',[App\Http\Controllers\loginSingupController::class,'store']);
route::get('users/singup',[App\Http\Controllers\loginSingupController::class,'index1']);
route::post('users/singup/create',[App\Http\Controllers\loginSingupController::class,'create']);
route::get('profile',[App\Http\Controllers\MainController::class,'profile']);
route::get('updateprofile',[App\Http\Controllers\MainController::class,'updateProfile']);
route::get('chinhsach',[App\Http\Controllers\MainController::class,'chinhsach']);
route::get('cart/productstatus/{customer}',[CartController::class,'show1']);
