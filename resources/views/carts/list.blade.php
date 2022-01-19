@extends('main')

@section('content')

    <form class="bg0 p-t-130 p-b-85" method="post">
        @include('admin.alert')


        <div class="mt-10"></div>
    <div class="w-90 text-center ms-auto me-auto mt-5 fs-1 mb-5">Giỏ Hàng Của Tôi</div>

    <div class="container ms-auto me-auto">
        <div class="row">
        <div class="col-md-9">
        @php $total = 0; @endphp
          <table class="w-100 ">
            <thead>
              <tr class="border">
                  <th class="text-center pt-4 pb-4">Sản Phẩm</th>
                  <th class="text-center"></th>
                  <th class="text-center">Giá</th>
                  <th class="text-center">Số Lượng</th>
                  <th class="text-center">Tổng</th>
                  <th class="text-center">&nbsp;</th>
              </tr>
              @foreach($products as $key => $product)
                    @php
                        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                        $priceEnd = $price * $carts[$product->id];
                        $total += $priceEnd;
                    @endphp
          </thead>
          <tbody>
        <tr class="border">
                    <td class="text-center pt-5 pb-5"><img style="width: 60px;height: 80px;" src="{{ $product->thumb }}" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td class="color-red text-center">{{ number_format($price, 0, '', '.') }}</td>
                    <td class="text-center">


                        <form action="" method="post"></form>
                        <input class="w-25"  type="number" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">
                        <!-- <input type="submit" formaction="/update-cart"> -->
                        <button style="border: none;background: white;" formaction="/update-cart" type="submit"><i class="fas fa-sync border padding"></i></button>
                        @csrf




                    </td>
                    <td class="color-red text-center">{{ number_format($priceEnd, 0, '', '.') }}</td>
                    <td class=" text-center"><a class="color-red" href="/carts/delete/{{ $product->id }}"><i class="fas fa-trash"></i></a></td>
        </tr>
        @endforeach
        </tbody>
          </table>
        </div>


        <div class="col-md-3 border">
            <div class="pt-4 text-center fs-3 ">Tổng Giỏ Hàng</div>
            <br>
            <div class="fs-5 ps-3 color-red text-center">{{ number_format($total, 0, '', '.') }}</div>
            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

              <div class="">
              @if(!Auth::user())
                  <div class="p-4">
                      <div class="text-center">
                          Thông Tin Khách Hàng
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" name="name" placeholder="Tên khách Hàng">
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" name="phone" placeholder="Số Điện Thoại">
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" name="address" placeholder="Địa Chỉ Giao Hàng">
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" name="email" placeholder="Email Liên Hệ">
                      </div>
                @else
                <div class="pt-3">
                          <input class="p-1 w-100" type="text" value="{{Auth::user()->fullname}}" name="name" placeholder="Tên khách Hàng">
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" value="{{Auth::user()->phone}}" name="phone" placeholder="Số Điện Thoại">
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" value="{{Auth::user()->address}}" name="address" placeholder="Địa Chỉ Giao Hàng">
                      </div>

                      <div class="pt-3">
                          <input class="p-1 w-100" type="text" value="{{Auth::user()->email}}" name="email" placeholder="Email Liên Hệ">
                      </div>
                @endif
                      <div class="pt-3">
                          <textarea class="p-1 w-100" name="content" placeholder="Ghi Chú"></textarea>
                      </div>

                      <div class="form-group border p-2">
                        <label>Chế độ giao hàng</label>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="nhanh" type="radio" id="nhanh" name="giaohang" checked="">
                        <label for="nhanh" class="custom-control-label">Nhanh</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="Tiết Kiệm" type="radio" id="tietkiem" name="giaohang">
                        <label for="tietkiem" class="custom-control-label">Tiết Kiệm</label>
                      </div>

                    </div>

                    <div class="form-group border p-2 mt-2">
                      <label>Phương Thức Thanh Toán</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" value="Thanh Toán Khi Nhận Hàng" type="radio" id="nhanhang" name="thanhtoan" checked="">
                      <label for="nhanhang" class="custom-control-label">Thanh Toán Khi Nhận Hàng</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" value="Momo" type="radio" id="momo" name="thanhtoan">
                      <label for="momo" class="custom-control-label">Momo</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" value="Ngân Hàng" type="radio" id="nganhang" name="thanhtoan">
                      <label for="nganhang" class="custom-control-label">Ngân Hàng</label>
                    </div>

                    <div class="pt-3">
                          <input class="p-1 w-100" type="text" name="magiaodich" placeholder="Mã Giao Dịch (Nếu Có)">
                      </div>

                  </div>
                  <button class="btn btn-success mt-2 w-100">Đặt Hàng</button>
                  </div>

              </div>


          </div>


        </div>

    </div>
    </div>
    </form>
    <!-- <button class="btn btn-success mt-2 w-100"><a href="/cart/productstatus/{customer}">xem sản phẩm</a></button> -->



@endsection
