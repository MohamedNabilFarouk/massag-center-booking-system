    <!-- BEGIN: Vendor JS-->
    <script src="new-admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="new-admin/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="new-admin/app-assets/js/core/app-menu.js"></script>
    <script src="new-admin/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->
    <script src="new-admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="new-admin/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="new-admin/app-assets/js/scripts/components/components-navs.js"></script>
    <script src="new-admin/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="new-admin/app-assets/js/scripts/forms/form-repeater.js"></script>

@include("admin.partials.froala.js")

<script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
