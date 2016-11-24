
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Static Top Navbar Example for Bootstrap@yield('title')</title>
    <link href="{{asset('static/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('static/layout/css/layout.css')}}" rel="stylesheet">
    @section('css')
    @show
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @section('header')
                    <li><a href="{{url('Message/index')}}">首页</a></li>
                    <li><a href="{{url('Login/login')}}">登陆</a></li>
                    <li><a href="{{url('Login/registered')}}">注册</a></li>
                @show
            </ul>
        </div>
    </div>
</nav>


<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @section('footer')
                    <span>Copyright © Leng</span>
                @show
            </div>
        </div>
    </div>
</div>
<script src="{{asset('static/jquery/jquery-3.1.1.js')}}"></script>
<script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>
<script>
    function is_logout() {
        return  window.confirm('sure？')?true:false;
    }

</script>
@section('js')
@show
</body>
</html>
