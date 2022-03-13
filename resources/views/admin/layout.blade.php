<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wids">
    <meta name="keywords" content="Wids">
    <meta name="author" content="Wids">
    <link rel="icon" href="{{asset('admin_assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.png')}}" type="image/x-icon">
    <title>@yield('page_title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/feather-icon.css')}}">


    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/vector-map.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/timepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin_assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/select2.css')}}">

  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="{{url('admin/dashboard')}}"><img class="img-fluid" src="{{asset('admin_assets/images/logo/logo.png')}}" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="{{url('admin/dashboard')}}"><img class="img-fluid" src="{{asset('admin_assets/images/logo/dark-logo.png')}}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
          </div>
          <div class="left-menu-header col">
            
          </div>
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
             
              <!--<li class="onhover-dropdown">-->
              <!--  <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>-->
              <!--  <ul class="notification-dropdown onhover-show-div">-->
              <!--    <li>-->
              <!--      <p class="f-w-700 mb-0">You have 3 Notifications<span class="pull-right badge badge-primary badge-pill">4</span></p>-->
              <!--    </li>-->
              <!--    <li class="noti-primary">-->
              <!--      <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>-->
              <!--        <div class="media-body">-->
              <!--          <p>Delivery processing </p><span>10 minutes ago</span>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </li>-->
              <!--    <li class="noti-secondary">-->
              <!--      <div class="media"><span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>-->
              <!--        <div class="media-body">-->
              <!--          <p>Order Complete</p><span>1 hour ago</span>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </li>-->
              <!--    <li class="noti-success">-->
              <!--      <div class="media"><span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>-->
              <!--        <div class="media-body">-->
              <!--          <p>Tickets Generated</p><span>3 hour ago</span>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </li>-->
              <!--    <li class="noti-danger">-->
              <!--      <div class="media"><span class="notification-bg bg-light-danger"><i data-feather="user-check"> </i></span>-->
              <!--        <div class="media-body">-->
              <!--          <p>Delivery Complete</p><span>6 hour ago</span>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </li>-->
              <!--  </ul>-->
              <!--</li>-->
              
              <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="{{url('admin/logout')}}"><i data-feather="log-out"></i>Log out</a></button>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a>
              @if(session('ADMIN_PIC') !='')
            <img class="img-90 rounded-circle" src="{{ asset('user/' . session('ADMIN_PIC')) }}" alt="" style="height: 90px !important;">
            @else
            <img class="img-90 rounded-circle" src="{{asset('admin_assets/images/dashboard/1.png')}}" alt="" style="height: 90px !important;">

            @endif


            <div class="badge-bottom"><span class="badge badge-primary"></span></div><a href="user-profile.html">
              <h6 class="mt-3 f-14 f-w-600">{{session()->get('ADMIN_Name')}}</h6></a>
            <p class="mb-0 font-roboto">Admin</p>
           
          </div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div></li>

                  <li class="dropdown"><a class="@yield('dashboard-selected') nav-link menu-title" href="{{url('admin/dashboard')}}"><i data-feather="home"></i><span>Dashboard </span></a></li>
                    <li class="dropdown"><a class="@yield('role-selected') nav-link menu-title" href="{{url('admin/userrole')}}"><i data-feather="list"></i><span>User Role Master</span></a></li>
                      <li class="dropdown"><a class="@yield('exhibitor-selected') nav-link menu-title" href="{{url('admin/exhibitor')}}"><i data-feather="user-plus"></i><span>Exhibitor Master</span></a> </li>
                   <li class="dropdown"><a class="@yield('user-selected') nav-link menu-title" href="{{url('admin/user')}}"><i data-feather="user-plus"></i><span>User Master</span></a> </li>
                 
                  <li class="dropdown"><a class="@yield('category-selected') nav-link menu-title" href="{{url('admin/category')}}"><i data-feather="menu"></i><span>Category Master</span></a></li>
                  <li class="dropdown"><a class="@yield('event-selected') nav-link menu-title" href="{{url('admin/event')}}"><i data-feather="package"></i><span>Event Master</span></a></li>

                   <li class="dropdown"><a class="@yield('hashtag-selected') nav-link menu-title" href="{{url('admin/hashtag')}}"><i data-feather="hash"></i><span>Hash Tag Master</span></a></li>
                   <!-- <li class="dropdown"><a class="@yield('brochure-selected') nav-link menu-title" href="{{url('admin/brochure')}}"><i data-feather="file-plus"></i><span>Brochure Master</span></a></li>

                   <li class="dropdown"><a class="@yield('video-selected') nav-link menu-title" href="{{url('admin/video')}}"><i data-feather="video"></i><span>Video Master</span></a>
                  
                  </li> -->
                   <li class="dropdown"><a class="@yield('speaker-selected') nav-link menu-title" href="{{url('admin/speaker')}}"><i data-feather="speaker"></i><span>Speaker Master</span></a>
                  
                  </li>
                   <li class="dropdown"><a class="@yield('agenda-selected') nav-link menu-title" href="{{url('admin/agenda')}}"><i data-feather="clock"></i><span>Agenda Master</span></a></li>
                    <!-- <li class="dropdown"><a class="@yield('agendahashtag-selected') nav-link menu-title" href="{{url('admin/agendahashtag')}}"><i data-feather="airplay"></i><span>Agenda Hash Tag Master</span></a></li> -->
                   <li class="dropdown"><a class="@yield('poll-selected') nav-link menu-title" href="{{url('admin/poll')}}"><i data-feather="box"></i><span>Poll Master</span></a></li>
                    <!--  <li class="dropdown"><a class="@yield('pollhashtag-selected') nav-link menu-title" href="{{url('admin/pollhashtag')}}"><i data-feather="airplay"></i><span>Poll Hash Tag Master</span></a></li> -->
                    <li class="dropdown"><a class=" @yield('sponsor-selected') nav-link menu-title" href="{{url('admin/sponsor')}}"><i data-feather="link"></i><span>Sponsor Master</span></a></li>
                
                    <li class="dropdown"><a class="@yield('product-selected') nav-link menu-title" href="{{url('admin/product')}}"><i data-feather="shopping-bag"></i><span>Product Master</span></a> </li>
                     <li class="dropdown"><a class="@yield('notification-selected') nav-link menu-title" href="{{url('admin/notification')}}"><i data-feather="send"></i><span>Notification Master</span></a></li> 
                    <li class="dropdown"><a class="@yield('changepassword-selected') nav-link menu-title" href="{{url('admin/changepassword')}}"><i data-feather="lock"></i><span>Change Password </span></a></li>
                 
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
           <div class="page-body">
             <div class="container-fluid">
              <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}" data-bs-original-title="" title="">Home</a></li> -->
                    <!-- <li class="breadcrumb-item">@yield('page_title')</li> -->
                    
                  </ol>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}" data-bs-original-title="" title="">Home</a></li>
                    <li class="breadcrumb-item">@yield('page_title')</li>

                  </ol>
                </div>
              </div>
            </div>
          </div>
             
             <div class="container-fluid">
                @section('container')

              @show
             </div>

           </div>

         <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2022-23 © Wids All rights reserved.</p>
              </div>
              <div class="col-md-6">
               <!--  <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p> -->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('admin_assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('admin_assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('admin_assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin_assets/js/config.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('admin_assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Plugins JS start-->
   <!--  <script src="{{asset('admin_assets/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{asset('admin_assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script> -->
   <!--  <script src="{{asset('admin_assets/js/chart/knob/knob.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/chart/knob/knob-chart.js')}}"></script> -->
   <!--  <script src="{{asset('admin_assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('admin_assets/js/chart/apex-chart/stock-prices.js')}}"></script> -->
    <script src="{{asset('admin_assets/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/counter/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('admin_assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('admin_assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-au-mill.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-in-mill.js')}}"></script>
    <script src="{{asset('admin_assets/js/vector-map/map/jquery-jvectormap-asia-mill.js')}}"></script>
<!--     <script src="{{asset('admin_assets/js/dashboard/default.js')}}"></script>
 -->  
 
     <script src="{{asset('admin_assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('admin_assets/js/notify/index.js')}}"></script>

    <script src="{{asset('admin_assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('admin_assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('admin_assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
   
    <script src="{{asset('admin_assets/js/time-picker/jquery-clockpicker.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/time-picker/highlight.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/time-picker/clockpicker.js')}}"></script>

    <script src="{{asset('admin_assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/select2/select2-custom.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('admin_assets/js/script.js')}}"></script>
    <script src="{{asset('admin_assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <style type="text/css">
      .customizer-links{
        display: none;
      }
      .card-footer {
    
     border-top: none !important; 
}



    </style>
  </body>
</html>