@extends('operator.layouts.master', ['title' => $title])

@section('body')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
            <div class="wrapper">
                
                @include('operator.layouts.navbar')
                @include('operator.layouts.sidebar')




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
                                <h1 class="m-0">Operator Dashboard</h1>
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
        
        <!-- SweetAlert2 -->
        <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="/assets/plugins/toastr/toastr.min.js"></script>
        <!-- Switch Toggle -->
        <script src="/assets/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
        <!-- Select2 -->
        <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
        <!-- Summernote -->
        <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- dropzonejs -->
        <script src="/assets/plugins/dropzone/min/dropzone.min.js"></script>
        <script src="/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- DateTimePicker -->
        <script src="/assets/dist/js/jquery.datetimepicker.full.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- MOMENT -->
        <script src="/assets/plugins/moment/moment.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.select2').select2({
                    placeholder:"Please select here",
                    width: "100%"
                });
            })
            window.start_load = function(){
                $('body').prepend('<div id="preloader2"></div>')
            }
            window.end_load = function(){
                $('#preloader2').fadeOut('fast', function() {
                    $(this).remove();
                })
            }
            window.viewer_modal = function($src = ''){
                start_load()
                var t = $src.split('.')
                t = t[1]
                if(t =='mp4'){
                var view = $("<video src='"+$src+"' controls autoplay></video>")
                }else{
                var view = $("<img src='"+$src+"' />")
                }
                $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
                $('#viewer_modal .modal-content').append(view)
                $('#viewer_modal').modal({
                        show:true,
                        backdrop:'static',
                        keyboard:false,
                        focus:true
                    })
                    end_load()  

            }
            window.uni_modal = function($title = '' , $url='',$size="", $for="", $parentId=null){
                start_load()
                $.ajax({
                    url:$url,
                    error:err=>{
                        console.log('An error occured')
                        alert("An error occured")
                    },
                    success:function(resp){
                        if(resp){
                            $('#uni_modal .modal-title').html($title)
                            $('#uni_modal .modal-body').html(resp)
                            if($size != ''){
                                $('#uni_modal .modal-dialog').addClass($size)
                            }else{
                                $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                            }
                            $('#uni_modal').modal({
                                show:true,
                                backdrop:'static',
                                keyboard:false,
                                focus:true
                            })
                            if($for == 'category_settings') {
                                processParentDropdown($parentId);
                            }
                            end_load()
                        }
                        else {
                                end_load()
                                console.log('Empty response');
                                alert_toast('Empty response');
                        }
                    }
                })
            }
            window._conf = function($msg='',$func='',$params = []){
                $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
                $('#confirm_modal .modal-body').html($msg)
                $('#confirm_modal').modal('show')
            }
            window.alert_toast= function($msg = 'no message passed',$bg = 'success' ,$pos=''){
                var Toast = Swal.mixin({
                toast: true,
                position: $pos || 'top-end',
                showConfirmButton: false,
                timer: 5000
                });
                Toast.fire({
                    icon: $bg,
                    title: $msg
                })
            }
            $(function () {
                bsCustomFileInput.init();
                $('.select2').select2({
                    placeholder:"Select Here",
                    width:'100%'
                })
                $('.summernote').summernote({
                    height: 300,
                    toolbar: [
                        [ 'style', [ 'style' ] ],
                        [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                        [ 'fontname', [ 'fontname' ] ],
                        [ 'fontsize', [ 'fontsize' ] ],
                        [ 'color', [ 'color' ] ],
                        [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                        [ 'table', [ 'table' ] ],
                        [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
                    ]
                })

                $('.datetimepicker').datetimepicker({
                    format:'Y/m/d H:i',
                    })
                

            })
            $(".switch-toggle").bootstrapToggle();
            $('.number').on('input keyup keypress',function(){
                var val = $(this).val()
                val = val.replace(/[^0-9]/, '');
                val = val.replace(/,/g, '');
                val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
                $(this).val(val)
            })
        </script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/assets/dist/js/adminlte.js"></script>

        <!-- PAGE ../assets/plugins -->
        <!-- jQuery Mapael -->
        <script src="/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="/assets/plugins/raphael/raphael.min.js"></script>
        <script src="/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="/assets/plugins/chart.js/Chart.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="/assets/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/assets/dist/js/pages/dashboard2.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/assets/plugins/jszip/jszip.min.js"></script>
        <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script>
            $(document).ready(function(){
            var page = 'home';
                var s = '';
            if(s!='')
                page = page+'_'+s;
                if($('.nav-link.nav-'+page).length > 0){
                    $('.nav-link.nav-'+page).addClass('active')
                    if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
                    $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
                        $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
                    }
                if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
                $('.nav-link.nav-'+page).parent().addClass('menu-open')
                }

                }
            
            })
        </script>

    </body>

@endsection


