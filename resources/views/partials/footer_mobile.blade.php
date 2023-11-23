<script src="{{ URL::asset('public/app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/js/core/app.js') }}"></script>
<script src="{{ URL::asset('public/app-assets/js/scripts/pages/app-todo.js') }}"></script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
        $('.date_format_service_search').flatpickr({
                disableMobile: "true",
                dateFormat: "d/m/Y",
                onReady: function(dateObj, dateStr, instance) {
                    let $cal = $(instance.calendarContainer);
                    if ($cal.find('.flatpickr-clear').length < 1) {

                    }
                }                
        });
    });

</script>

</body>
</html>