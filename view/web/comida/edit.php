<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;

$client = new HttpClient(HTTP_BASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datajson = [
        'id' => $_POST['id'],
        'ci_nombre' => $_POST['ci_nombre'],
        'ci_tipo' => $_POST['tipo'],
        'ci_precio' => $_POST['precio'],
        'ci_ingredientes' => $_POST['ingredientes'],
        'ci_region' => $_POST['region'],
        'ci_calorias' => $_POST['calorias'],
        'ci_tiempo_preparacion' => $_POST['tiempo_preparacion'],
        'ci_fecha_introduccion' => $_POST['fecha_introduccion'],
        'ci_estado' => $_POST['estado'],
        'ci_chef_id' => $_POST['chef_id'],
        'ci_restaurante_id' => $_POST['restaurante_id'],
        'ci_contacto' => $_POST['contacto'],
        'ci_descripcion' => $_POST['descripcion'],
        'ci_popularidad' => $_POST['popularidad'],
        'ci_comentarios' => $_POST['comentarios']
    ];
    if ($pAccion == 'EDIT') {
        $result = $client->put('/controller/ComidaController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $client->post('/controller/ComidaController.php', $datajson);
    } else if ($pAccion == 'DELETE') {
        $result = $client->delete('/controller/ComidaController.php', $datajson);
    }
    if ($result["ESTADO"]) {
        echo "<script>alert('Operación realizada con éxito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '" . HTTP_BASE . "/web/com/list';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el administrador.');</script>";
    }
}
if ($pAccion == 'NEW') {
    $record = [
        'id' => '',
        'ci_nombre' => '',
        'ci_tipo' => '',
        'ci_precio' => '',
        'ci_ingredientes' => '',
        'ci_region' => '',
        'ci_calorias' => '',
        'ci_tiempo_preparacion' => '',
        'ci_fecha_introduccion' => '',
        'ci_estado' => '',
        'ci_chef_id' => '',
        'ci_restaurante_id' => '',
        'ci_contacto' => '',
        'ci_descripcion' => '',
        'ci_popularidad' => '',
        'ci_comentarios' => ''
    ];
} else {
    $responseData = $client->get('/controller/ComidaController.php', [
        'ope' => 'filterId',
        'id' => $pId,
    ]);
    $record = $responseData['DATA'][0];
}
?>

<style>
    body {
        background-color: #121212;
        color: #e0e0e0;
        font-family: 'Arial', sans-serif;
    }

    .container-fluid {
        padding: 20px;
    }

    .card {
        background-color: #1e1e1e;
        border: 1px solid #333;
        border-radius: 8px;
    }

    .card-header {
        background-color: #2c2c2c;
        border-bottom: 1px solid #444;
        color: #e0e0e0;
    }

    .card-title {
        color: #e0e0e0;
    }

    .form-control {
        background-color: #2c2c2c;
        border: 1px solid #555;
        color: #007bff; /* Cambio de color del texto a azul brillante */
    }

    .form-control:focus {
        background-color: #333;
        border-color: #777;
        color: #e0e0e0;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-primary:hover,
    .btn-danger:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-primary:focus,
    .btn-danger:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.5);
    }

    .card-footer {
        background-color: #1e1e1e;
        border-top: 1px solid #444;
    }

    .form-group label {
        color: #e0e0e0;
    }
</style>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Comida Indonesia</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $pAccion == 'NEW' ? 'Agregar Nueva Comida' : 'Editar Comida'; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">ID Comida</label>
                                <input id="fortxt01" type="text" class="form-control text-black" placeholder="ID Comida" name="id" value="<?php echo $record['id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">Nombre</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="Nombre" name="ci_nombre" value="<?php echo $record['ci_nombre']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Tipo</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="Tipo" name="tipo" value="<?php echo $record['ci_tipo']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt04">Precio</label>
                                <input id="fortxt04" type="text" class="form-control" placeholder="Precio" name="precio" value="<?php echo $record['ci_precio']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt05">Ingredientes</label>
                                <input id="fortxt05" type="text" class="form-control" placeholder="Ingredientes" name="ingredientes" value="<?php echo $record['ci_ingredientes']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Región</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Región" name="region" value="<?php echo $record['ci_region']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt07">Calorías</label>
                                <input id="fortxt07" type="text" class="form-control" placeholder="Calorías" name="calorias" value="<?php echo $record['ci_calorias']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt08">Tiempo de Preparación</label>
                                <input id="fortxt08" type="text" class="form-control" placeholder="Tiempo de Preparación" name="tiempo_preparacion" value="<?php echo $record['ci_tiempo_preparacion']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt09">Fecha de Introducción</label>
                                <input id="fortxt09" type="text" class="form-control" placeholder="Fecha de Introducción" name="fecha_introduccion" value="<?php echo $record['ci_fecha_introduccion']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt10">Estado</label>
                                <input id="fortxt10" type="text" class="form-control" placeholder="Estado" name="estado" value="<?php echo $record['ci_estado']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt11">Chef ID</label>
                                <input id="fortxt11" type="text" class="form-control" placeholder="Chef ID" name="chef_id" value="<?php echo $record['ci_chef_id']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt12">Restaurante ID</label>
                                <input id="fortxt12" type="text" class="form-control" placeholder="Restaurante ID" name="restaurante_id" value="<?php echo $record['ci_restaurante_id']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt13">Contacto</label>
                                <input id="fortxt13" type="text" class="form-control" placeholder="Contacto" name="contacto" value="<?php echo $record['ci_contacto']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt14">Descripción</label>
                                <input id="fortxt14" type="text" class="form-control" placeholder="Descripción" name="descripcion" value="<?php echo $record['ci_descripcion']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt15">Popularidad</label>
                                <input id="fortxt15" type="text" class="form-control" placeholder="Popularidad" name="popularidad" value="<?php echo $record['ci_popularidad']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt16">Comentarios</label>
                                <input id="fortxt16" type="text" class="form-control" placeholder="Comentarios" name="comentarios" value="<?php echo $record['ci_comentarios']; ?>" <?php echo ($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''; ?>>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') : ?>
                                <button type="submit" class="btn btn-danger"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif; ?>
                            <a href="<?php echo HTTP_BASE; ?>/web/com/list" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php require ROOT_VIEW . '/template/footer.php'; ?>
