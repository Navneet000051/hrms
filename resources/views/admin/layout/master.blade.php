<?php

use Illuminate\Support\Facades\Route;
$currentRoute = Route::currentRouteName();
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ !empty($title) ? $title : 'Human Resource Managment System' }} | BFC SOFTTECH | HRMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Besic Funde Clear" name="description" />
    <meta content="CMS" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token meta tag -->
    <!-- App favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/datepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/css1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
</head>
<body>

<div id="layout" class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper text-center">
        <div class="loader">
            <svg class="p-3 bg-light rounded" width="120px" viewBox="0 0 85 25">
                <path d="M12.3,7.2l1.5-3.7l8.1,19.4H19l-2.4-5.7H8.2l1.1-2.5h6.1L12.3,7.2z M14.8,20.2l1,2.7H0L9.5,0h3.1L4.3,20.2H14.8
                z M29,18.5v-14h1.6v12.6h6.2v1.5H29V18.5z M49.6,4.5v9.1c0,1.6-0.5,2.9-1.5,3.8s-2.3,1.4-4,1.4s-3-0.5-3.9-1.4s-1.4-2.2-1.4-3.8V4.5
                h1.6v9.1c0,1.2,0.3,2.1,1,2.7c0.6,0.6,1.6,0.9,2.8,0.9s2.1-0.3,2.7-0.9c0.6-0.6,1-1.5,1-2.7V4.5H49.6z M59.4,5.7
                c-1.5,0-2.8,0.5-3.7,1.5s-1.3,2.4-1.3,4.2s0.4,3.3,1.3,4.3c0.9,1,2.1,1.5,3.7,1.5c1,0,2.1-0.2,3.4-0.5v1.4c-1,0.4-2.2,0.5-3.6,0.5
                c-2.1,0-3.7-0.6-4.8-1.9s-1.7-3-1.7-5.4c0-1.4,0.3-2.7,0.8-3.8c0.5-0.9,1.3-1.8,2.3-2.4s2.2-0.9,3.6-0.9c1.5,0,2.8,0.3,3.9,0.8
                l-0.7,1.4C61.5,6,60.4,5.7,59.4,5.7z M65.8,18.5v-14h1.6v14.1h-1.6V18.5z M82.5,11.3c0,2.3-0.6,4.1-1.9,5.3s-3.1,1.8-5.4,1.8h-3.9
                V4.5h4.3c2.2,0,3.9,0.6,5.1,1.8S82.5,9.2,82.5,11.3z M80.8,11.4c0-1.8-0.5-3.2-1.4-4.1s-2.3-1.4-4.1-1.4h-2.4v11.2h2
                c1.9,0,3.4-0.5,4.4-1.4S80.8,13.3,80.8,11.4z" />
            </svg>
            <div class="h5 fw-light mt-3">Please wait</div>
        </div>
    </div>

    <div id="wrapper">

        <!-- top navbar -->
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                </div>

                <div class="navbar-brand ps-2 py-0">
                    <a href="{{ route('admin.admindashboard') }}" class="d-none d-lg-flex" >
                        <!-- <svg width="85px" viewBox="0 0 85 25">
                            <path class="fill-primary" d="M12.3,7.2l1.5-3.7l8.1,19.4H19l-2.4-5.7H8.2l1.1-2.5h6.1L12.3,7.2z M14.8,20.2l1,2.7H0L9.5,0h3.1L4.3,20.2H14.8
                            z M29,18.5v-14h1.6v12.6h6.2v1.5H29V18.5z M49.6,4.5v9.1c0,1.6-0.5,2.9-1.5,3.8s-2.3,1.4-4,1.4s-3-0.5-3.9-1.4s-1.4-2.2-1.4-3.8V4.5
                            h1.6v9.1c0,1.2,0.3,2.1,1,2.7c0.6,0.6,1.6,0.9,2.8,0.9s2.1-0.3,2.7-0.9c0.6-0.6,1-1.5,1-2.7V4.5H49.6z M59.4,5.7
                            c-1.5,0-2.8,0.5-3.7,1.5s-1.3,2.4-1.3,4.2s0.4,3.3,1.3,4.3c0.9,1,2.1,1.5,3.7,1.5c1,0,2.1-0.2,3.4-0.5v1.4c-1,0.4-2.2,0.5-3.6,0.5
                            c-2.1,0-3.7-0.6-4.8-1.9s-1.7-3-1.7-5.4c0-1.4,0.3-2.7,0.8-3.8c0.5-0.9,1.3-1.8,2.3-2.4s2.2-0.9,3.6-0.9c1.5,0,2.8,0.3,3.9,0.8
                            l-0.7,1.4C61.5,6,60.4,5.7,59.4,5.7z M65.8,18.5v-14h1.6v14.1h-1.6V18.5z M82.5,11.3c0,2.3-0.6,4.1-1.9,5.3s-3.1,1.8-5.4,1.8h-3.9
                            V4.5h4.3c2.2,0,3.9,0.6,5.1,1.8S82.5,9.2,82.5,11.3z M80.8,11.4c0-1.8-0.5-3.2-1.4-4.1s-2.3-1.4-4.1-1.4h-2.4v11.2h2
                            c1.9,0,3.4-0.5,4.4-1.4S80.8,13.3,80.8,11.4z" />
                        </svg> -->
                        <img src="https://bfcsofttech.com/assets/img/logo/bfc-logo.webp" alt="logo-dark" height="30">
                    </a>
                </div>
                <div class="navbar-brand ps-2 py-0">
                    <a href="{{ route('admin.admindashboard') }}" class="d-lg-none d-sm-flex">

                        <img src="	https://bfcsofttech.com/assets/img/logo.webp" alt="logo-dark" height="30">
                    </a>
                </div>

                <div class="d-flex flex-grow-1 align-items-center">
                    <div class="d-flex">

                        <form id="navbar-search" class="navbar-form search-form position-relative d-none d-md-block">
                            <input value="" class="form-control" placeholder="Search here..." type="text">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="flex-grow-1">
                        <ul class="nav navbar-nav flex-row justify-content-end align-items-center">
                            <li class="d-none d-sm-block"><a href="#" class="icon-menu"><i class="fa fa-comments"></i></a></li>
                            <li><a href="#" class="icon-menu"><i class="fa fa-envelope"></i><span class="notification-dot"></span></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification-dot"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end p-0 shadow notification">
                                    <ul class="list-unstyled feeds_widget">
                                        <li class="d-flex">
                                            <div class="feeds-left"><i class="fa fa-thumbs-o-up"></i></div>
                                            <div class="feeds-body flex-grow-1">
                                                <h6 class="mb-1">7 New Feedback <small class="float-end text-muted small">Today</small></h6>
                                                <span class="text-muted">It will give a smart finishing to your site</span>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="feeds-left"><i class="fa fa-user"></i></div>
                                            <div class="feeds-body flex-grow-1">
                                                <h6 class="mb-1">New User <small class="float-end text-muted small">10:45</small></h6>
                                                <span class="text-muted">I feel great! Thanks team</span>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="feeds-left"><i class="fa fa-question-circle"></i></div>
                                            <div class="feeds-body flex-grow-1">
                                                <h6 class="mb-1 text-warning">Server Warning <small class="float-end text-muted small">10:50</small></h6>
                                                <span class="text-muted">Your connection is not private</span>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="feeds-left"><i class="fa fa-check"></i></div>
                                            <div class="feeds-body flex-grow-1">
                                                <h6 class="mb-1 text-danger">Issue Fixed <small class="float-end text-muted small">11:05</small></h6>
                                                <span class="text-muted">WE have fix all Design bug with Responsive</span>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="feeds-left"><i class="fa fa-shopping-basket"></i></div>
                                            <div class="feeds-body flex-grow-1">
                                                <h6 class="mb-1">7 New Orders <small class="float-end text-muted small">11:35</small></h6>
                                                <span class="text-muted">You received a new oder from Tina.</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- more link -->
                            <li class="dropdown">

                                <a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">    <img src="https://bfcsofttech.com/assets/img/logo.webp" alt="logo-dark" height="30"><span class="d-none d-xl-inline-block ms-1" style="color:gray;">{{ auth()->user()->name}} </span> <i class="fa fa-angle-down d-none d-xl-inline-block"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end p-2 shadow">
                                    <li><a class="dropdown-item rounded-pill" href="{{ route('admin.adminprofile') }}"><i class="me-2 fa fa-user"></i> <span>Profile</span></a></li>
                                    <li><a class="dropdown-item rounded-pill" href="{{ route('admin.changePassword') }}"><i class="me-2 fa fa-unlock-alt"></i> <span>Change Password</span></a></li>
                                 <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item rounded-pill"  href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#smallModal"><i class="me-2 fa fa-power-off"></i> <span>Logout</span></a></li>

                                </ul>
                            </li>

                            <!-- <li class=""><a href="{{ route('admin.adminprofile') }}" class="icon-menu"><i class="fa fa-user"></i></a></li> -->
                            <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#smallModal" class="icon-menu"><i class="fa fa-sign-out"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
   <!-- Default Size -->

    <!-- Small Size -->
    <div class="modal fade" id="smallModal" tabindex="-1" aria-labelledby="smallModal" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header pb-0"  style="border-bottom:none;">
                    <h5 class="modal-title">Logout {{ config('app.name') }}</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                Would you like to logout?
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary"  data-bs-dismiss="modal">NO</a>
                    <a class="btn btn-danger"  href="{{route('admin.logout')}}">YES</a>
                </div>
            </div>
        </div>
    </div>
        <!-- Sidbar menu -->
        <div id="left-sidebar" class="sidebar">

            <!-- nav tab: menu list -->
            <ul class="nav nav-tabs text-center mb-2" role="tablist">
                <li class="nav-item flex-fill"><a class="nav-link active" data-bs-toggle="tab" href="#hr_menu" role="tab">HR</a></li>
                <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#project_menu" role="tab">Project</a></li>
                <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#sub_menu" role="tab"><i class="fa fa-th-large"></i></a></li>
                <li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#setting_menu" role="tab"><i class="fa fa-cog"></i></a></li>
            </ul>

            <!-- nav tab: content -->
            <div class="tab-content px-0">
                <div class="tab-pane active" id="hr_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu active list-unstyled">
                            <li class="{{ $currentRoute == 'admin.dashboard' ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer"></i><span>SuperAdmin Dashboard</span></a></li>
                            <li class="{{ $currentRoute == 'admin.admindashboard' ? 'active' : '' }}"><a href="{{ route('admin.admindashboard') }}"><i class="fa fa-tachometer"></i><span>Admin Dashboard</span></a></li>
                            <li class="{{ $currentRoute == 'admin.holidays' ? 'active' : '' }}"><a href="{{ route('admin.holidays') }}"><i class="fa fa-list-ul"></i><span>Holidays</span></a></li>
                            <li><a href="app-events.html"><i class="fa fa-calendar"></i><span>Events</span></a></li>
                            <li><a href="app-social.html"><i class="fa fa-globe"></i><span>HR Social</span></a></li>
                            <li>
                                <a href="#Employees" class="has-arrow"><i class="fa fa-users"></i><span>Employees</span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ $currentRoute == 'admin.employee' ? 'active' : '' }}"><a href="{{ route('admin.employee') }}">All Employees</a></li>
                                    <li class="{{ $currentRoute == 'admin.leave' ? 'active' : '' }}"><a href="{{ route('admin.leave') }}">Leave Requests</a></li>
                                    <li class="{{ $currentRoute == 'admin.attendance' ? 'active' : '' }}"><a href="{{ route('admin.attendance') }}">Attendance</a></li>
                                    <li class="{{ $currentRoute == 'admin.role' ? 'active' : '' }}"><a href="{{ route('admin.role') }}">Role</a></li>
                                    <li class="{{ $currentRoute == 'admin.department' ? 'active' : '' }}"><a href="{{ route('admin.department') }}">Departments</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="tab-pane fade" id="project_menu" role="tabpanel" >
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu list-unstyled">
                            <li><a href="index2.html"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>

                        </ul>
                    </nav>
                </div>
                <div class="tab-pane" id="sub_menu">
                    <nav class="sidebar-nav">
                        <ul class="main-menu metismenu list-unstyled">
                            <li>
                                <a href="#Blog" class="has-arrow"><i class="fa fa-globe"></i><span>Blog</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="blog-dashboard.html">Dashboard</a></li>
                                    <li><a href="blog-post.html">New Post</a></li>
                                    <li><a href="blog-list.html">Blog List</a></li>
                                    <li><a href="blog-details.html">Blog Detail</a></li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>
                <div class="tab-pane fade" id="setting_menu" role="tabpanel" >
                    <div class="px-3">
                        <h6>Choose Skin</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple" class="mb-2">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="blue" class="mb-2">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="cyan" class="active mb-2">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="green" class="mb-2">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="orange" class="active mb-2">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="blush" class="mb-2">
                                <div class="blush"></div>
                                <span>Blush</span>
                            </li>
                        </ul>
                        <hr>
                        <h6>Theme Option</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mb-1">
                                <div class="form-check form-switch theme-switch">
                                    <input class="form-check-input" type="checkbox" id="theme-switch">
                                    <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <div class="form-check form-switch theme-high-contrast">
                                    <input class="form-check-input" type="checkbox" id="theme-high-contrast">
                                    <label class="form-check-label" for="theme-high-contrast">Enable High
                                        Contrast</label>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <div class="form-check form-switch theme-rtl">
                                    <input class="form-check-input" type="checkbox" id="theme-rtl">
                                    <label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-1">
                                <div class="form-check form-switch minisidebar-active">
                                    <input class="form-check-input" type="checkbox" id="mini-active">
                                    <label class="form-check-label" for="mini-active">Mini Sidebar</label>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <h6>General Settings</h6>
                        <ul class="setting-list list-unstyled">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                    <label class="form-check-label" for="flexCheckDefault1">Email Redirect</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked>
                                    <label class="form-check-label" for="flexCheckDefault2">Notifications</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">Auto Updates</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                    <label class="form-check-label" for="flexCheckDefault4">Offline</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                                    <label class="form-check-label" for="flexCheckDefault5">Location Permission</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        </div>

</div>



<!-- core js file -->

<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/datepicker.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/select2.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/nouislider.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/tagsinput.bundle.js')}}"></script>
<script src="{{asset('assets/plugin/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/bundles/inputmask.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/maskedinput.bundle.js')}}"></script>

<script src="{{asset('assets/bundles/jqueryvalidate.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/jquerysteps.bundle.js')}}"></script>

<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>


<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>


<!-- page js file -->
<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script src="{{asset('assets/js/pages/file/filemanager.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>

<script src="{{asset('assets/bundles/toastr.bundle.js')}}"></script>

  <!--- Validation CDN --->


    <!-- toastr init -->
    <script>
        @if(Session::has('message'))
        var messageType = '{{ Session::get("status") }}';
        var message = '{{ Session::get("message") }}';

        toastr[messageType](message, '', {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });
        @endif


        @if(Session::has('success'))
        toastr.success('{{ Session::get("success") }}', '', {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });
        @endif


        @if(Session::has('error'))
        toastr.error('{{ Session::get("error") }}', '', {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        });
        @endif
    </script>
      @yield('externaljs')
</body>

<!-- Mirrored from wrraptheme.com/templates/lucid/hr/bs5/dist/file-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jun 2024 10:14:20 GMT -->
</html>
