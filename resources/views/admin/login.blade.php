<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Administrator</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{url('admin_asset/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{url('admin_asset/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('admin_asset/plugins/iCheck/square/orange.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/moment-timezone-with-data-2012-2022.min.js')}}"></script>
        
<style>

.login-page, .register-page {
   background:linear-gradient(0deg, rgb(67 63 65 / 53%), rgb(45 43 44 / 44%)), url('{{url("img/carousel-2.jpg")}}');
   background-size: cover;
   background-repeat: no-repeat;
   overflow-y: hidden;
}
#txtUname, #txtPass{
color:#ED6436;
background:none;border-color: #ED6436; 
}
#txtUname::-webkit-input-placeholder, #txtPass::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #ED6436!important;
}
#txtUname::-moz-placeholder , #txtPass::-moz-placeholder { /* Firefox 19+ */
  color: #ED6436!important;
}
#txtUname:-ms-input-placeholder, #txtPass:-ms-input-placeholder { /* IE 10+ */
  color: #ED6436!important;
}
#txtUname:-moz-placeholder, #txtPass:-moz-placeholder { /* Firefox 18- */
  color: #ED6436!important;
}
</style>
</head>
<body class="hold-transition login-page">
  <div class="login-box defaltlognin">
    <!-- /.login-logo -->
    <div class="login-box-body" style="text-align: center;">
      
      
      @if(session()->has('error'))
            <span class="text-danger pull-left loginerror">{{ session()->get('error') }}</span>
            @endif
            
      <h3>Tiles Lover</h3>
      <form action="#" method="post" onsubmit="return false">
          <input type="hidden" name="tz" id="tz">
        <div class="form-group has-feedback">
          <input type="text" id="txtUname" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback" style="color:#ED6436;"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="txtPass" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#ED6436;"></span>
        </div>
        <div class="row">
           <div class="col-xs-12">
         <!--  <a href="#" id="forgetpass11" class="pull-left" style="color: #60c4b4;">Forget password?</a> -->
         
         @if(session()->has('success'))
            <span class="text-success pull-left loginerror">{{ session()->get('success') }}</span>
            @endif
            <span id='err' class="text-danger hide pull-left">Invalid credentials!</span>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" id="btnSingin" class="btn btn-primary btn-block btn-flat" style="background-color: transparent;
    border-color: #ED6436;
    color: #ED6436;">Sign In</button>
          </div>
          
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
<!-- forget pass -->
<div class="login-box recoveraccess hide">
    <!-- /.login-logo -->
    <div class="login-box-body">
      <img src="{{url('images/logo.png')}}" style="margin-bottom:10px;">
 <p class="text-center">Please check you mail account to renew password</p>
      <form action="#" method="post">
        <div class="form-group has-feedback">
          <input type="text" id="recovermailid" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
       
        <div class="row">
          <div class="col-xs-8">
          
            <div class="checkbox icheck">
              <label>
                <span id='err2' class="text-danger hide"></span>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="button" id="btnchgpass" class="btn btn-primary btn-block btn-flat">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- recover access -->
  <!-- /.login-box -->
  <!-- jQuery 3 -->
  <script src="{{url('admin_asset/modules/js/general.js')}}"></script>
  <script src="{{url('admin_asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{url('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{url('admin_asset/plugins/iCheck/icheck.min.js')}}"></script>
  <script src="{{url('admin_asset/modules/js/signin.js')}}"></script>
  
  <script>
        $(function () {
            // guess user timezone
            $('#tz').val(moment.tz.guess())
        })
    </script>
    
</body>
</html>
