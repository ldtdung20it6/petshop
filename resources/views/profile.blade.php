@extends('main')

@section('content')
<div class="container">
<form action="/updateProfile" method="POST">


                <div class="card-body mt-5">

                  <div class="form-group">

                    <label for="menu">Họ Và Tên</label>
                    <input type="text" name="fullname" value="{{Auth::user()->fullname}}" class="form-control" placeholder="Nhập họ và tên">
                  </div>


                  <div class="form-group">
                    <label for="menu">Email</label>
                    <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Nhập Email">
                  </div>



                  <div class="form-group">
                    <label for="menu">Số Điện Thoại</label>
                    <input type="integer" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Nhập số điện thoại">
                  </div>

                  <div class="form-group">
                    <label for="menu">Địa Chỉ</label>
                    <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" placeholder="Nhập địa chỉ">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu Lại</button>
                </div>

                @csrf

              </form>
              </div>
@endsection
