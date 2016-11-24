@extends('Common.common')
@section('header')
    <li><a href="{{url('Message/index')}}">首页</a></li>
    @if(session('user'))
        <li><a href="{{url('Login/userInfo')}}">个人中心</a></li>
            @if(session('user.is_root') ==1)
                <li><a href="{{url('Login/userManagement')}}">用户管理</a></li>
                <li><a href="{{url('Login/messageManagement')}}">留言管理</a></li>
            @endif
        <li><a href="{{url('Login/logout')}}" onclick="return is_logout()">退出</a></li>
    @else
        <li><a href="{{url('Login/login')}}">登陆</a></li>
        <li><a href="{{url('Login/registered')}}">注册</a></li>
    @endif
@stop
@section('content')
@include('Common.alert')
@foreach($messageList as $message)
    <p>{{$message->username}}:</p>
    <p style="text-indent: 50px">{{$message->message}}</p>
    <div class="pull-right">
        <a href="{{url('Login/messageStatus',['id'=>$message->id])}}" onclick="return is_logout()">
            @if($message['status'] == 1)
                禁用
            @else
                启用
            @endif
        </a>&nbsp;&nbsp;
        <a href="{{url('Login/deleteMessage',['id'=>$message->id])}}" onclick="return is_logout()">删除</a>&nbsp;&nbsp;
    </div>
    <p class="pull-right">{{date("Y-m-d H:i:s",$message->created_at)}}&nbsp;&nbsp;&nbsp;</p>
    <hr>
@endforeach
    <div class="pull-right">
        {{$messageList->render()}}
    </div>
@stop