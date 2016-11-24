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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>我的信息</h3>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>用户名</th>
                        <th>{{session('user.username')}}
                            @if(session('user.is_root') ==1)
                               <small>超级管理员</small>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <td>密码</td>
                        <td>{{session('user.password')}}</td>
                    </tr>
                    <tr>
                        <td>创建时间</td>
                        <td>{{date("Y-m-d H:i:s",session('user.created_at'))}}</td>
                    </tr>
                    <tr>
                        <td>修改时间</td>
                        <td>{{date("Y-m-d H:i:s",session('user.updated_at'))}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <h3>我的留言</h3>
                <br>
                @foreach($userMessage as $message)
                    <p style="text-indent: 50px">{{$message->message}}</p>
                    <p class="pull-right">{{date("Y-m-d H:i:s",$message->created_at)}}</p>
                    <hr>
                @endforeach
                <div class="pull-right">
                    {{$userMessage->render()}}
                </div>
            </div>
        </div>
    </div>
@stop