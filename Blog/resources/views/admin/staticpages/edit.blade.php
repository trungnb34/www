@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Static Pages
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
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên tiêu đề</label>
                        <textarea class="form-control" rows="3" name="title" placeholder="Please Enter Title" >{{ $findStatic->title }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="staticpage" name="contentText">{{ $findStatic->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái hiển thị</label>
                        <div>
                            <label class="radio-inline"><input {{ $findStatic->status_show == 1 ? 'checked' : '' }} type="radio" name="status_show" value="1">Hiển thị</label>
                            <label class="radio-inline"><input {{ $findStatic->status_show == 0 ? 'checked' : '' }} type="radio" name="status_show" value="0">Ẩn</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
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
@endsection
