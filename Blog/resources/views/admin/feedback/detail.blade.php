@extends('admin.layout.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Feed back
                    <small>detail</small>
                </h1>
                {{--<a href="{{ url('admin/feedback/list') }}" class="btn btn-primary" id="create_new">Go Back</a>--}}
                {{--<a href="" onclick="location.href = document.referrer; return true;" class="btn btn-primary" id="create_new">Go Back</a>--}}
                <button style="margin-bottom: 15px;" class="btn btn-primary" id="goback">Go Back</button>
            </div>

            <!-- /.col-lg-12 -->
            @foreach($feedbacks as $feedback)
            <div class="col-lg-7" style="padding-bottom:120px">
                <div class="form-group">
                    <label>User Feed back</label>
                    <input disabled class="form-control" value="{{ $feedback->first_name . ' ' . $feedback->last_name }}" />
                </div>
                <div class="form-group">
                    <label>Date time</label>
                    <input disabled class="form-control" value="{{ $feedback->date_time }}" />
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea disabled class="form-control" rows="3">{{ $feedback->content }}</textarea>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
@section('javascript')
    <script>
        var goBack = $('#goback').click(function () {
            var x = document.referrer;
            window.location.assign(x);
        });
    </script>
@endsection