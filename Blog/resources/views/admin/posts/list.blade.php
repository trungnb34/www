@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/style/showavatar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
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
            <div id="create_new">
                <a href="{{ url('admin/post/add') }}" class="btn btn-primary" >Thêm mới</a>
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <select class="selectpicker" id="filterByPost" title="lọc bài viết theo" style="margin-bottom: 15px">
                    <option value="topReadOnMonth">Bài viết được đọc nhiều nhất trong tháng</option>
                    <option value="wirteOnNearest">Bài viết được viết gần nhất</option>
                    <option value="topVote">Bài viết được vote nhiều nhất</option>
                </select>
                <select class="selectpicker" title="lọc theo category" style="margin-bottom: 15px">
                    @foreach($cates as $cate)
                        <option value="{{ $cate->slug }}">{{ $cate->category_name }}</option>
                    @endforeach
                </select>
                <select class="selectpicker" title="lọc theo post type" style="margin-bottom: 15px">
                    @foreach($posttypes as $posttype)
                        <option value="{{ $posttype->id }}">{{ $posttype->post_type_name }}</option>
                    @endforeach
                </select>
                {{--<a href="{{ url('admin/post/list') }}" class="btn btn-primary" >Danh sách</a>--}}
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Title</th>
                    <th>Avatar</th>
                    <th>Authors</th>
                    <th>Post type</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1;?>
                @foreach($posts as $post)
                <tr class="odd gradeX" align="center">
                    <td>{{ $stt++ }}</td>
                    <td>{{ str_limit($post->title, $limit = 15, $end = '...') }}</td>
                    <td><img src="{{ $post->avatar }}" alt="" id="showicon"></td>
                    <td>{{ $post->first_name . ' ' . $post->last_name }}</td>
                    <td>{{ $post->post_type_name }}</td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ url('admin/post/change') }}/{{ $post->id }}">
                            @if($post->time_delete == null)
                                {{ 'Hiện' }}
                            @else
                                {{ 'Ẩn' }}
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
@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin/script/ajaxPost.js') }}"></script>
@endsection