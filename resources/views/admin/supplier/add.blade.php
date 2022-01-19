@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST">
@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="menu">Tên Nhà Cung Cấp</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label for="menu">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label for="menu">Số Điện Thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label for="menu">Địa Chỉ</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập tên danh mục">
                  </div>

                   <div class="form-group">
                    <label for="menu">Ảnh Đại Diện</label>
                    <input type="file" class="form-control" id="upload">
                    <div id="image_show">
                    </div>
                    <input type="hidden" name="file" id="file">
                  </div>

                  <div class="form-group">
                    <label for="menu">Chuyên Cung Cấp</label>
                    <input type="text" name="supplying" class="form-control" placeholder="Nhập tên danh mục">
                  </div>


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm Nhà Cung Cấp</button>
                </div>



              </form>
@endsection

@section('footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
