<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$page = 1;
$ope = 'filterSearch';
$filter = '';
$items_per_page = 16; // Aumentar el número de elementos por página
$total_pages = 1;
$response = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $filter = urlencode(trim(isset($_POST['filter']) ? $_POST['filter'] : ''));
}
$client = new HttpClient(HTTP_BASE);
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';

$responseData = $client->get('/controller/ComidaController.php', [
    'ope' => 'filterSearch',
    'page' => $page,
    'busqueda' => $filter,
]);
$records = $responseData['DATA'];
$totalItems = $responseData['LENGHT'];
try {
    $total_pages =  ceil($totalItems / $items_per_page);
} catch (Exception $e) {
    $total_pages = 1;
}
// Paginación
$max_links = 5;
$half_max_link = floor($max_links / 2);
$start_page = $page - $half_max_link;
$end_page = $page + $half_max_link;
if ($start_page < 1) {
    $end_page += abs($start_page) + 1;
    $start_page = 1;
}
if ($end_page > $total_pages) {
    $start_page -= ($end_page - $total_pages);
    $end_page = $total_pages;
    if ($start_page < 1) {
        $start_page = 1;
    }
}
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-dark">
            <div class="card-header">
                <h5 class="card-title">Lista de Comida Mexicana</h5>
            </div>
            <div class="card-header">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" 
                        placeholder="Type your keywords here" name="filter" 
                        value="<?php echo ((isset($filter) ? $filter : '')) ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-dark">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-header">
                <a href="<?php echo HTTP_BASE; ?>/web/com/new/0" 
                class="btn btn-primary">Nuevo</a>
                <a href="<?php echo HTTP_BASE; ?>/report/rptComidaglobal.php"  target="_blank"
                class="btn btn-warning">Reporte</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-dark">
                        <thead>
                            <tr>
                                <th style="width: 10px">Opciones</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Ingredientes</th>
                                <th>Región</th>
                                <th>Calorías</th>
                                <th>Tiempo de Preparación</th>
                                <th>Fecha de Introducción</th>
                                <th>Estado</th>
                                <th>Chef ID</th>
                                <th>Restaurante ID</th>
                                <th>Contacto</th>
                                <th>Descripción</th>
                                <th>Popularidad</th>
                                <th>Comentarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $fila) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo HTTP_BASE . "/web/com/view/" . $fila['id']; ?>"
                                         class="btn btn-secondary btn-sm">Ver</a>
                                         <a href="<?php echo HTTP_BASE . "/web/com/edit/" . $fila['id']; ?>"
                                         class="btn btn-primary btn-sm">Editar</a>
                                         <a href="<?php echo HTTP_BASE . "/web/com/delete/" . $fila['id']; ?>"
                                         class="btn btn-danger btn-sm">Eliminar</a>
                                         <a href="<?php echo HTTP_BASE."/report/rptComida.php?cliente_id=".$fila['id'] ?>" 
                     target="_blank"
                    class="btn btn-warning">Reporte</a>
                                    </td>
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['ci_nombre']; ?></td>
                                    <td><?php echo $fila['ci_tipo']; ?></td>
                                    <td><?php echo $fila['ci_precio']; ?></td>
                                    <td><?php echo $fila['ci_ingredientes']; ?></td>
                                    <td><?php echo $fila['ci_region']; ?></td>
                                    <td><?php echo $fila['ci_calorias']; ?></td>
                                    <td><?php echo $fila['ci_tiempo_preparacion']; ?></td>
                                    <td><?php echo $fila['ci_fecha_introduccion']; ?></td>
                                    <td><?php echo $fila['ci_estado']; ?></td>
                                    <td><?php echo $fila['ci_chef_id']; ?></td>
                                    <td><?php echo $fila['ci_restaurante_id']; ?></td>
                                    <td><?php echo $fila['ci_contacto']; ?></td>
                                    <td><?php echo $fila['ci_descripcion']; ?></td>
                                    <td><?php echo $fila['ci_popularidad']; ?></td>
                                    <td><?php echo $fila['ci_comentarios']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination">
                    <?php if ($page > 1) : ?>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="1">
                                <button type="submit" class="page-link">Primera</button>
                            </form>
                        </li>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo ($page - 1); ?>">
                                <button type="submit" class="page-link">&laquo;</button>
                            </form>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                        <li class="page-item <?php echo ($page == $i ? 'active' : '') ?>">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo ($i); ?>">
                                <button type="submit" class="page-link"><?php echo ($i); ?></button>
                            </form>
                        </li>
                    <?php endfor; ?>
                    <?php if ($page < $total_pages) : ?>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo ($page + 1); ?>">
                                <button type="submit" class="page-link">&raquo;</button>
                            </form>
                        </li>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo $total_pages; ?>">
                                <button type="submit" class="page-link">Última</button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php require ROOT_VIEW . '/template/footer.php'; ?>

<style>
    body {
        background-color: #1a1a1a;
        color: #e0e0e0;
    }
    .card-dark {
        background-color: #2b2b2b;
        border: 1px solid #444;
    }
    .card-header {
        background-color: #333;
        border-bottom: 1px solid #444;
    }
    .card-title {
        color: #fff;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-dark {
        background-color: #343a40;
        border-color: #343a40;
    }
    .table-dark {
        background-color: #2b2b2b;
        color: #e0e0e0;
    }
    .table thead th {
        background-color: #3c3c3c;
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    .pagination .page-link {
        background-color: #2b2b2b;
        color: #e0e0e0;
        border: 1px solid #444;
    }
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
