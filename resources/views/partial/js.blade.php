<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script> 
<script src="{{ asset('assets/vendor/datatables/table/datatables.min.js')}}"></script>
<script src="{{ asset('assets/vendor/bootstrap-dialog/js/bootstrap-dialog.js')}}"></script> 
<script src="{{ asset('assets/vendor/toastr/toastr.js')}}"></script>
<script src="{{ asset('assets/js/ug.js') }}"></script>
<script>
    $(document).ready(function(){
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
</script>