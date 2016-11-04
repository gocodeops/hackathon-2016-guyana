    <!-- Vendor scripts -->
    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="vendor/sweetalert/lib/sweet-alert.min.js"></script>

    <!-- App scripts -->
    <script src="scripts/homer.js"></script>
    <script type="text/javascript" src="scripts/lightbox-plus-jquery.min.js"></script>
    <script src="scripts/jquery.csv.min.js"></script>
    <script src="scripts/jquery.uploadfile.js"></script>
    <!-- <script src="../scripts/checklogin.js"></script> -->


    <script type="text/javascript">
        function getUriParam(name){
            if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
              return decodeURIComponent(name[1]);
        }

        // check if a file exists
        function urlExists(testUrl) {
            var http = jQuery.ajax({
                type:"HEAD",
                url: testUrl,
                async: false
            })
            return http.status;
            // this will return 200 on success, and 0 or negative value on error
        }
    </script>
    </body>
</html>