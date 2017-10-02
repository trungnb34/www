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
                    <th>Change</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($postTypes as $postType)
                <tr class="odd gradeX changecolor" align="center" data-status_show="{{ $postType->status_show }}">
                    <td>{{ $stt++ }}</td>
                    <td>{{ $postType->post_type_name }}</td>
                    <td>
                        @if($postType->status_show == 1)
                            {{ 'Hiện' }}
                        @else
                            {{ 'Ẩn' }}
                        @endif
                    </td>
                    <td class="center"><i class="fa fa-exchange" aria-hidden="true"></i>
                        <a href="{{ url('admin/posttypes/change') }}/{{ $postType->id }}">
                            @if($postType->status_show == 1)
                                {{ 'Ẩn' }}
                            @else
                                {{ 'Hiện' }}
                            @endif
                        </a>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/posttypes/edit') }}/{{ $postType->id }}">Edit</a></td>
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