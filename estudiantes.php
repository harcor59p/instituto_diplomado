<?php

include("header.php");
include("connection.php");

if ($_POST) {
    $identificacione = $_POST["identificacione"];
    $nombree = $_POST["nombree"];
    $apellidoe = $_POST["apellidoe"];
    $fechanacie = $_POST["fechanacie"];
    $objConexion = new connection();
    $sql = "INSERT INTO estudiantes (Id_Estudiante,Nombres,Apellidos,Fecha_Nacimiento) VALUES ($identificacione , '$nombree' , '$apellidoe' , '$fechanacie'   )";
    $objConexion->ejecutar($sql);
    header("Location:estudiantes.php");
}


?>

<br>
<div class="container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Datos del Estudiante
            </div>
            <div class="card-body">
                <form action="estudiantes.php" method="post">
                    <label for="">Documento ID Estudiante</label>
                    <input type="text" name="identificacione" id="" class="form-control">
                    <br />
                    <label for="">Nombre Estudiante</label>
                    <input type="text" name="nombree" id="" class="form-control">
                    <br />
                    <label for="">Apellido Estudiante</label>
                    <input type="text" name="apellidoe" id="" class="form-control">
                    <br />
                    <label for="">Fecha Nacimiento Estudiante</label>
                    <input type="date" name="fechanacie" id="" class="form-control">
                    <br />
                    <input class="btn btn-success" type="submit" value="Guardar">
                </form>

            </div>

            <div class="card-footer text-muted">
                <?php
                if ($_POST) {
                    echo "Registro guardado con exito";
                }
                ?>

            </div>

        </div>

    </div>

</div>



<?php

include("footer.php");


?>