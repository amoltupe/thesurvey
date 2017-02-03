</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $(".survey-submit-btn").click(function(e){
            
            if(typeof $('.survey-option:checked').val() !== 'undefined'){
                if(confirm('Are you sure?')){
                   return true;
                }else{
                    e.preventDefault();
                    return false;
                }
            }else{
                alert('Please select any answer.');
                 e.preventDefault();
                    return false;
            }
        });
    });
    </script>
    
    </body>

</html>
