<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="{{url('assets/img/favicon.png')}}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Administrator</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin_asset/plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{asset('admin_asset/modules/js/general.js')}}"></script>
  <script src="{{asset('admin_asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin_asset/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
  <script>$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});</script>
  <script>$.widget.bridge('uibutton', $.ui.button);</script>
@yield("head")
</head>

<body class="hold-transition skin-yellow sidebar-mini">
  <div class="bubblingG hide">
    <span id="bubblingG_1"></span>
    <span id="bubblingG_2"></span>
    <span id="bubblingG_3"></span>
  </div>
  
  
  <div class="wrapper">

    <header class="main-header">
      <a href="{{url('admin')}}" class="logo"><span class="logo-mini"><b>Ti</b>les</span>
        <span class="logo-lg"><b>Tiles</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{url('admin_asset/dist/img/giftbtn.png')}}" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo session()->get("unlocker")[0]; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-body">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#myModal">Change Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{url('/admin/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <form id="frmCpw">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Change password</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input type="password" class="form-control" id="txtCpass" name="txtCpass" placeholder="Current password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="txtNewpass" name="txtNewpass" placeholder="New password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="txtNewpass2" name="txtNewpass2" placeholder="Retype new password">
              </div>
            </div>
            
            <div class="modal-footer">
              <p class="pull-left" id="cperr"></p>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="cpw">Save changes</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}" ><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard </span></a> </li>

          <li class="{{ (Request::is('admin/category') || Request::is('admin/create-category') || Request::is('admin/edit-category') || Request::is('admin/upload-images/*')) ? 'active treeview' : 'treeview' }}"><a href="#."><i class="fa fa-info"></i> <span>Category</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a> 
    
              <ul class="treeview-menu">
                  <li class="{{ (Request::is('admin/category')) ? 'active' : '' }}"><a href="{{url('admin/category')}}"><i class="fa fa-circle"></i> <span>Manage Category</span></a> </li>
                  <li class="{{ (Request::is('admin/create-category')) ? 'active' : '' }}"><a href="{{url('admin/create-category')}}"><i class="fa fa-circle"></i> <span>Create Category</span></a> </li>
              </ul>

          </li>
        
        </ul>


      </section>
    </aside>
    <script src="{{asset('admin_asset/modules/js/change.js')}}"></script>
    @yield("content")
    <footer class="main-footer"><strong>Copyright &copy; <?php echo date("Y");?> </strong> All rights reserved. </footer>
  
  </div>

  <script src="{{asset('admin_asset/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin_asset/dist/js/adminlte.min.js')}}"></script>
  <script src="{{asset('admin_asset/plugins/iCheck/icheck.min.js')}}"></script>
  <script src="{{asset('admin_asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('admin_asset/bower_components/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('admin_asset/modules/js/bootbox.min.js')}}"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('admin_asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.js')}}"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

  <script type="text/javascript">
    var date = new Date();
    date.setDate(date.getDate());
    $('#datepicker').datepicker({});
    $('#datepicker2').datepicker({});
    
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
    
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    CKEDITOR.replace('msg_desc').config.allowedContent = true;
    });

    $('.dropdown').on('show.bs.dropdown', function(e){
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });
    
    $('.dropdown').on('hide.bs.dropdown', function(e){
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });

    function validate(evt) {
          var theEvent = evt || window.event;
           var key = theEvent.keyCode || theEvent.which;
           key = String.fromCharCode( key );
           var regex = /[0-9]|\./;
           if( !regex.test(key)) {theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }

      $(function () {
        $('.datatable_button').DataTable({
            paging: false,
            "ordering": false,
            "language": {
            "search": "Extra Search:"
          },
          dom: 'Bfrtip',
            buttons: [
                'csv', 'print'
            ]
        });

        $('.datatable').DataTable({});
        
      });

        $('.input_only_num').keypress(function(event) {
            if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
                    $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        }).on('paste', function(event) {
            event.preventDefault();
        });

        $(".numbersonly").keydown(function (e) {
        // Prevent shift key since its not needed  
        if (e.shiftKey == true) {
            e.preventDefault();
        }
        // Allow Only: keyboard 0-9, numpad 0-9  
        if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)
        //Allow Only: backspace, tab, left arrow, right arrow  
        ||
        e.keyCode == 8 || e.keyCode == 9 || e.keyCode == 37 || e.keyCode == 39
        //Allow Only: delete, home, end  
        ||
        e.keyCode == 46 || e.keyCode == 36 || e.keyCode == 35
        //Allow Only: .(full stop [keyboar, numpad]) and check if there is more than one .(full stop)  
        ||
        ((e.keyCode == 190 || e.keyCode == 110) && $(this).val().indexOf('.') < 0)) {
            // Allow normal operation  
        } else {
            // Prevent the rest  
            e.preventDefault();
        }
        
        });
        
        $(".numbersonly").bind("drop dragover", function (e) {
            e.preventDefault();
        });

    </script>
    



@yield("script")

	</body>

</html>

