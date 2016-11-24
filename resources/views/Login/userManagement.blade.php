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
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3>用户信息</h3>
                <table class="table table-hover">
                    <tr>
                        <th>用户</th>
                        <th>密码</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($userInfoes as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{date("Y-m-d H:i:s",$user->created_at)}}</td>
                            <td>{{date("Y-m-d H:i:s",$user->updated_at)}}</td>
                            <td>
                                <a href="{{url('Login/isSureStatus',['id'=>$user->id])}}" onclick="return is_logout()">
                                    @if($user['status'] == 1)
                                        禁止使用
                                    @else
                                        启动使用
                                    @endif
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pull-right">
                    {{$userInfoes->render()}}
                </div>
            </div>
        </div>
    </div>
@stop