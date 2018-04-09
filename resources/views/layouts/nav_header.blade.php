<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: transparent;">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    
    <img src="{{asset('img/UB_icon.png')}}" style="transform: translate(-50%, -50%);position: absolute;left: 50%;top: 50%;overflow-x:unset !important;">
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    
@if(Auth::check())
    <!-- /.dropdown -->
    @php $user = Auth::user(); @endphp
    <li class=""><a href="#" style="color:white"><strong>{{$user->user_id}}({{$user->role_view or '-'}})</strong></a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw" style="color:white;"></i> <i class="fa fa-caret-down" style="color:white;"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#" style="background-color: transparent;color:#264595"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li class=""><a href="#">{{$user->user_id}}({{$user->role_view or '-'}})</a></li>
            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
@endif
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->
<!-- /.navbar-static-side -->
</nav>