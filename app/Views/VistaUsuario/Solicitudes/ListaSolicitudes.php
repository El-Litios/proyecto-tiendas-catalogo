<div class="container">
    <div class="card">
        <div class="card-body justify-content-center text-center">
            <h3 class="text-center">Listado de Solicitudes</h3>
        </div>
    </div>

    <!-- Buscador BEGINS -->
    <form action="<?php echo base_url('/usuario/solicitud-buscar')?>" method="post">
        <div class="row mt-3 mb-3 buscador">
            <div class="col-md-4">
                <input name="busqueda" class="form-control" />
            </div>
            <div class="col-md-4">
                <select name="estado" class="form-select" aria-label="Default select example">
                    <option disabled selected>Selecciona un estado</option>
                    <?php foreach($estados as $e):?>
                        <option value="<?php echo $e['id']?>">
                            <?php echo $e['desc']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>
    <!-- Buscador ENDS -->

    <!-- Lista BEGINS -->
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Motivo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Link</th>
                <th scope="col">Rut</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($solicitud as $s):?>
            <tr>
                <th scope="col"><?php echo $s['id']?></th>
                <td><?php echo $s['motivo']?></td>
                <td><?php echo $s['fecha']?></td>
                <td><a href="<?php echo $s['link']?>">Ir a enlace</a></td>
                <td><?php echo $s['rut']?></td>
                <td><?php echo $s['nombre']?></td>
                <td><?php echo $s['desc']?></td>
                <td>
                    <a class="btn btn-success" href="<?=  base_url('usuario/solicitud-aprobar/'.$s['id']);?>">Aprobar</a> | 
                    <a class="btn btn-danger" href="<?=  base_url('usuario/solicitud-rechazar/'.$s['id']);?>">Rechazar</a> 
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <!-- Lista ENDS -->
</div>