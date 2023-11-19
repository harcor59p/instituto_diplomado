<?php

include("header.php");
include("connection.php");

if ($_POST) {
    $identificacionp = $_POST["identificacionp"];
    $nombrep = $_POST["nombrep"];
    $apellidop = $_POST["apellidop"];
    $direccionp = $_POST["direccionp"];
    $telefonop = $_POST["telefonop"];
    $objConexion = new connection();
    $sql = "INSERT INTO profesores (Id_Profesor,Nombres,Apellidos,Direccion,Telefono) VALUES ($identificacionp , '$nombrep' , '$apellidop' , '$direccionp' , '$telefonop' )";
    $objConexion->ejecutar($sql);
    header("Location:profesores.php");
}

$objConexion2 = new connection();
$sql2 = "SELECT Id_Profesor,Nombres,Apellidos,Direccion,Telefono FROM profesores";
$resultado2 = $objConexion2->consultar($sql2);

?>
<br/>
<div class="container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Datos del Profesor
            </div>
            <div class="card-body">
                <form action="profesores.php" method="post">
                    <label for="">Documento ID Profesor</label>
                    <input type="text" name="identificacionp" id="" class="form-control">
                    <br />
                    <label for="">Nombre Profesor</label>
                    <input type="text" name="nombrep" id="" class="form-control">
                    <br />
                    <label for="">Apellido Profesor</label>
                    <input type="text" name="apellidop" id="" class="form-control">
                    <br />
                    <label for="">Dirección Profesor</label>
                    <input type="text" name="direccionp" id="" class="form-control">
                    <br />
                    <label for="">Telefono Profesor</label>
                    <input type="text" name="telefonop" id="" class="form-control">
                    <br />
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
    <br />
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>Documento Id Profesor</th>
                        <th>Nombre Profesor</th>
                        <th>Apellido Profesor</th>
                        <th>Dirección Profesor</th>
                        <th>Telefóno Profesor</th>
                        <th>Gestión de Registros</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultado2 as $registros) { ?>
                        <tr>
                            <td><?php echo $registros["Id_Profesor"] ?></td>
                            <td><?php echo $registros["Nombres"] ?></td>
                            <td><?php echo $registros["Apellidos"] ?></td>
                            <td><?php echo $registros["Direccion"] ?></td>
                            <td><?php echo $registros["Telefono"] ?></td>
                            <td>
                                <div class="d-grid gap-2 col-12 mx-auto">
                                    <a class="btn btn-warning" href="">Editar</a>
                                    <a class="btn btn-danger" href="">Eliminar</a>
                                </div>
                            </td>
                        </tr> <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php

include("footer.php");


?>