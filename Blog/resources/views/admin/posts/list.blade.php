@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/style/showavatar.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Posts
                    <small>List</small>
                </h1>
                @if(Session::has('log'))
                    <div class="alert alert-danger" id="errorLog">
                        {{ Session::get('log') }}
                    </div>
                @endif
            </div>
            <a href="{{ url('admin/post/add') }}" class="btn btn-primary" id="create_new">Thêm mới</a>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Title</th>
                    <th>Avatar</th>
                    <th>Authors</th>
                    <th>Status</th>
                    <th>Post type</th>
                    <th>Change</th>
                    <th>Edit</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($posts as $post)
                <tr class="odd gradeX" align="center">
                    <td>{{ $stt++ }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img src="{{ $post->avatar }}" alt="" id="showicon"></td>
                    <td>{{ $post->first_name . ' ' . $post->last_name }}</td>
                    <td>
                        @if($post->time_delete == null)
                            {{ 'Hiện' }}
                        @else
                            {{ 'Ẩn' }}
                        @endif
                    </td>
                    <td>{{ $post->post_type_name }}</td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ url('admin/post/change') }}/{{ $post->id }}">
                            @if($post->time_delete == null)
                                {{ 'Ẩn' }}
                            @else
                                {{ 'Hiện' }}
                            @endif
                        </a>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/post/edit') }}/{{ $post->slug }}">Edit</a></td>
                    <td class="center"><a href="{{ url('admin/post/detail') }}/{{ $post->slug }}"> Detail</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection