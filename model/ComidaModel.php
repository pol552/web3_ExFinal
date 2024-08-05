<?php
require_once('../core/ModelBasePDO.php');

class ComidaModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Recupera todos los registros de la tabla `comida_mexicana`.
     * 
     * Este método ejecuta una consulta SQL para seleccionar todos los registros
     * de la tabla `comida_mexicana` y devuelve los resultados.
     * 
     * @return array|null Devuelve un array con todos los registros de la tabla,
     *                    o null si no se encuentran registros.
     * 
     * @throws PDOException Si ocurre un error durante la ejecución de la consulta.
     */
    public function findAll()
    {
        $sql = "SELECT * FROM comida_mexicana;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    /**
     * Recupera un registro específico de la tabla `comida_mexicana` por ID.
     * 
     * Este método ejecuta una consulta SQL para seleccionar un registro de la tabla `comida_mexicana`
     * que coincida con el ID proporcionado.
     * 
     * @param int $id El ID del registro a recuperar.
     * 
     * @return array|null Devuelve un array con el registro especificado, 
     *                    o null si no se encuentra el registro.
     * 
     * @throws PDOException Si ocurre un error durante la ejecución de la consulta.
     */

    public function findID($id)
    {
        $sql = "SELECT * FROM comida_mexicana WHERE id = :id;";
        $params = array();
        array_push($params, [':id', $id, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }

    /**
     * Recupera un conjunto paginado de registros de la tabla `comida_mexicana`.
     * 
     * Este método ejecuta una consulta SQL para seleccionar un conjunto de registros
     * de la tabla `comida_mexicana` que coincidan con el término de búsqueda proporcionado,
     * y limita los resultados de acuerdo con los parámetros de paginación.
     * 
     * @param int $limit El número máximo de registros a devolver.
     * @param int $offset El desplazamiento desde el primer registro a devolver.
     * @param string $busqueda El término de búsqueda para filtrar los registros.
     * 
     * @return array Devuelve un array con los registros paginados y el conteo total de registros que coinciden con la búsqueda.
     * 
     * @throws PDOException Si ocurre un error durante la ejecución de la consulta.
     */

    public function findPaginateAll($limit, $offset, $busqueda)
    {
        $sql = "SELECT * FROM comida_mexicana 
                WHERE UPPER(CONCAT(IFNULL(ci_nombre,''), IFNULL(ci_tipo,''), IFNULL(ci_region,'')))
                LIKE CONCAT('%', UPPER(IFNULL(:busqueda, '')), '%')
                LIMIT :limit OFFSET :offset;";
        $params = array();
        array_push($params, [':limit', $limit, PDO::PARAM_INT]);
        array_push($params, [':offset', $offset, PDO::PARAM_INT]);
        array_push($params, [':busqueda', $busqueda, PDO::PARAM_STR]);
        $data = parent::gselect($sql, $params);

        $sqlCount = "SELECT COUNT(1) AS cant FROM comida_mexicana 
                     WHERE UPPER(CONCAT(IFNULL(ci_nombre,''), IFNULL(ci_tipo,''), IFNULL(ci_region,'')))
                     LIKE CONCAT('%', UPPER(IFNULL(:busqueda, '')), '%');";
        $params = array();
        array_push($params, [':busqueda', $busqueda, PDO::PARAM_STR]);
        $count = parent::gselect($sqlCount, $params);

        $data['LENGHT'] = $count['DATA'][0]['cant'];
        return $data;
    }

    /**
     * Inserta un nuevo registro en la tabla `comida_mexicana`.
     * 
     * Este método ejecuta una consulta SQL para insertar un nuevo registro
     * en la tabla `comida_mexicana` con los valores proporcionados.
     * 
     * @param string $ci_nombre El nombre de la comida.
     * @param string $ci_tipo El tipo de comida.
     * @param float $ci_precio El precio de la comida.
     * @param string $ci_ingredientes Los ingredientes de la comida.
     * @param string $ci_region La región de origen de la comida.
     * @param int $ci_calorias Las calorías de la comida.
     * @param int $ci_tiempo_preparacion El tiempo de preparación de la comida.
     * @param string $ci_fecha_introduccion La fecha de introducción de la comida.
     * @param string $ci_estado El estado de la comida.
     * @param int $ci_chef_id El ID del chef asociado con la comida.
     * @param int $ci_restaurante_id El ID del restaurante asociado con la comida.
     * @param string $ci_contacto El contacto del restaurante o chef.
     * @param string $ci_descripcion La descripción de la comida.
     * @param int $ci_popularidad La popularidad de la comida.
     * @param string $ci_comentarios Comentarios adicionales sobre la comida.
     * 
     * @return bool Devuelve true si la inserción fue exitosa, o false si ocurrió un error.
     * 
     * @throws PDOException Si ocurre un error durante la ejecución de la consulta.
     */

    public function insert($ci_nombre, $ci_tipo, $ci_precio, $ci_ingredientes, $ci_region, $ci_calorias, $ci_tiempo_preparacion, $ci_fecha_introduccion, $ci_estado, $ci_chef_id, $ci_restaurante_id, $ci_contacto, $ci_descripcion, $ci_popularidad, $ci_comentarios)
    {
        $sql = "INSERT INTO comida_mexicana (ci_nombre, ci_tipo, ci_precio, ci_ingredientes, ci_region, ci_calorias, ci_tiempo_preparacion, ci_fecha_introduccion, ci_estado, ci_chef_id, ci_restaurante_id, ci_contacto, ci_descripcion, ci_popularidad, ci_comentarios)
                VALUES (:ci_nombre, :ci_tipo, :ci_precio, :ci_ingredientes, :ci_region, :ci_calorias, :ci_tiempo_preparacion, :ci_fecha_introduccion, :ci_estado, :ci_chef_id, :ci_restaurante_id, :ci_contacto, :ci_descripcion, :ci_popularidad, :ci_comentarios);";
        $params = array(
            [':ci_nombre', $ci_nombre, PDO::PARAM_STR],
            [':ci_tipo', $ci_tipo, PDO::PARAM_STR],
            [':ci_precio', $ci_precio, PDO::PARAM_STR],
            [':ci_ingredientes', $ci_ingredientes, PDO::PARAM_STR],
            [':ci_region', $ci_region, PDO::PARAM_STR],
            [':ci_calorias', $ci_calorias, PDO::PARAM_INT],
            [':ci_tiempo_preparacion', $ci_tiempo_preparacion, PDO::PARAM_INT],
            [':ci_fecha_introduccion', $ci_fecha_introduccion, PDO::PARAM_STR],
            [':ci_estado', $ci_estado, PDO::PARAM_STR],
            [':ci_chef_id', $ci_chef_id, PDO::PARAM_INT],
            [':ci_restaurante_id', $ci_restaurante_id, PDO::PARAM_INT],
            [':ci_contacto', $ci_contacto, PDO::PARAM_STR],
            [':ci_descripcion', $ci_descripcion, PDO::PARAM_STR],
            [':ci_popularidad', $ci_popularidad, PDO::PARAM_INT],
            [':ci_comentarios', $ci_comentarios, PDO::PARAM_STR]
        );
        return parent::ginsert($sql, $params);
    }

    /**
     * Actualiza un registro existente en la tabla `comida_mexicana`.
     * 
     * Este método ejecuta una consulta SQL para actualizar un registro
     * en la tabla `comida_mexicana` con los valores proporcionados.
     * 
     * @param int $id El ID del registro a actualizar.
     * @param string $ci_nombre El nombre de la comida.
     * @param string $ci_tipo El tipo de comida.
     * @param float $ci_precio El precio de la comida.
     * @param string $ci_ingredientes Los ingredientes de la comida.
     * @param string $ci_region La región de origen de la comida.
     * @param int $ci_calorias Las calorías de la comida.
     * @param int $ci_tiempo_preparacion El tiempo de preparación de la comida.
     * @param string $ci_fecha_introduccion La fecha de introducción de la comida.
     * @param string $ci_estado El estado de la comida.
     * @param int $ci_chef_id El ID del chef asociado con la comida.
     * @param int $ci_restaurante_id El ID del restaurante asociado con la comida.
     * @param string $ci_contacto El contacto del restaurante o chef.
     * @param string $ci_descripcion La descripción de la comida.
     * @param int $ci_popularidad La popularidad de la comida.
     * @param string $ci_comentarios Comentarios adicionales sobre la comida.
     * 
     * @return bool Devuelve true si la actualización fue exitosa, o false si ocurrió un error.
     * 
     * @throws PDOException Si ocurre un error durante la ejecución de la consulta.
     */
    public function update($id, $ci_nombre, $ci_tipo, $ci_precio, $ci_ingredientes, $ci_region, $ci_calorias, $ci_tiempo_preparacion, $ci_fecha_introduccion, $ci_estado, $ci_chef_id, $ci_restaurante_id, $ci_contacto, $ci_descripcion, $ci_popularidad, $ci_comentarios)
    {
        $sql = "UPDATE comida_mexicana 
                SET ci_nombre = :ci_nombre, ci_tipo = :ci_tipo, ci_precio = :ci_precio, ci_ingredientes = :ci_ingredientes, ci_region = :ci_region, ci_calorias = :ci_calorias, ci_tiempo_preparacion = :ci_tiempo_preparacion, ci_fecha_introduccion = :ci_fecha_introduccion, ci_estado = :ci_estado, ci_chef_id = :ci_chef_id, ci_restaurante_id = :ci_restaurante_id, ci_contacto = :ci_contacto, ci_descripcion = :ci_descripcion, ci_popularidad = :ci_popularidad, ci_comentarios = :ci_comentarios
                WHERE id = :id;";
        $params = array(
            [':id', $id, PDO::PARAM_INT],
            [':ci_nombre', $ci_nombre, PDO::PARAM_STR],
            [':ci_tipo', $ci_tipo, PDO::PARAM_STR],
            [':ci_precio', $ci_precio, PDO::PARAM_STR],
            [':ci_ingredientes', $ci_ingredientes, PDO::PARAM_STR],
            [':ci_region', $ci_region, PDO::PARAM_STR],
            [':ci_calorias', $ci_calorias, PDO::PARAM_INT],
            [':ci_tiempo_preparacion', $ci_tiempo_preparacion, PDO::PARAM_INT],
            [':ci_fecha_introduccion', $ci_fecha_introduccion, PDO::PARAM_STR],
            [':ci_estado', $ci_estado, PDO::PARAM_STR],
            [':ci_chef_id', $ci_chef_id, PDO::PARAM_INT],
            [':ci_restaurante_id', $ci_restaurante_id, PDO::PARAM_INT],
            [':ci_contacto', $ci_contacto, PDO::PARAM_STR],
            [':ci_descripcion', $ci_descripcion, PDO::PARAM_STR],
            [':ci_popularidad', $ci_popularidad, PDO::PARAM_INT],
            [':ci_comentarios', $ci_comentarios, PDO::PARAM_STR]
        );
        return parent::gupdate($sql, $params);
    }

    /**
     * Elimina un registro de la tabla `comida_mexicana` por ID.
     * 
     * Este método ejecuta una consulta SQL para eliminar un registro
     * de la tabla `comida_mexicana` que coincida con el ID proporcionado.
     * 
     * @param int $id El ID del registro a eliminar.
     * 
     * @return bool Devuelve true si la eliminación fue exitosa, o false si ocurrió un error.
     * 
     * @throws PDOException Si ocurre un error durante la ejecución de la consulta.
     */
    public function delete($id)
    {
        $sql = "DELETE FROM comida_mexicana WHERE id = :id;";
        $params = array();
        array_push($params, [':id', $id, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
}
