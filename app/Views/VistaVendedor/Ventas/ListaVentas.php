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
            <h3 class="text-center">Listado de Ventas</h3>
            <!-- Button trigger modal -->
            <button type="button" 
                class="btn btn-outline-success text-center" 
                data-bs-toggle="modal" 
                data-bs-target="#ModalAgregarVenta">
              Agregar
            </button>
        </div>
    </div>


    <!-- Lista BEGINS -->
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Tienda</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">Metodo de Pago</th>
                <th scope="col">Cliente Rut</th>
                <th scope="col">Cliente Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Operación</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($Ventas as $ve): ?>
          <tr>
            <th scope="row"><?php echo $ve['id']?></th>
            <td><?php echo $ve['tienda_nombre']?></td>
            <td><?php echo $ve['fecha']?></td>
            <td><?php echo $ve['pago_desc']?></td>
            <td><?php echo $ve['cliente_rut']?></td>
            <td><?php echo $ve['cliente_nombre']?></td>

            <?php if ($ve['estado_venta'] == 'Rechazada'): ?>
              <td class="rounded-pill fw-bold text-danger"><?php echo $ve['estado_venta']?></td>
            <?php elseif ($ve['estado_venta'] == 'Realizada'):?>
              <td class="rounded-pill fw-bold text-success"><?php echo $ve['estado_venta']?></td>
            <?php elseif ($ve['estado_venta'] == 'En proceso'):?>
              <td class="rounded-pill fw-bold text-primary"><?php echo $ve['estado_venta']?></td>
            <?php endif;?>  

            <td>
                <a class="btn btn-dark" 
                    href="<?php echo base_url('/vendedor/detalleventa-listar').'/'.$ve['id'].'/'.$ve['tienda_id'];?>">
                    Detalle
                </a> |
                <a class="btn btn-warning" 
                    href="<?php echo base_url('vendedor/venta-formedit').'/'.$ve['id']?>">
                    Editar
                </a> |
                <a class="btn btn-outline-danger" onclick="return confirm('Estas seguro de eliminar el registro?')"
                    href="<?php echo base_url('/vendedor/venta-eliminar').'/'.$ve['id']?>">
                    Eliminar
                </a>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
    </table>
    <!-- Lista ENDS -->
</div>