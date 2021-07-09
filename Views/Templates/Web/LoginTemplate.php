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

        <!-- Validate Login Session -->
        <?php if(isset($_SESSION["user_id"])){  header("Location: ".$path."Inicio"); } ?>
    </head>
    
    <body style="background-image: url('<?php echo $path; ?>Public/img/background.jpg'); background-size: cover;">

        <!-- Content dinamic -->
        <div id="content">
            <div class="card w-25">
                <?php echo $content; ?>
            </div>
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

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <script>
            window.setTimeout(function() { $(".alert").alert('close'); }, 2000);
        </script>
    
    </body>
</html>