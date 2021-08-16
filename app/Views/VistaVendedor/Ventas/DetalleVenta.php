<div class="container">
    <?php foreach ($Venta as $v):?>
    <div class="card">
        <div class="card-body justify-content-center text-center">
            <h3 class="text-center">Venta n°: <?php echo $v['id']?></h3>
            <!-- Button trigger modal -->
            <button type="button" 
                class="btn btn-outline-success text-center" 
                data-bs-toggle="modal" 
                data-bs-target="#ModalAgregarProductoDetalle">
              Agregar
            </button>
            <div class="row mt-5 mb-3">
                <div class="col"><h5><b>Fecha: </b><?php echo $v['fecha']?></h5></div>
                <div class="col"><h5><b>Tienda: </b><?php echo $v['nombre']?></h5></div>
                <div class="col"><h5><b>Metodo de Pago: </b><?php echo $v['desc']?></h5></div>
                <div class="col"><h5><b>Estado: </b><?php echo $v['estado_venta']?></h5></div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <!-- Lista BEGINS -->
    <table class="table text-center mt-5">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($Detalle as $de):?>
            <tr>
                <th scope="row"><?php echo $de['id']?></th>
                <td><?php echo $de['nombre_producto']?></td>
                <td><?php echo $de['precio_producto']?></td>
                <td><?php echo $de['cantidad']?></td>
                <?php $total = $de['precio_producto'] * $de['cantidad']?>
                <td><?php echo $total?></td>
            </tr>
          <?php endforeach?>
        </tbody>
    </table>
    <!-- Lista ENDS -->
</div>