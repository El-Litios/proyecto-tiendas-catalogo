<div class="container">
    <div class="card card-login mt-5">
        <div class="card-body justify-content-center">
            <h3 class="text-center">Edición de producto</h3>
            <hr />
            <div class="row ">
                <div class="col-md-12">
                    <form action="<?= base_url('/vendedor/venta-editar')?>" method="post"
                        enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?= esc($Ventas['id'])?>">
                        <div class="form-group mt-2">
                            <label class="control-label">Fecha</label>
                            <input type="text" value="<?= esc($Ventas['fecha'])?>" readonly class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Cliente Rut</label>
                            <input type="text" value="<?= esc($Ventas['cliente_rut'])?>" readonly class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Cliente Nombre</label>
                            <input type="text" value="<?= esc($Ventas['cliente_nombre'])?>" readonly class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Tienda</label>
                            <input type="text" value="<?= esc($Ventas['tienda_nombre'])?>" readonly class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Metodo de Pago</label>
                            <input type="text" value="<?= esc($Ventas['pago_desc'])?>" readonly class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Estado</label>
                            <select name="estado" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona un estado</option>
                                <?php foreach($Estados as $e):?>
                                <option value="<?php echo $e['id']?>">
                                    <?php echo $e['desc']?>
                                </option>
                                <?php endforeach;?>
                            </select>
                            <span class="text-danger"><?=session('errors.estado')?></span>
                        </div>
                        <div class="form-group mt-4">
                            <input name="" type="submit" value="Guardar Cambios"
                                class="btn btn-outline-primary btn-block" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>