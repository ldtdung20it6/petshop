@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên Bài Viết</th>
            <th>Liên Kết</th>

            <th>Hình ảnh</th>
            <th>Active</th>
            <th>Time</th>
            <th style="width: 100px">Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $key => $post)
    <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->link}}</td>

                <td><a href="{{ $post->thumb }}" target="_blank">
                    <img src="{{ $post->thumb }}" height="40px" width="40px">
                </a>
                </td>
                <td>{!! App\Helpers\Helper::active($post->active) !!}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/posts/edit/ {{ $post->id }}"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeRow( {{ $post->id }} ,'/admin/post/destroy')"><i class="fas fa-trash"></i></a>
                </td>
                </tr>
        @endforeach
    </tbody>
</table>


@endsection

