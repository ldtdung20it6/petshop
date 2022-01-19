<div class="container-fluid">
                  <div class="w-80 me-auto ms-auto">
                  <div class="row ">
                  @foreach($products as $key => $product)
                      <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="img-product"><a class="hover-img d-block" href="/san-pham/{{ $product -> id }}-{{\Str::slug($product -> name, '-')}}.html"><img class="img-product" src="{{ $product -> thumb }}" alt=""></a></div>
                        <div><a class="text-decoration-none text-black opacity-50 name-product " href="/san-pham/{{ $product -> id }}-{{\Str::slug($product -> name, '-')}}.html">{{$product -> name}}</a></div>
                        <div>{!! \App\Helpers\Helper::price($product->price,$product->price_sale) !!}</div>

                      </div>
                      @endforeach
                  </div>
                </div>
              </div>

