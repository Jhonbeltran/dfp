<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <link href="<?php echo $_layoutParams['ruta_css']; ?>.css" rel="stylesheet" type="stylesheet" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>materialize.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>public/js/jquery.validate.js" type="text/javascript"></script>
    
        <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
        <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
        
        <?php endfor; ?>
        <?php endif; ?>
    </head>

    <body>
        <?php if ($_layoutParams['item'] != 'login'): ?>
            
    <div class="navbar-fixed">  
    <nav>
        <div class="nav-wrapper  white">
            <a href="<?php echo BASE_URL; ?>" class="brand-logo nombre center blue-grey-text darken-2"><h4>Drink and Fair Play</h4></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons blue-grey-text darken-2">reorder</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo BASE_URL; ?>login" class="blue-grey-text darken-2"><i class="material-icons">assignment_ind</i></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <?php if(isset($_layoutParams['menu'])): ?>
            <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
            <?php 

            if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
            $_item_style = 'current'; 
            } else {
            $_item_style = '';
            }

            ?>

            <li><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>

            <?php endfor; ?>
            <?php endif; ?>

            <li><a class="dropdown-button blue-grey-text nombre" href="#!" data-activates="dropdown1">Menú<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        </div>
    </nav>
    </div>

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="<?php echo BASE_URL; ?>puc">PUC</a></li>
        <li><a href="<?php echo BASE_URL; ?>manual">Manual</a></li>
        <li role="separator" class="divider"></li>
    </ul>
    <ul id="dropdown" class="dropdown-content">
        <li><a href="<?php echo BASE_URL; ?>puc">PUC</a></li>
        <li><a href="<?php echo BASE_URL; ?>manual">Manual</a></li>
        <li role="separator" class="divider"></li>
    </ul>
    <?php endif ?>
    
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
                    
            <?php if(isset($this->_error)): ?>
            <div class="card-panel red lighten-1"><?php echo $this->_error; ?></div>
            <?php endif; ?>

            <?php if(isset($this->_mensaje)): ?>
            <div class="card-panel green"><?php echo $this->_mensaje; ?></div>
            <?php endif; ?>