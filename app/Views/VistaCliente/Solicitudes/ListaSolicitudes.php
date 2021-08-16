<div class="container">
        <?php if(session('msg')):?>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title"><?= session('msg.body')?></h4>
            </div>
        </div>
        <?php endif;?>
    <div class="card">
        <div class="card-body justify-content-center text-center">
            <h3 class="text-center">Listado de Solicitudes</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-success text-center" data-bs-toggle="modal" data-bs-target="#ModalAgregarSolicitud">
              Agregar
            </button>
        </div>
    </div>

    <!-- Buscador BEGINS -->
    <form action="<?php echo base_url('/cliente/solicitud-buscar')?>" method="post">
        <div class="row mt-3 mb-3 buscador">
            <div class="col-md-8">
                <input name="busqueda" class="form-control" />
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
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
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($solicitud as $so): ?>
          <tr>
            <th scope="row"><?php echo $so['id']?></th>
            <td><?php echo $so['motivo']?></td>
            <td><?php echo $so['fecha']?></td>
            <td><a href="<?php echo $so['link']?>">Ir al enlace</a></td>

            <?php if ($so['desc'] == 'Rechazada'): ?>
              <td class="rounded-pill fw-bold text-danger"><?php echo $so['desc']?></td>
            <?php elseif ($so['desc'] == 'Aprobada'):?>
              <td class="rounded-pill fw-bold text-success"><?php echo $so['desc']?></td>
            <?php elseif ($so['desc'] == 'En Revisión'):?>
              <td class="rounded-pill fw-bold text-warning"><?php echo $so['desc']?></td>
            <?php endif;?>  
          </tr>
          <?php endforeach;?>
        </tbody>
    </table>
    <!-- Lista ENDS -->
</div>