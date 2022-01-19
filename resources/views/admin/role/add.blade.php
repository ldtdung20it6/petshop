@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST">
@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="menu">Họ Và Tên</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên">
                  </div>

                  <div class="form-group">
                    <label for="menu">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập Email">
                  </div>

                  <div class="form-group">
                    <label for="menu">Mật Khẩu Truy Cập</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu">
                  </div>

                  <div class="form-group">
                    <label for="menu">Số Điện Thoại</label>
                    <input type="integer" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                  </div>

                  <div class="form-group">
                    <label for="menu">Địa Chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                  </div>



                  <div class="form-group">
                    <label for="menu">Ảnh </label>
                    <input type="file" class="form-control" id="upload">
                    <div id="image_show">

                    </div>
                    <input type="hidden" name="file" id="file">
                  </div>


                  <div class="form-group">
                          <label>Phân Quyền</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="user" type="radio" id="user" name="role"checked="">
                          <label for="user" class="custom-control-label">Người dùng</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="employee" type="radio" id="employee" name="role">
                          <label for="employee" class="custom-control-label">Nhân Viên</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" value="admin" type="radio" id="admin" name="role">
                          <label for="admin" class="custom-control-label">Admin</label>
                        </div>

                      </div>
                  </div>


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm</button>
                </div>

                @csrf

              </form>
@endsection

@section('footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
