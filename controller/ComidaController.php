<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/comida/config/global.php");

require_once(ROOT_DIR . "/model/ComidaModel.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}

switch ($method) {
    case 'GET': //consulta
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {
            if ($p_ope == 'filterId') {
                filterId($input);
            } elseif ($p_ope == 'filterSearch') {
                filterPaginateAll($input);
            } elseif ($p_ope ==  'filterall') {
                filterAll($input);
            }
        }
        break;
    case 'POST': //inserta
        insert($input);
        break;
    case 'PUT': //actualiza
        update($input);
        break;
    case 'DELETE': //elimina
        delete($input);
        break;
    default: //metodo NO soportado
        echo 'METODO NO SOPORTADO';
        break;
}

function filterAll($input){
    $tobj = new ComidaModel();
    $var = $tobj->findAll();
    echo json_encode($var);
}

function filterId($input){
    $id = !empty($input['id']) ? $input['id'] : $_GET['id'];
    $tobj = new ComidaModel();
    $var = $tobj->findID($id);
    echo json_encode($var);
}

function filterPaginateAll($input){
    $page = !empty($input['page']) ? $input['page'] : $_GET['page'];
    $busqueda = !empty($input['busqueda']) ? $input['busqueda'] : $_GET['busqueda'];
    $nro_record_page = 16; // Number of records per page
    $limit = 16;
    $offset = abs(($page - 1) * $nro_record_page);
    $tobj = new ComidaModel();
    $var = $tobj->findPaginateAll($limit, $offset, $busqueda);
    echo json_encode($var);
}

function insert($input){
    $ci_nombre = !empty($input['ci_nombre']) ? $input['ci_nombre'] : $_POST['ci_nombre'];
    $ci_tipo = !empty($input['ci_tipo']) ? $input['ci_tipo'] : $_POST['ci_tipo'];
    $ci_precio = !empty($input['ci_precio']) ? $input['ci_precio'] : $_POST['ci_precio'];
    $ci_ingredientes = !empty($input['ci_ingredientes']) ? $input['ci_ingredientes'] : $_POST['ci_ingredientes'];
    $ci_region = !empty($input['ci_region']) ? $input['ci_region'] : $_POST['ci_region'];
    $ci_calorias = !empty($input['ci_calorias']) ? $input['ci_calorias'] : $_POST['ci_calorias'];
    $ci_tiempo_preparacion = !empty($input['ci_tiempo_preparacion']) ? $input['ci_tiempo_preparacion'] : $_POST['ci_tiempo_preparacion'];
    $ci_fecha_introduccion = !empty($input['ci_fecha_introduccion']) ? $input['ci_fecha_introduccion'] : $_POST['ci_fecha_introduccion'];
    $ci_estado = !empty($input['ci_estado']) ? $input['ci_estado'] : $_POST['ci_estado'];
    $ci_chef_id = !empty($input['ci_chef_id']) ? $input['ci_chef_id'] : $_POST['ci_chef_id'];
    $ci_restaurante_id = !empty($input['ci_restaurante_id']) ? $input['ci_restaurante_id'] : $_POST['ci_restaurante_id'];
    $ci_contacto = !empty($input['ci_contacto']) ? $input['ci_contacto'] : $_POST['ci_contacto'];
    $ci_descripcion = !empty($input['ci_descripcion']) ? $input['ci_descripcion'] : $_POST['ci_descripcion'];
    $ci_popularidad = !empty($input['ci_popularidad']) ? $input['ci_popularidad'] : $_POST['ci_popularidad'];
    $ci_comentarios = !empty($input['ci_comentarios']) ? $input['ci_comentarios'] : $_POST['ci_comentarios'];
    
    $tobj = new ComidaModel();
    $var = $tobj->insert(
        $ci_nombre,
        $ci_tipo,
        $ci_precio,
        $ci_ingredientes,
        $ci_region,
        $ci_calorias,
        $ci_tiempo_preparacion,
        $ci_fecha_introduccion,
        $ci_estado,
        $ci_chef_id,
        $ci_restaurante_id,
        $ci_contacto,
        $ci_descripcion,
        $ci_popularidad,
        $ci_comentarios
    );
    echo json_encode($var);
}

function update($input){
    $id = !empty($input['id']) ? $input['id'] : $_POST['id'];
    $ci_nombre = !empty($input['ci_nombre']) ? $input['ci_nombre'] : $_POST['ci_nombre'];
    $ci_tipo = !empty($input['ci_tipo']) ? $input['ci_tipo'] : $_POST['ci_tipo'];
    $ci_precio = !empty($input['ci_precio']) ? $input['ci_precio'] : $_POST['ci_precio'];
    $ci_ingredientes = !empty($input['ci_ingredientes']) ? $input['ci_ingredientes'] : $_POST['ci_ingredientes'];
    $ci_region = !empty($input['ci_region']) ? $input['ci_region'] : $_POST['ci_region'];
    $ci_calorias = !empty($input['ci_calorias']) ? $input['ci_calorias'] : $_POST['ci_calorias'];
    $ci_tiempo_preparacion = !empty($input['ci_tiempo_preparacion']) ? $input['ci_tiempo_preparacion'] : $_POST['ci_tiempo_preparacion'];
    $ci_fecha_introduccion = !empty($input['ci_fecha_introduccion']) ? $input['ci_fecha_introduccion'] : $_POST['ci_fecha_introduccion'];
    $ci_estado = !empty($input['ci_estado']) ? $input['ci_estado'] : $_POST['ci_estado'];
    $ci_chef_id = !empty($input['ci_chef_id']) ? $input['ci_chef_id'] : $_POST['ci_chef_id'];
    $ci_restaurante_id = !empty($input['ci_restaurante_id']) ? $input['ci_restaurante_id'] : $_POST['ci_restaurante_id'];
    $ci_contacto = !empty($input['ci_contacto']) ? $input['ci_contacto'] : $_POST['ci_contacto'];
    $ci_descripcion = !empty($input['ci_descripcion']) ? $input['ci_descripcion'] : $_POST['ci_descripcion'];
    $ci_popularidad = !empty($input['ci_popularidad']) ? $input['ci_popularidad'] : $_POST['ci_popularidad'];
    $ci_comentarios = !empty($input['ci_comentarios']) ? $input['ci_comentarios'] : $_POST['ci_comentarios'];

    $tobj = new ComidaModel();
    $var = $tobj->update(
        $id,
        $ci_nombre,
        $ci_tipo,
        $ci_precio,
        $ci_ingredientes,
        $ci_region,
        $ci_calorias,
        $ci_tiempo_preparacion,
        $ci_fecha_introduccion,
        $ci_estado,
        $ci_chef_id,
        $ci_restaurante_id,
        $ci_contacto,
        $ci_descripcion,
        $ci_popularidad,
        $ci_comentarios
    );
    echo json_encode($var);
}

function delete($input){
    $id = !empty($input['id']) ? $input['id'] : $_POST['id'];
    $tobj = new ComidaModel();
    $var = $tobj->delete($id);
    echo json_encode($var);
}






