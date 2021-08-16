<div class="container">
    <div class="card">
        <div class="card-body justify-content-center text-center">
            <h3 class="text-center">Listado de Ventas</h3>
        </div>
    </div>

    <!-- Buscador BEGINS -->
    <form action="<?php echo base_url('')?>" method="post">
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
                <th scope="col">Fecha de Compra</th>
                <th scope="col">Metodo de Pago</th>
                <th scope="col">Tienda</th>
                <th scope="col">Estado</th>
                <th scope="col">Operación</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($ventas as $ve): ?>
          <tr>
            <th scope="row"><?php echo $ve['id']?></th>
            <td><?php echo $ve['fecha']?></td>
            <td><?php echo $ve['desc']?></td>
            <td><?php echo $ve['nombre']?></td>

            <?php if ($ve['estado_venta'] == 'Rechazada'): ?>
              <td class="rounded-pill fw-bold text-danger"><?php echo $ve['estado_venta']?></td>
            <?php elseif ($ve['estado_venta'] == 'Realizada'):?>
              <td class="rounded-pill fw-bold text-success"><?php echo $ve['estado_venta']?></td>
            <?php elseif ($ve['estado_venta'] == 'En proceso'):?>
              <td class="rounded-pill fw-bold text-primary"><?php echo $ve['estado_venta']?></td>
            <?php endif;?>  

            <td>
                <a class="btn btn-outline-info" href="<?php echo base_url('/cliente/detalleventa-listar').'/'.$ve['id'];?>">Detalle</button>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
    </table>
    <!-- Lista ENDS -->
</div>