<!-- https://coderthemes.com/ubold/layouts/material/dashboard-3.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico')}}">

    
<!-- ....................................................... -->
    <!-- <link href="{{ asset('backend/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{{ asset('backend/assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" /> -->
    <!-- Theme Config Js -->
    @stack('css')
    <script src="{{ asset('backend/assets/js/head.js')}}"></script>
    <!-- Bootstrap css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/main.css')}}" rel="stylesheet" type="text/css" />
    @livewireStyles
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- ========== Menu ========== -->
        <div class="app-menu">

            <!-- Brand Logo -->
            <div class="logo-box border-bottom">
                <!-- Brand Logo Light -->
                <a href="{{route('index')}}" class="logo-light" target="_blank">
                    <img src="{{ asset('backend/assets/images/logo-light.png')}}" alt="logo" class="logo-lg">
                    <img src="{{ asset('backend/assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                </a>

                <!-- Brand Logo Dark -->
                <a href="{{route('index')}}" class="logo-dark" target="_blank">
                    <img src="{{ asset('backend/assets/images/logo-dark.jpeg')}}" alt="dark logo" class="logo-lg" style="width:170px; height:50px">
                    <img src="{{ asset('backend/assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                </a>
            </div>

            <!-- menu-left -->
            <div class="scrollbar">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                        class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block"
                            data-bs-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted mb-0">Admin Head</p>
                </div>

                <!--- Menu -->
                <ul class="menu">

                    <li class="menu-item">
                        <a href="{{route('dashboard')}}" class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-calendar"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>

                    <li class="menu-item">


                    <li class="menu-item">
                        <a href="{{route('media')}}"  class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-cart-outline"></i></span>
                            <span class="menu-text"> Media </span>
                        </a>
                    </li>

                    {{-- <li class="menu-item">
                        <a href="#menuCrm" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-account-multiple-outline"></i></span>
                            <span class="menu-text"> Article </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuCrm">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="crm-dashboard.html" class="menu-link">
                                        <span class="menu-text">All Article</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="crm-contacts.html" class="menu-link">
                                        <span class="menu-text">Add New Article</span>
                                    </a>
                                </li>

                                <!-- <li class="menu-item">
                                    <a href="crm-contacts.html" class="menu-link">
                                        <span class="menu-text">Categories</span>
                                    </a>
                                </li> -->
                               
                            </ul>
                        </div>
                    </li> --}}

                    <li class="menu-item">
                        <a href="{{route('category')}}"  class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-cart-outline"></i></span>
                            <span class="menu-text"> Categories </span>
                        </a>
                    </li>

                    {{-- <li class="menu-item">
                        <a href="#menuEmail" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-email-multiple-outline"></i></span>
                            <span class="menu-text"> Users </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuEmail">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="email-inbox.html" class="menu-link">
                                        <span class="menu-text">All Users</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="email-inbox.html" class="menu-link">
                                        <span class="menu-text">All New User</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="email-read.html" class="menu-link">
                                        <span class="menu-text">Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}


                    <li class="menu-item">
                        <a href="#menuProjects" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-briefcase-check-outline"></i></span>
                            <span class="menu-text"> Products </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuProjects">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{route('productview')}}" class="menu-link">
                                        <span class="menu-text">View Products</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{route('product')}}" class="menu-link">
                                        <span class="menu-text">Add Product</span>
                                    </a>
                                </li>
                                
                                </li>
                                <!-- <li class="menu-item">
                                    <a href="project-create.html" class="menu-link">
                                        <span class="menu-text">Attributes</span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <a href="#menuTasks" data-bs-toggle="collapse" class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-clipboard-multiple-outline"></i></span>
                            <span class="menu-text"> Blogs </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuTasks">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="{{ route('blogview') }}" class="menu-link">
                                        <span class="menu-text">View Blogs</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('blogs') }}" class="menu-link">
                                        <span class="menu-text">Add Blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="menu-item">
                        <a href="{{ route('enquiry') }}"  class="menu-link">
                            <span class="menu-icon"><i class="mdi mdi-cart-outline"></i></span>
                            <span class="menu-text"> Enquiries </span>
                        </a>
                    </li>
                </ul>
                <!--- End Menu -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left menu End ========== -->





        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a href="index.html" class="logo-light">
                                <img src="assets/images/logo-light.png" alt="logo" class="logo-lg">
                                <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg">
                                <img src="assets/images/logo-sm.png" alt="small logo" class="logo-sm">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>

                    </div>

                    <ul class="topbar-menu d-flex align-items-center">


                        <!-- Fullscreen Button -->
                        <li class="d-none d-md-inline-block">
                            <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                                <i class="fe-maximize font-22"></i>
                            </a>
                        </li>

                        <!-- User Dropdown -->
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="ms-1 d-none d-md-inline-block">
                                    Vikas Kumar <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="{{route('adminlogout')}}" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>

                        <!-- Right Bar offcanvas button (Theme Customization Panel) -->
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="content">

                @yield("content")

            </div> <!-- content -->

            

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    @stack('js')
    <!-- ......jquery............ -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- Vendor js -->
    <script src="{{ asset('backend/assets/js/vendor.min.js')}}"></script>
    <!-- App js -->
    <script src="{{ asset('backend/assets/js/app.min.js')}}"></script>
    <script src="{{ asset('backend/assets/libs/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
   
    
</body>
@livewireScripts
</html>