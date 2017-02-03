</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>admin_bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo BASE_URL; ?>admin_bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo BASE_URL; ?>admin_bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo BASE_URL; ?>admin_bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>admin_bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo BASE_URL; ?>dist/js/sb-admin-2.js"></script>

     <!-- datetimepicker -->
    <script src="<?php echo BASE_URL; ?>admin_bower_components/date-time-picker/jquery.datetimepicker.full.min.js"></script>

    
    <script>
    $(document).ready(function() {

        $('.from_date').datetimepicker();
        $('.to_date').datetimepicker();
        
        $('#manage-posts').DataTable({
                responsive: true,
                "order": [[ 9, "desc" ]]
        });
        $('#manage-users').DataTable({
                responsive: true,
        });
        
        if ($('.auto-close-btn').length) {
            setTimeout( "$('.auto-close-area').fadeOut();", 4000);
        }
    });
    </script>
    
    </body>

</html>
