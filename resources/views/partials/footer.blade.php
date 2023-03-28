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

            $('.date_format').flatpickr({
                dateFormat: "d/m/Y",
            });


            $('.date_format_allocation').flatpickr({
                dateFormat: "d/m/Y",
                minDate: dataDiaSeguinteFormatada(),
            });
            
            $('.date_format_removal').flatpickr({
                dateFormat: "d/m/Y",
                minDate: dataDiaSeguinteFormatada(),
            });
            
            $('.date_format_effective_removal').flatpickr({
                dateFormat: "d/m/Y",
                minDate: dataDiaSeguinteFormatada(),
            });


        });

        let dataAtualFormatada = () => {
            let data = new Date(),
                dia  = data.getDate().toString(),
                diaF = (dia.length == 1) ? '0'+dia : dia,
                mes  = (data.getMonth()+1).toString(), 
                mesF = (mes.length == 1) ? '0'+mes : mes,
                anoF = data.getFullYear();
            return diaF+"/"+mesF+"/"+anoF;
        };

        let dataDiaSeguinteFormatada = () => {

            let d = new Date();
            d.setDate(d.getDate() + 1);

            let year = d.getFullYear()
            let month = String(d.getMonth() + 1)
            let day = String(d.getDate())

            month = month.length == 1 ? 
            month.padStart('2', '0') : month;

            day = day.length == 1 ? 
            day.padStart('2', '0') : day;

            return `${day}/${month}/${year}`;
        };

    </script>    
</body>
<!-- END: Body-->

</html>