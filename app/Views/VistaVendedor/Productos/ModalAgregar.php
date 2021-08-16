<!-- Modal BEGINS -->
<div class="modal fade" id="ModalAgregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('/vendedor/producto-agregar')?>" method="post" enctype="multipart/form-data">
                <input name="tiendaid" type="hidden" value="<?= esc($Tienda['id'])?>">
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label class="control-label">Nombre</label>
                        <input name="nombre" class="form-control" />
                        <span class="text-danger"><?=session('errors.nombre')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Descripción</label>
                        <input name="descripcion" class="form-control" />
                        <span class="text-danger"><?=session('errors.descripcion')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Precio</label>
                        <input name="precio" type="number" class="form-control" />
                        <span class="text-danger"><?=session('errors.precio')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Categoría</label>
                            <select name="categoria" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona una Categoría</option>
                                <?php foreach($Categoria as $c):?>
                                    <option value="<?php echo $c['id']?>">
                                        <?php echo $c['desc']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                        <span class="text-danger"><?=session('errors.categoria')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="formFile" class="form-label">Fotografía</label>
                        <input class="form-control" name="archivo" type="file" id="formFile">
                        <span class="text-danger"><?=session('errors.archivo')?></span>
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