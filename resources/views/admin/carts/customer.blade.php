@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt</th>
            <th>Trạng Thái Giao Hàng</th>

            <th style="width: 100px">Thông Tin</th>
            <!-- <th style="width: 100px;">$nbsp;</th> -->
        </tr>
    </thead>
    <tbody>

        {!! \App\Helpers\Helper::shipPing($customers) !!}
    </tbody>
</table>

{!! $customers->links() !!}
@endsection

