 <!-- Navigation -->
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #9A1031;">
 <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
     </button>
     
     <img src="/lsapp/resources/views/UB_icon.png" style="height: 54px;padding-right: 0px;border-left-width: 0px;margin-left: 61px;">
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
     <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
             <i class="fa fa-user fa-fw" style="color:white;"></i> <i class="fa fa-caret-down" style="color:white;"></i>
         </a>
         <ul class="dropdown-menu dropdown-user">
             <li><a href="#" style="background-color: #9A1031;color:white"><i class="fa fa-user fa-fw"></i> User Profile</a>
             </li>
             <li class="divider"></li>
             <li><a href="../../public/login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
             </li>
         </ul>
         <!-- /.dropdown-user -->
     </li>
     <!-- /.dropdown -->
 </ul>
 <!-- /.navbar-top-links -->

 <div class="navbar-default sidebar" role="navigation" style="background-color: #9A1031;">
     <div class="sidebar-nav navbar-collapse">
         <ul class="nav" id="side-menu">
             <li>
                 <a href="{{ url('import_agmarkmaster') }}" style="background-color: #9A1031;color:white">Import Agmarknet</a>
             </li>
             <li>
                 <a href="index.html" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-th-large"></i> Dashboard</a>
             </li>
             <li>
                 <a href="index.html" style="background-color: #9A1031;color:white"><i class="fa fa-dashboard fa-fw"></i> Order</a>
             </li>
             <li>
                 <a href="index.html" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-cloud-upload"></i> Upload</a>
             </li>
             
            
             <li>
                 <a href="#" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-comment"></i> Procurement<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                     <li>
                         <a href="panels-wells.html" style="background-color: #9A1031;color:white">Agmark Price</a>
                     </li>
                     <li>
                         <a href="buttons.html" style="background-color: #9A1031;color:white">Daily Price</a>
                     </li>
                     <li>
                         <a href="#" style="background-color: #9A1031;color:white">Auction</a>
                     </li>
                     <li>
                         <a href="notifications.html" style="background-color: #9A1031;color:white">Offline</a>
                     </li>
                 </ul>
                 <!-- /.nav-second-level -->
             </li>
             <li>
                 <a href="#" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-home"></i> Master Data<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                 <li>
                     <a href="{{ url('view-records') }}" style="background-color: #9A1031;color:white">Mandi Details</a>
                 </li>
                 <li>
                     <a href="{{ url('view-users') }}" style="background-color: #9A1031;color:white">User Details</a>
                 </li>
                 <li>
                     <a href="{{ url('view-roles') }}" style="background-color: #9A1031;color:white">Roles</a>
                 </li>
                 <li>
                     <a href="{{ url('view-locations') }}" style="background-color: #9A1031;color:white">Locations</a>
                 </li>
                 <li>
                     <a href="{{ url('view-states') }}" style="background-color: #9A1031;color:white">States</a>
                 </li>
                 <li>
                     <a href="{{ url('view-destinations') }}" style="background-color: #9A1031;color:white">Delivery Locations</a>
                 </li>
                 <li>
                     <a href="{{ url('view-competitors') }}" style="background-color: #9A1031;color:white">Competitors</a>
                 </li>
                 <li>
                     <a href="{{ url('view-freights') }}" style="background-color: #9A1031;color:white">For Freights</a>
                 </li>
                 <li>
                     <a href="{{ url('view-lineitems') }}" style="background-color: #9A1031;color:white">For Line Items</a>
                 </li>
                 <li>
                     <a href="{{ url('view-agmarks') }}" style="background-color: #9A1031;color:white">Agmark Master</a>
                 </li>
                 <li>
                     <a href="{{ url('view-mandi-user') }}" style="background-color: #9A1031;color:white">Mandi User Mapping</a>
                 </li>
                 <li>
                     <a href="{{ url('view-mandi-location') }}" style="background-color: #9A1031;color:white">Mandi Location Mapping</a>
                 </li>
                 <li>
                     <a href="{{ url('view-user-role') }}" style="background-color: #9A1031;color:white">User Roles Mapping</a>
                 </li>
                 <li>
                     <a href="{{ url('view-state-location') }}" style="background-color: #9A1031;color:white">State Location Mapping</a>
                 </li>
                 </ul>
                 <!-- /.nav-second-level -->
             </li>
             
             <li>
                 <a href="notifications.html" style="background-color: #9A1031;color:white"><i class="glyphicon glyphicon-calendar"></i>  Holiday</a>
             </li>
         </ul>
     </div>
     <!-- /.sidebar-collapse -->
 </div>
 <!-- /.navbar-static-side -->
</nav>