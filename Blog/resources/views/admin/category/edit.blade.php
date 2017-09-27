@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
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
                <form action="" method="POST" id="from-add-cate">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Category Parent</label>
                        <input type="hidden" data-id="{{ $cateFind->id }}" value="{{ $cateFind->parent_id }}" id="showParentId">
                        <select class="form-control" name="parent_id" id="parent_id">
                            <option value="0" data-menu="0">==== ROOT ====</option>
                            {{ showCategory($cates) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Menu</label>
                        <select class="form-control" name="menu_id" id="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{ $menu['id'] }}" >{{ $menu['name_menu'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input value="{{ $cateFind->category_name }}" class="form-control" name="category_name" placeholder="Please Enter Category Name" />
                    </div>
                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('javascript')
    <script src="{{ asset('admin/script/addCate.js') }}"></script>
    <script src="{{ asset('admin/script/editCate.js') }}"></script>
@endsection