<?php

include("header.php");
include("connection.php");

if ($_POST) {
    $codigom = $_POST["codigom"];
    $nombrem = $_POST["nombrem"];
    $profesorm = $_POST["profesorm"];
    $objConexion = new connection();
    $sql = "INSERT INTO modulos (Id_Modulo,Nombre_Modulo,FK_Profesor_Mdulo) VALUES ($codigom , '$nombrem' , $profesorm )";
    $objConexion->ejecutar($sql);
    header("Location:modulos.php");
}

$conn2 = mysqli_connect("localhost", "root", "", "instituto01");
$sql2 = "SELECT id_profesor  , Nombres FROM profesores";
$resultado2 = mysqli_query($conn2, $sql2);


?>

<br>
<div class="container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Datos del Modulo
            </div>
            <div class="card-body">
                <form action="modulos.php" method="post">
                    <label for="">Codigo del Modulo</label>
                    <input type="text" name="codigom" id="" class="form-control">
                    <br />
                    <label for="">Nombre Modulo</label>
                    <input type="text" name="nombrem" id="" class="form-control">
                    <br />
                    <label for="">Profesor del Modulo</label>
                    <select name="profesorm" class="form-control">
                        <?php
                        while ($profesorml = mysqli_fetch_array($resultado2, MYSQLI_ASSOC)) :;
                        ?>
                            <option value="<?php echo $profesorml["id_profesor"]; ?>">
                                <?php echo $profesorml["Nombres"]; ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                    <br />
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

</div>



<?php

include("footer.php");


?>