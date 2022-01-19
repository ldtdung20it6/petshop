@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group">
                    <label for="menu">Tên Bài Viết</label>
                    <input type="text" name="name" value="{{ $posts->name }}"  class="form-control" placeholder="Nhập Tên Bài Viết">
                </div>

                <div class="form-group">
                    <label for="menu">Liên Kết</label>
                    <input type="text" name="link" value="{{ $posts->link }}"  class="form-control" placeholder="Nhập Liên Kết Bài Viết">
                </div>


            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" value="{{ $posts->content }}" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Bài Viết</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
