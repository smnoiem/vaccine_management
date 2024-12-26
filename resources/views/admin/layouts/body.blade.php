@extends('admin.layouts.master')

@section('body')
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('admin.layouts.topbar')
            @include('admin.layouts.sidebar')




            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body text-white">
                    </div>
                </div>
                <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->

                        </div><!-- /.row -->
                            <hr class="border-primary">
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->



                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                    @yield('content')


                
                </div><!--/. container-fluid -->
                </section>
                <!-- /.content -->


                
                <div class="modal fade" id="confirm_modal" role='dialog'>
                    <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <div id="delete_content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="uni_modal" role='dialog'>
                    <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title"></h5>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="uni_modal_right" role='dialog'>
                    <div class="modal-dialog modal-full-height  modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-arrow-right"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="viewer_modal" role='dialog'>
                    <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                            <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                            <img src="" alt="">
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->






        </div>
        <!-- ./wrapper -->
        
        @include('admin.layouts.footer')

        @stack('footer-script')

    </body>

@endsection