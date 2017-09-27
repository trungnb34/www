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
                        <textarea class="form-control" rows="3" name="title" placeholder="Please Enter Title" >{{ old('title') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textare id="staticpage" name="contentText"></textare>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái hiển thị</label>
                        <div>
                            <label class="radio-inline"><input type="radio" name="status_show" value="1" checked>Hiển thị</label>
                            <label class="radio-inline"><input type="radio" name="status_show" value="0">Ẩn</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" id="mecha">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('javascript')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/ckfinder/ckfinder.js') }}"></script>
    <script>
        CKEDITOR.replace( 'staticpage');
        CKFinder.setupCKEditor(null,'/ckfinder');
    </script>

    <script>
        $(document).ready(function () {
            $('#mecha').click(function() {
                console.log($('#staticpage').val());
            });
        })
    </script>
@endsection