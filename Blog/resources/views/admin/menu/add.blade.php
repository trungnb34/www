@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Menu
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
                        <label>Tên menu</label>
                        <input class="form-control" name="name_menu" placeholder="Please Enter Name Menu" value="{{ old('name_menu') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái hiển thị</label>
                        <div>
                            <label class="radio-inline"><input type="radio" name="status_show" value="1" checked>Hiển thị</label>
                            <label class="radio-inline"><input type="radio" name="status_show" value="0">Ẩn</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection