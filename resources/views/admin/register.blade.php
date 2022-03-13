<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wids Admin Panel">
    <meta name="keywords" content="Wids Admin Panel">
    <meta name="author" content="Wids Admin Panel">
    <link rel="icon" href="{{asset('admin_assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.png')}}" type="image/x-icon">
    <title>Registration</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/sweetalert2.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin_assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets/css/responsive.css')}}">
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>         
      <div class="container-fluid p-0"> 
        <div class="row m-0">
          <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('admin_assets/images/login/3.jpg')}}" alt="looginpage"></div>
          <div class="col-xl-7 p-0"> 
            <div class="login-card">
               @if(session()->has('error'))

              
                          <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                          <i class="bi-check-circle-fill"></i>
                          <strong> {{session('error')}}.</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>

                               @endif      
              <form class="theme-form login-form" action="{{route('user.register')}}" >
                  @csrf
                <h4 class="text-center">Create your account</h4>

                <div class="form-group">
                  <label>User Role</label>
                  <div class="input-group">
                   <select class="form-control" name="userType" id="userType">
                     <option value="">Select</option>
                     <option value="1">Super Admin</option>
                     <option value="2">Admin</option>

                   </select>
                   <span class="text-danger mt-1">@error('userType') {{$message}}  @enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Your Name</label>
                  <div class="small-group">
                    <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                      <input class="form-control" type="userFirstname" id="userFirstname" placeholder="First Name">
                        <span class="text-danger mt-1">@error('userFirstname') {{$message}}  @enderror</span>
                    </div>
                    <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                      <input class="form-control" type="userLastname" id="userLastname" placeholder="Last Name">
                        <span class="text-danger mt-1">@error('userLastname') {{$message}}  @enderror</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="userEmail " id="userEmail" placeholder="Test@gmail.com">
                      <span class="text-danger mt-1">@error('userEmail ') {{$message}}  @enderror</span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show">                         </span></div>
                      <span class="text-danger mt-1">@error('email') {{$message}}  @enderror</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                </div>
                <div class="login-social-title">                
                  <h5>Sign in with</h5>
                </div>
               
                <p>Already have an account?<a class="ms-2" href="{{url('/')}}">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->
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
    <script src="{{asset('admin_assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('admin_assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>