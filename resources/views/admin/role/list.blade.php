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
            <th>Quyền Hạn</th>
            <th style="width: 100px;">Chỉnh Sửa</th>

        </tr>
    </thead>
    <tbody>


        <!-- @foreach($users as $key => $user)
    <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <a href="{{ $user->thumb }}" target="_blank">
                    <img src="{{ $user->thumb }}" height="40px" width="40px"></a>
                </td>

                <td>{{ $user->fullname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>

                <td>{!! App\Helpers\Helper::roles($user->$roles) !!}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/roles/edit/ {{ $user->id }}"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow( {{ $user->id }} ,'/admin/roles/destroy')"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
        @endforeach -->


        {!! \App\Helpers\Helper::role($roles) !!}

    </tbody>
</table>
@endsection

