<?php
require_once('../core/ModelBasePDO.php');

class UsuarioModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function findAll()
    {
        $sql = "SELECT cuenta_correo, nombre_usuario, password_hash FROM login_recuperatorio;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    public function findById($p_correo_electronico)
    {
        $sql = "SELECT cuenta_correo, nombre_usuario, password_hash FROM login_recuperatorio
                WHERE cuenta_correo = :p_correo_electronico;";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }

    public function findPaginateAll($p_filtro, $p_limit, $p_offset)
    {
        $sql = "SELECT cuenta_correo, nombre_usuario, password_hash 
                FROM login_recuperatorio
                WHERE upper(concat(IFNULL(cuenta_correo,''), IFNULL(nombre_usuario,''), IFNULL(password_hash,''))) 
                LIKE concat('%', upper(IFNULL(:p_filtro, '')), '%') 
                LIMIT :p_limit OFFSET :p_offset;";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
        $var = parent::gselect($sql, $param);

        $sqlCount = "SELECT COUNT(*) as cant
                     FROM login_recuperatorio
                     WHERE upper(concat(IFNULL(cuenta_correo,''), IFNULL(nombre_usuario,''), IFNULL(password_hash,''))) 
                     LIKE concat('%', upper(IFNULL(:p_filtro, '')), '%');";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $param);
        $var['LENGTH'] = $var1['DATA'][0]['cant'];
        return $var;
    }

    /**
     * Verifica el login de un usuario.
     *
     * Este método consulta la base de datos para verificar si las credenciales
     * proporcionadas coinciden con un usuario registrado. Si las credenciales
     * son válidas, devuelve los datos del usuario.
     *
     * @param string $p_correo_electronico El correo electrónico del usuario.
     * @param string $p_contrasena La contraseña del usuario.
     * @return array Los datos del usuario si las credenciales son válidas.
     */

    public function verificarLogin($p_correo_electronico, $p_contrasena)
    {
        $sql = "SELECT cuenta_correo, nombre_usuario
                FROM login_recuperatorio
                WHERE cuenta_correo = :p_correo_electronico AND password_hash = :p_contrasena;";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }



/**
 * Registra un nuevo usuario en la base de datos.
 *
 * @param string $p_correo_electronico Correo electrónico del usuario.
 * @param string $p_nombre Nombre del usuario.
 * @param string $p_contrasena Contraseña del usuario (ya encriptada).
 * @return mixed Retorna el resultado de la inserción en la base de datos.
 */

public function register($p_correo_electronico, $p_nombre, $p_contrasena)
{
    // Obtener la fecha actual en formato MySQL
    $registration_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO login_recuperatorio (cuenta_correo, nombre_usuario, password_hash, registration_date) 
            VALUES (:p_correo_electronico, :p_nombre, :p_contrasena, :registration_date);";
    
    $params = array(
        [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR],
        [':p_nombre', $p_nombre, PDO::PARAM_STR],
        [':p_contrasena', $p_contrasena, PDO::PARAM_STR],
        [':registration_date', $registration_date, PDO::PARAM_STR] // Fecha actual
    );

    return parent::ginsert($sql, $params);
}


    public function update($p_correo_electronico, $p_nombre, $p_contrasena)
    {
        $sql = "UPDATE login_recuperatorio SET 
                nombre_usuario = :p_nombre, 
                password_hash = :p_contrasena        
                WHERE cuenta_correo = :p_correo_electronico;";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_contrasena', $p_contrasena, PDO::PARAM_STR]);
        return parent::gupdate($sql, $param);
    }



    public function delete($p_correo_electronico)
    {
        $sql = "DELETE FROM login_recuperatorio WHERE cuenta_correo = :p_correo_electronico;";
        $param = array();
        array_push($param, [':p_correo_electronico', $p_correo_electronico, PDO::PARAM_STR]);
        return parent::gdelete($sql, $param);
    }
}
