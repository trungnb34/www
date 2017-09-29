@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Static Pages
                    <small>List</small>
                </h1>
                @if(Session::has('log'))
                    <div class="alert alert-danger" id="errorLog">
                        {{ Session::get('log') }}
                    </div>
                @endif
            </div>
            <a href="{{ url('admin/staticpages/add') }}" class="btn btn-primary" id="create_new">Thêm mới</a>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>Stt</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($staticPages as $staticPage)
                <tr class="odd gradeX" align="center">
                    <td>{{ $stt++ }}</td>
                    <td>{{ $staticPage->title }}</td>
                    <td>{{ $staticPage->slug }}</td>
                    <td>
                        @if($staticPage->status_show == 1)
                            {{ 'Hiện' }}
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có muốn xóa');" href="{{ url('admin/staticpages/delete') }}/{{ $staticPage->id }}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/staticpages/edit') }}/{{ $staticPage->id }}">Edit</a></td>
                    <td class="center"><a href="{{ url('admin/staticpages/detail') }}/{{ $staticPage->id }}">Detail</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection