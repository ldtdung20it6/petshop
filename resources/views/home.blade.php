@extends('main')

@section('content')

<!-- Slider -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  @foreach($sliders as $slider)
    <div class="carousel-item active">
        <a href="{{ $slider->links }}"><img src="{{ $slider->thumb }}" class="d-block w-100" alt="{{ $slider->name }}"></a>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="w-90 text-center ms-auto me-auto mt-5 fs-1 mb-5">Danh Mục Sản Phẩm</div>

            <div class="container-fluid ">
                  <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="img-product"><a class="hover-img d-block" href="/danh-muc/58-thuc-an.html"><img class="img-product" src="/template/images/thuc-an-cho-cho-banner.jpg" alt=""></a></div>


                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="img-product"><a class="hover-img d-block" href="/danh-muc/63-thuc-an.html"><img class="img-product" src="/template/images/thuc-an-cho-meo-banner.jpg" alt=""></a></div>


                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="img-product"><a class="hover-img d-block" href="/danh-muc/70-kien-thuc-cham-soc.html"><img class="img-product" src="/template/images/cham-soc-cho-meo-banner.jpg" alt=""></a></div>


                      </div>
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="img-product"><a class="hover-img d-block" href="/danh-muc/69-van-de-suc-khoe.html"><img class="img-product" src="/template/images/suc-khoe-cho-meo-banner.jpg" alt=""></a></div>


                      </div>
                  </div>
              </div>

              <div class="container">
                <div class=" ms-auto me-auto mt-5 fs-1 mb-5 text-center">Sản Phẩm Mới</div>
              </div>

              @include('products.list')

              @include('loadmore')

              <div class="container">
                <div class=" ms-auto me-auto mt-5 fs-1 mb-5 text-center">Bài Viết Nổi Bật</div>
              </div>

              @include('posts.posts')
@endsection
