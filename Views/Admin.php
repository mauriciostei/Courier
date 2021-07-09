<html>
    <head>
        <title> SIC - <?php echo explode("/",$view)[0]; ?> </title>
        <link rel="stylesheet" href="<?php echo $path; ?>Public/css/Styles.css">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $path; ?>Public/img/Logo.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $path; ?>Public/img/Logo.png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.esm.min.js" integrity="undefined" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo $path; ?>Public/src/DataTableStart.js"></script>

    </head>
    <body>

        <nav>
            <center>
                <img src="<?php echo $path; ?>Public/img/Logo.png" alt="Logo SIC" width=50%>
            </center>
            <hr>
            <ul>
                <li>
                    <a href="<?php echo $path; ?>Ciudades">Ciudades</a>
                </li>
                <li>
                    <a href="<?php echo $path; ?>Sucursales">Sucursales</a>
                </li>
            </ul>
        </nav>
        
        <div id="body">

            <div id="bodyHead">
                <span><?php echo $module; ?></span>
                <button id="close">Cerrar Sistema</button>
            </div>
            <hr>

                <div id="content">
                    <?php echo $content; ?>
                </div>

            <hr>
            <div id="bodyFoot">Pie del sistema</div>

        </div>

    </body>
</html>