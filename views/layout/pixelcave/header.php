<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer-soft32x32.png">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/integer144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/Integer152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>logo/Integer180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>bootstrap.min.css">
        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>plugins.css">
        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo $_layoutParams['ruta_css']; ?>themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
        <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo $_layoutParams['ruta_js']; ?>vendor/modernizr-respond.min.js"></script>

        
        <!--<script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>public/js/jquery.validate.js" type="text/javascript"></script>-->
        
        <!-- JS personalizado para cada controlador -->
        <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
            <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
                <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
            <?php endfor; ?>
        <?php endif; ?>
        <!-- Fin JS personalizado  -->

        <!-- CSS personalizado para cada controlador -->
        <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
            <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
                <link rel="stylesheet" href="<?php echo $_layoutParams['css'][$i]; ?>">
            <?php endfor; ?>
        <?php endif; ?>
        <!-- Fin CSS personalizado  -->

    </head>

    <body>
        <div id="fondo">
        <div class="patron">
            <?php if ($_layoutParams['item'] == 'login'): ?>


            <?php else: ?>
                
                <nav class="navbar navbar-default">
                    <div class="container">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!--<div id="logo">
                                    <a class="navbar-brand" href="#">
                                        <img alt="<?php echo APP_NAME; ?>" src="<?php echo $_layoutParams['ruta_img']; ?>logos/Integer57.png">
                                    </a>
                                </div>-->
                                <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><?php echo APP_NAME; ?></a>
                            </div>
                         
                

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php if(isset($_layoutParams['menu'])): ?>
                                        <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                                            <?php 

                                                if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
                                                $_item_style = 'active'; 
                                                } else {
                                                $_item_style = '';
                                                }

                                            ?>

                                        <li class="<?php echo $_item_style; ?>"><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?><span class="sr-only">(current)</span></a></li>

                                        <?php endfor; ?>
                                    <?php endif; ?>
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="<?php echo BASE_URL; ?>puc">PUC</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>manual">Contabilidad Manual</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo BASE_URL; ?>registro">Registro de usuarios</a></li>
                                      </ul>
                                    </li>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="container">                  

                    <div id="contenido" class="row">
                        <div class="col-md-8 col-md-offset-1 contenido">

                    

                    <?php endif ?>
                    
                        <div id="content">
                            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
                            
                            <?php if(isset($this->_error)): ?>
                            <div id="error" class="alert alert-danger" role="alert"><?php echo $this->_error; ?></div>
                            <?php endif; ?>

                             <?php if(isset($this->_mensaje)): ?>
                            <div id="mensaje" class="alert alert-success" role="alert"><?php echo $this->_mensaje; ?></div>
                            <?php endif; ?>

                        </div>

                        <br /><br />


        