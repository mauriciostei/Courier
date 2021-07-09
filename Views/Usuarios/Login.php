
<form action="validate" method="POST">

    <div class="card-header">
        <h4 class="title">Ingreso al Sistema</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="logo">
                <img src="<?php echo $path; ?>Public/img/Logo.png" alt="SIC - Logistica" width="25%" class="rounded mx-auto d-block">
            </div>
        </div>
        <div class="row">
            <label>Ingrese usuario del sistema:</label>
            <input type="text" name="user" class="form-control" placeholder="Usuario del sistema" required>
        </div>
        <div class="row">
            <label>Ingrese contraseña del sistema:</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña del sistema" required>
        </div>

        <br>
        <input type="submit" value="Ingresar" class="form-control btn btn-primary btn-outline-primary">
    </div>
    <div class="card-footer">
        Recuerde que su contraseña es personal y no debe ser compartida
    </div>

</form>

<style>
    .card {
        margin: 5% auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
    }
</style>