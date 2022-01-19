@extends('main')

@section('content')

<div class="w-90 text-center ms-auto me-auto mt-5 fs-1 mb-5">{{ $title}}</div>
@include('products.list')
@include('loadmore')

@endsection
