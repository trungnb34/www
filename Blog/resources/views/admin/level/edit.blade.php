@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Level
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
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name Level</label>
                        <input class="form-control" value="{{ $levelFind->level_name }}" name="level_name" placeholder="Please Enter Level Name" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <input class="form-control" value="{{ $levelFind->level }}" name="level" placeholder="Please Enter Level" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <div>
                            <label class="radio-inline"><input {{ $levelFind->status_show == 1 ? 'checked' : '' }} type="radio" value="1" name="status_show">Hiện</label>
                            <label class="radio-inline"><input {{ $levelFind->status_show == 0 ? 'checked' : '' }} type="radio" value="0" name="status_show">Ẩn</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection