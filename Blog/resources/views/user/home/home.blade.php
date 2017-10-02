@extends('user.layout.layout')
@section('content')
    @include('user.extentions.slider')
    <div class="row main-left">
        @include('user.home.menu')
        @include('user.home.content')
    </div>
    <!-- end Page Content -->
@endsection