<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: transparent;">
    </style>
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
@if(Auth::check())

@php $user = Auth::user(); @endphp
    <!-- /.dropdown -->
    <li class=""><a href="#" style="color:#264595"><strong>{{$user->user_id}}({{$user->role_view or '-'}})</strong></a></li>
     <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           

            <i class="far fa fa-bell" style="color:#264595;"></i> <span class="numberCircle" style="position:absolute;padding:1px;top:8%;left:45%;bottom:10%;">{{ \App\Model\NotificationQueue::notificationsAlert()['count'] }}</span><i class="fa fa-caret-down" style="color:#264595;"></i>
        </a>
        @if(\App\Model\NotificationQueue::notificationsAlert()['count'])
        <ul class="dropdown-menu dropdown-user">
            @foreach(\App\Model\NotificationQueue::notificationsAlert()['notifications'] as $notifications)
            <li>
                <a href="{{ url('ceiling/view')}}"  title="{{ $notifications->actual_message }}">
                    <i class="fa fa-comments-o" style="font-size:1.6em;"></i> {{ str_limit($notifications->actual_message,20) }}
                </a>
            </li>
            @endforeach
            
        </ul>
        @endif
       
        <!-- /.dropdown-user -->
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw" style="color:#264595;"></i> <i class="fa fa-caret-down" style="color:#264595;"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#" style="background-color: #264595;color:white;"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
