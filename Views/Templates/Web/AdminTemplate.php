<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Logo en navegador -->
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $path; ?>Public/img/Logo.png" >

        <script src="<?php echo $path.'Public/src/Excel.js'; ?>"></script>

        <!-- Iconos -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <!-- Personal Styles -->
        <link rel="stylesheet" href="<?php echo $path; ?>Public/css/Styles.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- MapBox -->
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


        <!-- Dinamic Title -->
        <title> SIC - <?php echo explode("/",$view)[0]; ?> </title>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Validate Login Session -->
        <?php if(!isset($_SESSION["user_id"])){  header("Location: ".$path."Usuarios/Login"); } ?>
    </head>
    
    <body class="bg-light">

        <!-- Sidebar -->
        <div class="float-left position-fixed h-100 border-right" id="sidebar" style="width: 10%;">
        <!-- <div class="float-left position-fixed h-100 bg-info bg-gradient" style="width: 10%;"> -->

            <div class="logo">
                <br>
                <img src="<?php echo $path; ?>Public/img/Logo.png" alt="SIC - Logistica" width="60%" class="rounded mx-auto d-block">
            </div>

            <hr>

            <nav class="nav flex-column">
                <?php foreach(unserialize($_SESSION["user_id"])->listRoles() as $r): ?>
                    <a class="nav-link text-dark <?php echo $module==$r["Nombre"] ? 'active' : ''; ?> " href="<?php echo $path.$r["URL"]; ?>"><?php echo $r["Nombre"]; ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
        
        <!-- Body of the page -->
        <div id="content" style="margin-left: 10%;">

            <div class="row" style="margin-left:1%; margin-right: 1%; padding: 1%;">
                <div class="col">
                    <h4>
                        <?php 
                            switch($module){
                                case 'Det_Envios': echo 'Detalle del Envio'; break;
                                default: echo $module;
                            };
                        ?>
                    </h4>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-outline-primary float-right" onclick="window.location.href='<?php echo $path; ?>Usuarios/Close'">Cerrar Sistema</button>
                </div>
            </div>
            <hr>

            <!-- Content dinamic -->
            <div id="content" style="margin-left: 1%; margin-right: 1%;">
                <?php echo $content; ?>
            </div>

            <?php if(isset($_SESSION['mensaje'])){ ?>
                <br>
                <div class="alert <?php echo $_SESSION['mensaje'][0]; ?> alert-dismissible fade show fixed-bottom float-right" role="alert">
                <?php echo $_SESSION['mensaje'][1]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php } unset($_SESSION['mensaje']) ?>

            <script>
                window.setTimeout(function() { $(".alert").alert('close'); }, 2000);
            </script>

            <script src="<?php echo $path.'Public/src/inputCheckbox.js'; ?>"></script>

        </div>

    </body>
</html>