<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Admin - blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css')  }}" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" id="errorLog">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Session::has('errorLogin'))
                        <div class="alert alert-danger" id="errorLog">
                            {{ Session::get('errorLogin') }}
                        </div>
                    @endif
                    <form role="form" action="" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="123456">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin/dist/js/sb-admin-2.js') }}"></script>

{{--<scripit src="{{ asset('admin/script/js.js') }}"></scripit>--}}

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#errorLog').slideUp();
        }, 3000);
    })
</script>

</body>

</html>
