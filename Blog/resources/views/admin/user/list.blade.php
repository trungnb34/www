@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post Type
                    <small>List</small>
                </h1>
                @if(Session::has('log'))
                    <div class="alert alert-danger" id="errorLog">
                        {{ Session::get('log') }}
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($users as $user)
                    <tr class="odd gradeX changecolor" align="center" data-status_show="{{ $user->activate }}">
                        <td>{{ $stt++ }}</td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td class="center"><i class="fa fa-exchange" aria-hidden="true"></i>
                            <a href="{{ url('admin/user/change') }}/{{ $user->id }}">
                                @if($user->activate == 1)
                                    {{ 'Hoạt động' }}
                                @else
                                    {{ 'Tạm dừng' }}
                                @endif
                            </a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/user/detail') }}/{{ $user->id }}">Detail</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('admin/script/changecolor.js') }}"></script>
@endsection