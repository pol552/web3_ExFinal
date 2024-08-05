<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/comida/config/global.php");
require_once(ROOT_DIR . "/model/UsuarioModel.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}

switch ($method) {
    case 'POST':
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_POST['ope'];
        if ($p_ope == 'login') {
            login($input);
        } else if ($p_ope == 'register') {
            register($input);
        } else if ($p_ope == 'logout') {
            session_destroy();
        }
        break;
}

/**
 * Función para manejar el inicio de sesión de un usuario.
 *
 * Esta función toma los datos de entrada para el correo electrónico y la contraseña,
 * los valida y los verifica contra la base de datos. Si las credenciales son correctas,
 * se inicia la sesión del usuario; de lo contrario, se devuelve un mensaje de error.
 *
 * @param array $input Datos de entrada, incluyendo 'cuenta_correo' y 'password_hash'.
 */

function login($input)
{
    $p_correo_electronico = !empty($input['cuenta_correo']) ? $input['cuenta_correo'] : $_POST['cuenta_correo'];
    $p_password = !empty($input['password_hash']) ? $input['password_hash'] : $_POST['password_hash'];
    $p_password = hash('sha512', md5($p_password));
    $su = new UsuarioModel();
    $var = $su->verificarLogin($p_correo_electronico, $p_password);

    if (count($var['DATA']) > 0) {
        $_SESSION['login'] = $var['DATA'][0];
        echo json_encode($var);
        exit();
    } else {
        $array = array();
        $array['ESTADO'] = false;
        $array['ERROR'] = "Usuario o Contraseña no valida, verifique sus datos, demasiados intentos bloqueara al usuario el acceso al sistema.";
        echo json_encode($array);
        exit();
    }
}

/**
 * Función para manejar el registro de un nuevo usuario.
 *
 * Esta función toma los datos de entrada para el correo electrónico, el nombre y la contraseña,
 * los valida y los inserta en la base de datos para registrar un nuevo usuario.
 *
 * @param array $input Datos de entrada, incluyendo 'cuenta_correo', 'nombre_usuario' y 'password_hash'.
 */

function register($input)
{
    $p_correo_electronico = !empty($input['cuenta_correo']) ? $input['cuenta_correo'] : $_POST['cuenta_correo'];
    $p_nombre = !empty($input['nombre_usuario']) ? $input['nombre_usuario'] : $_POST['nombre_usuario'];
    $p_contrasena = !empty($input['password_hash']) ? $input['password_hash'] : $_POST['password_hash'];
    $p_contrasena = hash('sha512', md5($p_contrasena));
    $tseg_usuario = new UsuarioModel();
    $var = $tseg_usuario->register($p_correo_electronico, $p_nombre, $p_contrasena);

    echo json_encode($var);
}
?>
