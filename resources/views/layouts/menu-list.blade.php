@php 
$menu_user = Auth::user();
$role_menu = $menu_user->getWebRole;
$assigned_role = [];
foreach($role_menu as $_role_menu){
    $assigned_role[] = $_role_menu->menu;
}
$parent_menu = App\Library\General::getMenu();
$menu_link = App\Library\General::getViews();
$final_menus = [];
foreach($parent_menu as $_key=>$p_menu){
    $final_menus[$_key] = array_intersect($p_menu,$assigned_role);
    if(!count($final_menus[$_key])) unset($final_menus[$_key]);
}
@endphp
<div class="navbar-default sidebar" role="navigation" style="background-color:transparent;">
    <div class="sidebar-nav navbar-collapse">
    <div class="sidebarmenu">
        <ul class="nav" id="side-menu">
            <li>
            <img src="{{asset('img/UB_icon.png')}}" style="margin-left:20%;background:transparent !important;">
            </li>   
            <li>
            <a href="{{url('/')}}" style="background-color:transparent;color:#264595"><i class="glyphicon glyphicon-dashboard"></i > Dasboard</a>
            </li>
            @foreach($final_menus as $main_key=>$main_menu)
            <li>
                <a href="#" style="background-color:transparent;color:#264595"><i class="glyphicon glyphicon-home"></i> {{$main_key}}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                @foreach($main_menu as $submenu)
                    @php $link = isset($menu_link['Website'][$submenu])? $menu_link['Website'][$submenu]:"#"; @endphp
                    @if($link)
                        <li>
                            <a href="{{ url($link) }}" style="background-color:transparent;color:#264595">{{$submenu}}</a>
                        </li>
                    @endif
                @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
    </div>
</div>
</nav>