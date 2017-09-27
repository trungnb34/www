@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Level
                            <small>List</small>
                        </h1>
                        @if(Session::has('log'))
                            <div class="alert alert-danger" id="errorLog">
                                {{ Session::get('log') }}
                            </div>
                        @endif
                    </div>
                    <a href="{{ url('admin/level/add') }}" class="btn btn-primary" id="create_new">Thêm mới</a>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name Level</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Change</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;?>
                            @foreach($levels as $level)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $stt++ }}</td>
                                <td>{{ $level->level_name }}</td>
                                <td>{{ $level->level }}</td>
                                <td>
                                    @if($level->status_show == 1)
                                        {{ 'Hiện' }}
                                    @else
                                        {{ 'Ẩn' }}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="{{ url('admin/level/change') }}/{{ $level->id }}">
                                        @if($level->status_show == 1)
                                            {{ 'Ẩn' }}
                                        @else
                                            {{ 'Hiện' }}
                                        @endif
                                    </a>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/level/edit') }}/{{ $level->id }}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
@endsection