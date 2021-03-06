@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
                @if(Session::has('log'))
                    <div class="alert alert-danger" id="errorLog">
                        {{ Session::get('log') }}
                    </div>
                @endif
            </div>
            <a href="{{ url('admin/category/add') }}" class="btn btn-primary" id="create_new">Thêm mới</a>
            <div class="form-group">
                <form action="{{ url('admin/category/filterByMenu') }}" method="POST">
                    {{ csrf_field() }}
                    <select name="menu_id" title="Choose one of the following..." class="form-control"  onchange="this.form.submit()">
                        <option value="0">All</option>
                        @if(isset($menu_id))
                            @foreach($menus as $menu)
                                @if($menu_id == $menu->id)
                                    <option value="{{ $menu['id'] }}" selected>{{ $menu['name_menu'] }}</option>
                                @else
                                    <option value="{{ $menu['id'] }}">{{ $menu['name_menu'] }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($menus as $menu)
                                <option value="{{ $menu['id'] }}" >{{ $menu['name_menu'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </form>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Name</th>
                    <th>Category Parent</th>
                    <th>Slug</th>
                    <th>Menu ID</th>
                    <th>Change</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($cates as $cate)
                    <tr class="odd gradeX changecolor" align="center" data-status_show="{{ $cate->timeDelete != null ? '0' : '1' }}">
                        <td>{{ $stt++ }}</td>
                        <td>{{ $cate->category_name }}</td>
                        <td>
                            @if($cate->parent_id == 0)
                                {{ 'ROOT' }}
                            @else
                                {{--{{ $cate->parent_id }}--}}
                                @foreach($cates as $catePar)
                                    @if($catePar->id == $cate->parent_id)
                                        {{ $catePar->category_name }}
                                        @break
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $cate->slug }}</td>
                        <td>
                            @foreach($menus as $menu)
                                @if($menu->id == $cate->menu_id)
                                    {{ $menu->name_menu }}
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td class="center"><i class="fa fa-exchange" aria-hidden="true"></i>
                            <a onclick="return confirm('Bạn sẽ thay đổi các con của category này')" href="{{ url('admin/category/change') }}/{{ $cate->id }}">
                                @if($cate->timeDelete == null)
                                    {{ 'Hiển' }}
                                @else
                                    {{ 'Ẩn' }}
                                @endif
                            </a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/category/edit') }}/{{ $cate->id }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('javascript')
    <script src="{{ asset('admin/script/changecolor.js') }}"></script>
@endsection