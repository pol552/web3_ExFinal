<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $data = [
            'ope' => 'login',
            'cuenta_correo' => $_POST['correo'],
            'password_hash' => $_POST['pass'],
        ];
        $client = new HttpClient(HTTP_BASE);
        $result = $client->post('/controller/Logincontroller.php', $data);

        if ($result["ESTADO"] && isset($result['DATA']) && !empty($result['DATA'])) {
            $_SESSION['login'] = $result['DATA'][0];
            if (isset($_SESSION['login']['nombre_usuario'])) {
                echo "<script>alert('Acceso Autorizado');</script>";
                echo '<script>window.location.href ="' . HTTP_BASE . '/web/com/list";</script>'; // Asegúrate de que esta URL es correcta
            } else {
                echo "<script>alert('Acceso No Autorizado');</script>";
            }
        } else {
            echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas');</script>";
    }
}
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo URL_RESOURCES . "/lib/adminlte/"; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo URL_RESOURCES . "/lib/adminlte/"; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL_RESOURCES . "/lib/adminlte/"; ?>dist/css/adminlte.min.css">
    <!-- Custom styles -->
    <style>
        body, .login-page {
            background-color: #343a40 !important; /* Fondo oscuro */
            color: #ffffff; /* Texto blanco */
        }
        .login-box, .card {
            background-color: #454d55; /* Color de fondo del contenedor */
            border: 1px solid rgba(0,0,0,.125); /* Borde del contenedor */
        }
        .login-logo a {
            color: #ffffff; /* Color del texto del logo */
        }
        .btn-primary {
            background-color: #007bff; /* Color de fondo del botón */
            border-color: #007bff; /* Color del borde del botón */
        }
        .btn-primary:hover {
            background-color: #0069d9; /* Color de fondo del botón al pasar el mouse */
            border-color: #0062cc; /* Color del borde del botón al pasar el mouse */
        }
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5); /* Sombra al enfocar el botón */
        }
        .btn-primary.disabled, .btn-primary:disabled {
            background-color: #007bff; /* Color de fondo del botón deshabilitado */
            border-color: #007bff; /* Color del borde del botón deshabilitado */
        }
        .form-control {
            color: #495057; /* Color del texto en los campos de entrada */
            background-color: #ffffff; /* Color de fondo de los campos de entrada */
            border: 1px solid #ced4da; /* Borde de los campos de entrada */
        }
        .form-control:focus {
            color: #495057; /* Color del texto al enfocar el campo de entrada */
            background-color: #ffffff; /* Color de fondo al enfocar el campo de entrada */
            border-color: #80bdff; /* Color del borde al enfocar el campo de entrada */
            outline: 0; /* Evitar el resplandor al enfocar */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Sombra al enfocar */
        }
    </style>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicia sesión</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo electrónico" name="correo" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-0">
                    <a href="register.html" class="text-center">Registrar a un nuevo miembro</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo URL_RESOURCES . "/lib/adminlte/"; ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_RESOURCES . "/lib/adminlte/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_RESOURCES . "/lib/adminlte/"; ?>dist/js/adminlte.min.js"></script>

</body>

</html>
