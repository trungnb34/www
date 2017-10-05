@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/style/showavatar.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
                    <small>Add</small>
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
                    <div class="form-group">
                        <label>Title</label>
                        <textarea placeholder="Please Enter Title" class="form-control" rows="4" name="title">{{ old('title') }}</textarea>
                        {{--<input value="{{ old('title') }}" class="form-control" name="title" placeholder="Please Enter Title" />--}}
                    </div>
                    <div class="form-group">
                        <label for="avatar">File avatar</label>
                        <input name="avatar" accept="image/gif, image/jpeg, image/png" type="file" class="form-control-file" id="avatar" >
                        <small id="fileHelp" class="form-text text-muted">Chọn ảnh đại diện cho bài viết. Hình ảnh này sẽ được hiển thị trang của người dùng</small>
                    </div>
                    <div class="form-group" id="showavatar">
                        <img src="" alt="" id="show">
                    </div>
                    <div class="form-group">
                        <label>Categoty</label>
                        <select class="form-control" name="category_id">
                            {{ showCategory($cates) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Post type</label>
                        <select class="form-control" name="post_type_id">
                            @foreach($posttypes as $posttype)
                                <option value="{{ $posttype->id }}">{{ $posttype->post_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content post</label>
                        <textarea id="contentText" name="contentText">{{ old('contentText') }}</textarea>
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
                    <button type="submit" class="btn btn-default">Post Add</button>
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
@endsection