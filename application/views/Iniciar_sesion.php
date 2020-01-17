<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="shortcut icon" href="https://conta-smart.com/images/favicon.ico"/>-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Conta Smart 2019" />
    <meta name="author" content="Grupo ITMED S.A. de C.V." />
    <title>CONTA SMART | 2019</title>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
    <link href="<?php echo base_url();?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/extra_pages.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico"/>

    </style>
</head>
<body >

    <div class="limiter">
        <div class="container-login100 page-background">
            <div class="wrap-login100">

                    <form class="login100-form validate-form" method="POST" autocomplete="off">
             
                    <span class="login100-form-logo">
                        <img alt="" src="<?php echo base_url();?>assets/img/hospital.png">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Iniciar Sesión
                    </span>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "Enter email">
                        <input class="input100" type="text"name="usuario" id="usuario"  placeholder="Username" value="">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password"  name="contra" id="contra"  placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                       
                 
                    </div>
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100"  type="checkbox" name="remember" id="remember">
                        <label class="label-checkbox100" for="remember">
                            Recordar contraseña
                        </label>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Entrar
                        </button>
                    </div>
                    <div class="text-center p-t-30">
      
                        <a class="txt1" href="">
                            Olvido la contraseña?
                        </a>
                      
                                
                    </div>
                 </form>
            </div>
        </div>
    </div>
    <!-- start js include path -->
    <script src="<?php echo base_url();?>assets/assets/jquery.min.js" ></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url();?>assets/assets/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?php echo base_url();?>assets/assets/login.js"></script>
    <!-- end js include path -->
</body>
</html>