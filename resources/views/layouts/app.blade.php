
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <title>DataTables | Gentellela</title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('template/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::asset('template/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{URL::asset('template/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{URL::asset('template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{URL::asset('template/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{URL::asset('template/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('template/vendors/sweetalert-master/dist/sweetalert.css')}}" rel="stylesheet">


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{URL::asset('template/images/img.jpg')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bem vindo,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
            @section('sidebar-menu')
                @include('layouts._includes.sidebar-menu')
            @show
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
            @section('sidebar-footer')
                @include('layouts._includes.sidebar-footer')
            @show
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        @section('top-navigation')
            @include('layouts._includes.top-navigation')
        @show

        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @section('footer')
            @include('layouts._includes.footer')
        @show
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{URL::asset('template/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{URL::asset('template/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('template/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{URL::asset('template/vendors/nprogress/nprogress.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::asset('template/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Datatables -->
<script src="{{URL::asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{URL::asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.js')}}"></script>
<script src="{{URL::asset('template/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

<!-- PNotify -->
<script src="{{URL::asset('template/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{URL::asset('template/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{URL::asset('template/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>


<script src="{{URL::asset('template/vendors/sweetalert-master/dist/sweetalert.min.js')}}"></script>

<!-- jQuery Smart Wizard -->
<script src="{{URL::asset('template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>

{{--jquery clone--}}
<script src="{{URL::asset('js/jquery-cloneya.min.js')}}"></script>


<script src="{{URL::asset('js/jquery-cloneya.min.js')}}"></script>
<script src="{{URL::asset('template/vendors/jquery-validation/dist/jquery.validate.js')}}"></script>
<script src="{{URL::asset('template/vendors/jquery-validation/dist/localization/messages_pt_BR.js')}}"></script>
<script src="{{URL::asset('template/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{URL::asset('template/build/js/custom.min.js')}}"></script>
<script src="{{URL::asset('template/src/js/client.js')}}"></script>

<!-- Datatables -->
<script>
    $(document).ready(function() {

        $('.clone-wrapper').cloneya()
                .on('before_clone.cloneya', function (event, toclone) {
                    // do something
                })
                .on('after_clone.cloneya', function (event, toclone, newclone) {
                    // do something
                })
                .on('before_append.cloneya', function (event, toclone, newclone) {
                    $(newclone).css('display', 'none');
                    $(toclone).fadeOut('fast', function () {
                        $(this).fadeIn('fast');
                    });
                })
                .on('after_append.cloneya', function (event, toclone, newclone) {
                    $(newclone).slideToggle();
                    console.log('finished cloning ' + toclone.attr('id') + ' to ' + newclone.attr('id'));
                })
                .off('remove.cloneya')
                .on('remove.cloneya', function (event, clone) {
                    clone.css('background-color', 'red');

                    $(clone).slideToggle('slow', function () {
                        $(clone).remove();
                    });

                })
                .on('after_delete.cloneya', function () {
                    console.log('deleted');
                });


        $('.clone-wrapper-phone').cloneya()
                .on('before_clone.cloneya', function (event, toclone) {
                    // do something
                })
                .on('after_clone.cloneya', function (event, toclone, newclone) {
                    // do something
                })
                .on('before_append.cloneya', function (event, toclone, newclone) {
                    $(newclone).css('display', 'none');
                    $(toclone).fadeOut('fast', function () {
                        $(this).fadeIn('fast');
                    });
                })
                .on('after_append.cloneya', function (event, toclone, newclone) {
                    $(newclone).slideToggle();
                    console.log('finished cloning ' + toclone.attr('id') + ' to ' + newclone.attr('id'));
                })
                .off('remove.cloneya')
                .on('remove.cloneya', function (event, clone) {
                    clone.css('background-color', 'red');

                    $(clone).slideToggle('slow', function () {
                        $(clone).remove();
                    });

                })
                .on('after_delete.cloneya', function () {
                    console.log('deleted');
                });

        $('.clone-wrapper-email').cloneya()
                .on('before_clone.cloneya', function (event, toclone) {
                    // do something
                })
                .on('after_clone.cloneya', function (event, toclone, newclone) {
                    // do something
                })
                .on('before_append.cloneya', function (event, toclone, newclone) {
                    $(newclone).css('display', 'none');
                    $(toclone).fadeOut('fast', function () {
                        $(this).fadeIn('fast');
                    });
                })
                .on('after_append.cloneya', function (event, toclone, newclone) {
                    $(newclone).slideToggle();
                    console.log('finished cloning ' + toclone.attr('id') + ' to ' + newclone.attr('id'));
                })
                .off('remove.cloneya')
                .on('remove.cloneya', function (event, clone) {
                    clone.css('background-color', 'red');

                    $(clone).slideToggle('slow', function () {
                        $(clone).remove();
                    });

                })
                .on('after_delete.cloneya', function () {
                    console.log('deleted');
                });




        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
</script>
<!-- /Datatables -->
</body>
</html>
