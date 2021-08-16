<!-- Modal BEGINS -->
<div class="modal fade" id="ModalAgregarProductoDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('/vendedor/detalle-agregar-producto')?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="idventa" value="<?= esc($Venta['id'])?>">
                    <input type="hidden" name="idtienda" value="<?= esc($Venta['idtienda'])?>">
                    <div class="form-group mt-2">
                        <label class="control-label">Productos disponibles</label>
                            <select name="producto" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona un Producto</option>
                                <?php foreach($Productos as $p):?>
                                    <option value="<?php echo $p['id']?>">
                                        <?php echo $p['nombre']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        <span class="text-danger"><?=session('errors.producto')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Cantidad</label>
                        <input name="cantidad" type="number" class="form-control" />
                        <span class="text-danger"><?=session('errors.cantidad')?></span>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Agregar" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal ENDS -->