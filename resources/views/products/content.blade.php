@extends('main')
@section('content')
<div style="margin-top: 100px;margin-left: 20px;" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-decoration-none color-black" href="/">Trang Chủ</a></li>
    <li class="breadcrumb-item"><a class="text-decoration-none color-black" href="/danh-muc/{{ $product->menu->id }}-{{ \Str::slug($product->menu->name) }}.html">{{$product->menu->name}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
  </ol>
</div>

<div class="container mt-5">
          <div class="row">
              <div class="col-md-6 ">
                  <img class="img-banner" src="{{ $product->thumb }}" alt="">
              </div>
              <div class="col-md-6">
                  <h2>{{$title}}</h2>
                  <span>{{ $product->description }}</span>
                  <h3 class="color-red">{!! App\Helpers\Helper::price($product->price,$product->price_sale) !!}</h3>


                  <form action="/add-cart" method="post">
                                        @if ($product->price !== NULL)
                                            <div>
                                                <div class="mb-3" style="border-top:1px solid; width: 80%;"></div>
                                                <span>Số Lượng</span>
                                                <input style="width: 50px;" type="number" name="num_product" value="1">
                                                <button class="">Thêm Vào Giỏ Hàng</button>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="mt-3" style="border-top:1px solid; width: 80%;"></div>
                                            </div>

                                        @endif
                                        @csrf
                                    </form>
              </div>
          </div>
          <div class="row">
              <div class="border mt-5">
              <div class="col mt-5">
                  <h2 class="text-center">Chi Tiết Sản Phẩm</h2>
                  {!!$product->content!!}
              </div>
            </div>
          </div>
      </div>
      <div class=" ms-auto me-auto mt-5 fs-1 mb-5 text-center">Sản Phẩm Mới</div>
    @include('products.list')
    </div>
@endsection
