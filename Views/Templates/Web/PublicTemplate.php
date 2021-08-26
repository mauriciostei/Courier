<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Logo en navegador -->
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $path; ?>Public/img/Logo.png" >

        <!-- Personal Styles -->
        <link rel="stylesheet" href="<?php echo $path; ?>Public/css/Styles.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Dinamic Title -->
        <title> SIC - <?php echo explode("/",$view)[0]; ?> </title>
    </head>
    
    <body class="bg-light">

        <div class="row fixed-top" id="header-public">
            <div class="col">SIC</div>
            <div class="col">
                <a href="#inicio" class="text-dark">Inicio</a>
                <a href="#contacta" class="text-dark">Contacto</a>
                <a href="#pedido" class="btn btn-outline-primary">Estado de Pedido</a>
                <a href="../Usuarios/Login" class="btn btn-outline-primary">Ingresar</a>
            </div>
        </div>

        <!-- Content dinamic -->
        <div id="content">
        <a href="" name="inicio"></a>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo $path; ?>Public/img/S1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Atardeceres Unicos</h3>
                <p>Nunca perdemos la oportunidad de conectar al Paraguay</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $path; ?>Public/img/S2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>A tu lado siempre</h3>
                <p>No dejes de buscar una sucursal cerca tuyo, estamos en todo el pais</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo $path; ?>Public/img/S3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>Expertos en logistica</h3>
                <p>Contamos con mas de 15 años de experiencia en logistica para una empresa joven</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<br>
<hr>
<br>

<div class="row">
    <div class="col d-flex justify-content-center">
        <!-- <iframe width=90% height="600" src="https://www.youtube.com/embed/OqYLg2q6s1g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
    </div>
    <div class="col">
        <div class="w-75">
            <h3>Lorem Ipsum</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
</div>

    <a href="" name="contacta"></a>
    <br>
    <hr>
    <br>

    <div class="row d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h4>Contacta con Nosotros</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Nombres:</label>
                            <input type="text" class="form-control" placeholder="Nombres Completo">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" placeholder="Apellidos Completo">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Correo:</label>
                            <input type="text" class="form-control" placeholder="Direccion de Correo">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Mensaje a enviar"></textarea>
                    </div>
                </div>

                <br>
                <hr>
                <input type="submit" value="Enviar" class="form-control btn btn-primary btn-outline-primary">
            </div>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <form action="#rastreador" id="rastreador">
    <div class="row d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <h4>Rastrea tu paquete</h4>
            </div>
            <div class="card-body">

                <div class="row" id="consulta">
                    <div class="col">
                        <div class="form-group">
                            <label>Codigo de Envio:</label>
                            <input type="number" class="form-control" placeholder="Ingrese su codigo de paquete" name="pedido" required value="<?php echo @$_REQUEST["pedido"]; ?>">
                        </div>
                    </div>
                </div>

                <br>
                <hr>
                <input type="submit" value="Enviar" class="form-control btn btn-primary btn-outline-primary">

                <br>
                <hr>

                <table class="table table-bordered table-hover table-sm">
                <caption>Paquetes relacionados al pedido</caption>
                <thead>
                    <th>#</th>
                    <th>Paquete</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Hora Llegada</th>
                </thead>
                <tbody>
                    <?php echo $content; ?>
                </tbody>
            </table>

            </div>
        </div>
    </div>
    </form>

    <br>
    <hr>
    <br>

        </div>

        <div class="row" id="footer-public">
            <div class="col">
                <img src="<?php echo $path; ?>Public/img/Logo.png" alt="SIC - Logistica" width="10%">
            </div>
            <div class="col">
                <b>Direccion:</b><br>
                Mcal. Lopez casi Madame Lynch <br>
                Asuncion - Paraguay
            </div>
            <div class="col">
                .
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.1.0.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>