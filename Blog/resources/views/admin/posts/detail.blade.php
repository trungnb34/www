@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        @foreach($posts as $post)
        <div class="container-fluid">
            <strong>Thể loại  : </strong><span>{{ $post->category_name }}</span>
        </div>
        <div class="container-fluid">
            <h1>{{ $post->title }}</h1>
        </div>
        <hr>
        <div class="container-fluid">
            {!! $post->fulltext !!}
        </div>
        @endforeach
    </div>
@endsection