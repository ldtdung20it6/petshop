@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Chuyên Cung Cấp</th>
            <th style="width: 100px;">Chỉnh Sửa</th>

        </tr>
    </thead>
    <tbody>
    {!! \App\Helpers\Helper::supplier($suppliers) !!}
    </tbody>
</table>
@endsection

