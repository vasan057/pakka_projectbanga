@php $role_sidebar = Auth::user()->roles_id; @endphp
<div class="navbar-default sidebar" role="navigation" style="background-color: #9A1031;">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
       
           
            <li>
                <a href="#" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-home"></i>Auction<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
               
                <li>
                    <a href="{{ url('mandi-daily-price') }}" style="background-color: #9A1031;color:white">Arrival Data</a>
                </li>
                <li>
                    <a href="{{ url('ceiling/view') }}" style="background-color: #9A1031;color:white">View Ceiling</a>
                </li>
                </ul>
            </li>
            
                <li>
                <a href="#" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-shopping-cart"></i>Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('order') }}" style="background-color: #9A1031;color:white">Manage Orders</a>
                    </li>
                    <li>
                        <a href="{{ url('offer') }}" style="background-color: #9A1031;color:white">Manage Offer</a>
                    </li>
                </ul>
            </li>
           
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>