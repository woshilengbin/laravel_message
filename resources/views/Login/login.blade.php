@extends('Common.common')
@section('header')
    <li><a href="{{url('Message/index')}}">首页</a></li>
@stop
@section('content')
    @include('Common.alert')
    <div class="container">
        <form class="form-signin"  action="{{url('Login/doLogin')}}" method="post">
            {{csrf_field()}}
            <h3 class="form-signin-heading">Please sign in</h3>
            <div class="form-group">
                <input type="email" name="username" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <a href="{{url('Login/registered')}}">还没有账号，注册</a>
            <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
        </form>
    </div>
@stop