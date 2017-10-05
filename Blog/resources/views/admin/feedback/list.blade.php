@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/style/chooseFeedBack.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Feed Backs
                    <small>List</small>
                </h1>
                @if(Session::has('log'))
                    <div class="alert alert-danger" id="errorLog">
                        {{ Session::get('log') }}
                    </div>
                @endif
                <div class="choose">
                    <div class="form-group">
                        <a href="{{ url('admin/feedback/unread') }}" class="btn btn-primary" class="option">Unread Feedbacks</a>
                    </div>
                </div>
                <div class="choose">
                    <div class="form-group">
                        <a href="{{ url('admin/feedback/list') }}" class="btn btn-primary" class="option">All FeedBacks</a>
                    </div>
                </div>
                <div class="choose" >
                    <div class="form-group">
                        <a href="{{ url('admin/feedback/fightallread') }}" class="btn btn-primary" class="option">Fight All Read</a>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>User Name</th>
                    <th>Date Time</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($feedbacks as $feedback)
                <tr class="odd gradeX changecolor" align="center" data-status_show="{{ $feedback->is_read == 1 ? 0 : 1 }}">
                    <td>{{ $stt++ }}</td>
                    <td>{{ $feedback->first_name . ' ' . $feedback->last_name }}</td>
                    <td>{{ $feedback->date_time }}</td>
                    <td>
                        @if($feedback->is_read == 1)
                            {{ 'Chưa đọc' }}
                        @else
                            {{ 'Đã đọc' }}
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc muốn xóa phản hồi này')" href="{{ url('admin/feedback/delete') }}/{{ $feedback->id }}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/feedback/detail') }}/{{ $feedback->id }}">Detail</a></td>
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