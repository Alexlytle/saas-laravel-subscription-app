<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav ">
            <li class="nav-item ">
                <a class="nav-link" href="{{route('adminhome')}}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
        
         

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                    aria-controls="ui-basic1">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">User</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic1">
                    <ul class="nav flex-column sub-menu">
                       
                        <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">Users</a>
                            <li class="nav-item"> <a class="nav-link" href="{{route('user.show',['newuser'])}}">Create Users</a>
                   
                        </li>
                    </ul>
                </div>

               
               
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                    aria-controls="ui-basic2">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">Plans</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic2">
                    <ul class="nav flex-column sub-menu">
                       
                        <li class="nav-item"> <a class="nav-link" href="{{route('plan.index')}}">Plans</a>
                           
                        <li class="nav-item"> <a class="nav-link" href="{{route('plan.create')}}">Create Plan </a></li>

                       
                    </ul>
                </div>
               
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false"
                    aria-controls="ui-basic3">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">Subscriptions</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic3">
                    <ul class="nav flex-column sub-menu">
                       
                        <li class="nav-item"> <a class="nav-link" href="{{route('subscription.index')}}">Subscriptions</a>
                           
               

                       
                    </ul>
                </div>
               
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false"
                    aria-controls="ui-basic3">
                    <i class="mdi mdi-circle-outline menu-icon"></i>
                    <span class="menu-title">Single Charge</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic3">
                    <ul class="nav flex-column sub-menu">
                       
                        <li class="nav-item"> 
                            <a class="nav-link" href="{{route('showSimpleChargeAdmin')}}">Home</a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="{{route('createSimpleChargeAdmin')}}">Create</a>
                        </li>

                       
                    </ul>
                </div>
               
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="mdi mdi-account-multiple
                    "></i> 
                    <span class="menu-title"> All advertisements</span>
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="">
                    <i class="mdi mdi-chart-pie menu-icon"></i>
                    <span class="menu-title">Reported ads</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/icons/mdi.html">
                    <i class="mdi mdi-emoticon menu-icon"></i>
                    <span class="menu-title">Icons</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">User Pages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="documentation/documentation.html">
                    <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                    <span class="menu-title">Documentation</span>
                </a>
            </li> --}}
        </ul>
    </nav>
