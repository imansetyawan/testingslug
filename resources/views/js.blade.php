<!-- Select2 -->
<script src="{{ url('asset/dist1/plugins/select2/select2.full.min.js')}}"></script>

 <!-- jQuery 2.2.3 -->
<script src="{{ url('asset/dist1/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('asset/dist1/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
<script src="{{ url('asset/dist1/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ url('asset/dist1/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ url('asset/dist1/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ url('asset/dist1/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('asset/dist1/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js')}}"></script>
<script src="{{ url('asset/dist1/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ url('asset/dist1/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('asset/dist1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ url('asset/dist1/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ url('asset/dist1/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('asset/dist1/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('asset/dist1/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('asset/dist1/dist/js/demo.js')}}"></script>
<!-- InputMask -->
<script src="{{ url('asset/dist1/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ url('asset/dist1/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ url('asset/dist1/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="{{ url('asset/dist1/dist/js/sweetalert.min.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript">
$(function(){
	//Initialize Select2 Elements
    $(".select2").select2();
});

$(document).on('click', '.btn-danger', function(e) {
        e.preventDefault();
        var self = $(this);
        swal({
                    title: "Are you sure?",
                    text: "All of the sub categories will be deleted also!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        swal("Deleted!","Category and all sub categories deleted", "success");
                        setTimeout(function() {
                            self.parents("#myform").submit();
                        }, 1000);
                    }
                    else{
                        swal("cancelled","Your categories are safe", "error");
                    }
                });
    });
</script>

