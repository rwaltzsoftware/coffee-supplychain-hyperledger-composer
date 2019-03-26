<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/plugins/images/imperialsofetch.png">
    <title>Imperial Softech</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url();?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/parsley.css">
<style type="text/css">
        .float-right
        {
            float: right;
        }

        .parsley-required , .parsley-type,.red{
            color: red;
        }
    </style>

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">

            <?php 
                if($this->session->flashdata('error') != false)
                {
            ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>

            <?php 
                }
            ?>
            
            <div class="white-box">

                    <div class="text-center">
                        <div class="col-xs-12">
                             <!-- <img src="dist/images/imperialsofetch.png"/> -->
                             <img src="<?php echo base_url(); ?>assets/plugins/images/coffee-supplychain.png" style="width: 225px; height: 225px;" />
                        </div>
                    </div>
                <form class="form-horizontal form-material" id="loginform" action="<?php echo base_url().'Admin_auth/process_login'?>"method="POST" >
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text"  placeholder="Email" name = "email"  data-parsley-type='email' data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password"  placeholder="Password" name="password" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            
                    <div class="form-group text-center m-t-20">
                         <div class="col-xs-6 p-b-20">
                            <input type="submit" class ="btn btn-md btn-rounded btn-block btn-info" name="btn_login">
                        </div>
                    

                         <div class="form-group text-center m-t-20">
                         <div class="col-xs-6 p-b-20">
                            <a href="/coffee_supplychain_app/">Go Back</a>
                        </div>

                        </div>
                    
                    
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercas<?php echo base_url(); ?>assets/e waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
<div class="clearfix"></div>
</div>

    </section>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>assets/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
    <script type="text/javascript" src="http://localhost/coffee_supplychain_app/assets/js/parsley.min.js"></script>

    <!--Style Switcher -->

          <script type="text/javascript">
            var userFormInstance;
            $(document).ready(function(){
                userFormInstance = $("#loginform").parsley();
               });
           </script>


</body>

</html>

