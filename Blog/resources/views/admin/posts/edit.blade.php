@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/style/showavatar.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if ($errors->any())
                    <div class="alert alert-danger" id="errorLog">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('log'))
                    <div class="alert alert-danger" id="errorLog">
                        {{ Session::get('log') }}
                    </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($posts as $post)
                    <div class="form-group">
                        <label>Title</label>
                        <textarea placeholder="Please Enter Title" class="form-control" rows="4" name="title">{{ $post->title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar">File avatar</label>
                        <input name="avatar" accept="image/gif, image/jpeg, image/png" type="file" class="form-control-file" id="avatar" >
                        <small id="fileHelp" class="form-text text-muted">Chọn ảnh đại diện cho bài viết. Hình ảnh này sẽ được hiển thị trang của người dùng</small>
                    </div>
                    <div class="form-group" id="showavatar">
                        <img src="{{ $post->avatar }}" alt="" id="show" class="showavatar">
                    </div>
                    <div class="form-group">
                        <label>Categoty</label>
                        <input type="hidden" value="{{ $post->category_id }}" id="showcategory">
                        <select class="form-control" name="category_id" id="optionCates">
                            {{ showCategory($cates) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Post type</label>
                        <select class="form-control" name="post_type_id">
                            @foreach($posttypes as $posttype)
                                <option {{ $post->post_type_id == $posttype->id ? 'selected' : '' }} value="{{ $posttype->id }}">{{ $posttype->post_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content post</label>
                        <textarea id="contentText" name="contentText">{{ $post->fulltext }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <label class="radio-inline">
                            <input name="time_delete" value="1" checked type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="time_delete" value="0" type="radio">Invisible
                        </label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Post Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
@section('javascript')
    @include('admin.extentions.extentions')
    <script src="{{ asset('admin/script/showimg.js') }}"></script>
    <script src="{{ asset('admin/script/editCate.js') }}"></script>
@endsection