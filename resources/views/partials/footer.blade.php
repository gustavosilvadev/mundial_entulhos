{{-- 
</div>
</div>
</div> 

</div>

</div>
</div>
--}}

<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="col-xs-1 text-center"><span class="d-md-inline-block mt-25">© 2023-<script>document.write(new Date().getFullYear());</script> Mundial Entulhos<span class="d-none d-sm-inline-block">, All Rights Reserved</span></span></p>
    </footer>
    <button class="btn btn-dark btn-lg btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ URL::asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ URL::asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>

    
    <script src="{{ URL::asset('app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>


    <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script> 



    <script src="{{ URL::asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    
    <script src="{{ URL::asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.pt.js') }}"></script>



    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ URL::asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ URL::asset('app-assets/js/scripts/pages/page-blog-edit.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/pages/app-todo.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/tables/table-datatables-advanced.js') }}"></script>
    <script src="{{ URL::asset('app-assets/js/scripts/forms/form-input-mask.js') }}"></script>


    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {

            $('#table_teste_gustavo').DataTable();
            
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }


            // $('#date_format').flatpickr({
            $('.date_format').flatpickr({
                // l10ns: languages['${e://Field/Q_Language}'],
                dateFormat: "d/m/Y",
                // minDate: "02/16/2023",
                // maxDate: "today"
                // minDate: "today"
            });


        })
    </script>    
</body>
<!-- END: Body-->

</html>