<!-- Modal BEGINS -->
<div class="modal fade" id="ModalAgregarVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('/vendedor/venta-agregar')?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label class="control-label">Fecha</label>
                        <input name="fecha" type="date" class="form-control" />
                        <span class="text-danger"><?=session('errors.fecha')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Tienda</label>
                            <select name="tienda" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona tu Tienda</option>
                                <?php foreach($Tiendas as $t):?>
                                    <option value="<?php echo $t['id']?>">
                                        <?php echo $t['nombre']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        <span class="text-danger"><?=session('errors.tienda')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Método de Pago</label>
                            <select name="metodo" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona un Método de Pago</option>
                                <?php foreach($Metodos as $m):?>
                                    <option value="<?php echo $m['id']?>">
                                        <?php echo $m['desc']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        <span class="text-danger"><?=session('errors.metodo')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Cliente</label>
                            <select name="cliente" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona un Cliente</option>
                                <?php foreach($Clientes as $c):?>
                                    <option value="<?php echo $c['id']?>">
                                        <?php echo $c['rut']?> / <?php echo $c['nombre']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        <span class="text-danger"><?=session('errors.cliente')?></span>
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