        <footer class="footer text-center"> 
            © <?php echo date('Y');?> Coffee SupplyChain by <a href="http://www.imperialsoftech.com/" target="_blank">imperialsoftech.com</a> 
        </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="plugins/bower_components/bootstrap/dist/js/tether.min.js"></script>
    <script src="plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="plugins/bower_components/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="plugins/bower_components/bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

    <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
<!--     <script src="plugins/bower_components/raphael/raphael-min.js"></script> -->
<!--     <script src="plugins/bower_components/morrisjs/morris.js"></script> -->
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>

     <!-- Magnific popup JavaScript -->
    <script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <script type="text/javascript" src="js/parsley.min.js"></script>
    <script type="text/javascript" src="js/sweetAlert.js"></script>

    <!--  contract abi  -->
    <script type="text/javascript" src="js/web3.min.js"></script>
    <script type="text/javascript" src="js/abi/CoffeeSupplyChainAbi.js"></script>
    <script type="text/javascript" src="js/abi/SupplyChainUserAbi.js"></script>


    <!-- ipfs  -->

    <!-- <script src="https://wzrd.in/standalone/buffer"></script> -->
    <script src="https://unpkg.com/ipfs-api@9.0.0/dist/index.js" integrity="sha384-5bXRcW9kyxxnSMbOoHzraqa7Z0PQWIao+cgeg327zit1hz5LZCEbIMx/LWKPReuB"
        crossorigin="anonymous"></script>

    <script type="text/javascript" src="js/app/app.js"></script>

    <?php 
        if(isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], "admin.php") !== false)
        {
            ?>
                <script type="text/javascript" src="js/app/admin.js"></script>
            <?php
        }
        elseif(isset($_SERVER['SCRIPT_NAME']) && strpos($_SERVER['SCRIPT_NAME'], "user.php") !== false)
        {
            ?>
                <script type="text/javascript" src="js/app/user.js"></script>
            <?php
        }
    ?>
    
    <script type="text/javascript" src="js/app/batch-details.js"></script>
    <script type="text/javascript">
        $('.qr-code-magnify').magnificPopup({
              type:'image',
              mainClass: 'mfp-zoom-in'
        });
    </script>

    <!--Style Switcher -->
    <script src="plugins/bower_components/switchery/dist/switchery.min.js"></script>

</body>

</html>
