




    <!-- BEGIN: Vendor JS-->
    <script src="{{ URL::asset('public/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ URL::asset('public/app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ URL::asset('public/app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>


    <!-- BEGIN: Theme JS-->
    <script src="{{ URL::asset('public/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ URL::asset('public/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ URL::asset('public/app-assets/js/scripts/pages/app-todo.js') }}"></script>
    <!-- END: Page JS-->



<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){
		
		window.addEventListener('scroll', function() {
	       
			if (window.scrollY > 50) {
				document.getElementById('navbar_top').classList.add('fixed-top');
				// add padding top to show content behind navbar
				navbar_height = document.querySelector('.navbar').offsetHeight;
				document.body.style.paddingTop = navbar_height + 'px';
			} else {
			 	document.getElementById('navbar_top').classList.remove('fixed-top');
				 // remove padding top from body
				document.body.style.paddingTop = '0';
			} 
		});

        $('.date_format_service_search').flatpickr({
                disableMobile: "true",
                dateFormat: "d/m/Y",
                onReady: function(dateObj, dateStr, instance) {
                    let $cal = $(instance.calendarContainer);
                    if ($cal.find('.flatpickr-clear').length < 1) {
                        // $cal.append('<button class="btn flatpickr-clear"><h4>LIMPAR</h4></button>');
                        // $cal.find('.flatpickr-clear').on('click', function() {
                        //     instance.clear();
                        //     instance.close();
                        // });
                    }
                }                
        });

	}); 

</script>

</body>
</html>