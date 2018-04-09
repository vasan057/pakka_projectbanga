@php $role_sidebar = Auth::user()->roles_id; @endphp
<div class="navbar-default sidebar" role="navigation" style="background-color: #9A1031;">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-home"></i> Master Data<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('view-users') }}" style="background-color: #9A1031;color:white">User Details</a>
                    </li>
                    <li>
                        <a href="{{ url('mandi') }}" style="background-color: #9A1031;color:white">Mandi Details</a>
                    </li>
                        
                    <li>
                        <a href="{{ url('role') }}" style="background-color: #9A1031;color:white">Roles</a>
                    </li>
                    <li>
                        <a href="{{ url('view-locations') }}" style="background-color: #9A1031;color:white">Locations</a>
                    </li>
                    <li>
                            <a href="{{ url('view-states') }}" style="background-color: #9A1031;color:white">States</a>
                    </li>
                    <li>
                        <a href="{{ url('view-competitors') }}" style="background-color: #9A1031;color:white">Competitors</a>
                    </li>
                        <li>
                        <a href="{{ url('view-destinations') }}" style="background-color: #9A1031;color:white">Destination Master</a>
                    </li>
                    <li>
                        <a href="{{ url('view-mandi-destination') }}" style="background-color: #9A1031;color:white">Mandi Destination Mapping</a>
                    </li>
                    <li>
                        <a href="{{ url('for-line-items') }}" style="background-color: #9A1031;color:white">FOR Line Items</a>
                    </li>
                    <li>
                        <a href="{{ url('for-freight-get') }}" style="background-color: #9A1031;color:white">FOR Freights</a>
                    </li>
                    <li>
                        <a href="{{ url('view-agmarks') }}" style="background-color: #9A1031;color:white">Agmark Master</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('view-mandi-user') }}" style="background-color: #9A1031;color:white">Mandi User Mapping</a>
                    </li>
            
                    <li>
                        <a href="{{ url('role-manager') }}" style="background-color: #9A1031;color:white">Role Manager</a>
                    </li>
            
                </ul>
                <!-- /.nav-second-level -->
            </li>
           
        </ul>
        </div>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>