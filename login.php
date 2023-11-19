<?php

include("connection.php");

session_start();

$usernamet = "";
$passwordt ="";

if($_POST)
{
    $username = $_POST["username"];
    $objConexion = new connection();
    $sql1 = "SELECT Name_usuario, Password_usuario FROM Usuarios WHERE Name_usuario = '$username'";
    $resultado1 = $objConexion->consultar($sql1);

    foreach($resultado1 as $registros)
    {
        $usernamet = $registros["Name_usuario"];
        $passwordt = $registros["Password_usuario"];
    }

    if(($_POST["username"]==$usernamet) && ($_POST["password"]==$passwordt))
    {
        $_SESSION["username"] = $usernamet;
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Verifique usuario o contraseña');</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Educativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">

        <div class="row">

            <div class="col-md-4">
            
            </div>

            <div class="col-md-4">
                <br/>
                <br/>

                <div class="card">

                    <div class="card-header">
                        Inicio de Sesion
                    </div>
                    <div class="card-body">

                        <form action="login.php" method="post" class="row g-3 needs-validation" novalidate>

                            <label for="valusuario" class="form-label">Usuario:</label>
                            <input class="form-control" type="text" name="username" id="valusuario" required>
                            <div class="invalid-feedback">
                                ¡Completar Campo!
                            </div>
                            <br/>
                            <br/>
                            <label for="valpassword" class="form-label">Contraseña:</label>
                            <input class="form-control" type="password" name="password" id="valpassword" required minlength="5" maxlength="40">
                            <div class="invalid-feedback">
                                ¡Completar Campo!
                            </div>
                            <br/>
                            <br/>
                            <button class="btn btn-success" type="submit">Entrar</button>

                        </form>

                    </div>
                    <div class="card-footer">
                        Instituto Educativo
                    </div>

                </div>

            </div>

            <div class="col-md-4">
            
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Ejemplo de JavaScript inicial para deshabilitar el envío de formularios si hay campos no válidos
        (function () {
        'use strict'

        // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
        var forms = document.querySelectorAll('.needs-validation')

        // Bucle sobre ellos y evitar el envío
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
</body>
</html>