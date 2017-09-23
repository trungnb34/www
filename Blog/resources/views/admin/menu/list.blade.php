@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Menu
                    <small>List</small>
                </h1>
            </div>
            <a href="{{ url('admin/menu/add') }}" class="btn btn-primary" id="create_new">Thêm mới</a>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên menu</th>
                    <th>Trạng thái</th>
                    <th>Change</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($data as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt++ }}</td>
                        <td>{{ $item->name_menu }}</td>
                        <td>
                            @if($item->status_show == 1)
                                {{ 'Hiện' }}
                            @else
                                {{ 'Ẩn' }}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-exchange" aria-hidden="true"></i>
                            <a href="{{ url('admin/menu/change') }}/{{ $item->id }}">
                                @if($item->status_show == 1)
                                    {{ ' Ẩn' }}
                                @else
                                    {{ ' Hiện' }}
                                @endif
                            </a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/menu/edit') }}/{{ $item->id }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection