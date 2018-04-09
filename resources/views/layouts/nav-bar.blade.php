<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: transparent;">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    </div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    
            
            
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw" style="color:white;"></i> <i class="fa fa-caret-down" style="color:white;"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                        <span class="pull-right text-muted small">12 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-tasks fa-fw"></i> New Task
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a class="text-center" href="#">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>
        <!-- /.dropdown-alerts -->
    </li>
    <!-- /.dropdown -->
    @if(Auth::check())
    <!-- /.dropdown -->
    @php $user = Auth::user(); @endphp
    <li class=""><a href="#" style="color:#264595"><strong>{{$user->user_id}}({{$user->role_view or '-'}})</strong></a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw" style="color:#264595;"></i> <i class="fa fa-caret-down" style="color:white;"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#" style="background-color: #264595;color:white"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
@include('layouts.sidebar')
<!-- /.navbar-static-side -->
</nav>