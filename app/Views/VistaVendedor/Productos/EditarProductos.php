<div class="container">
    <div class="card card-login mt-5">
        <div class="card-body justify-content-center">
            <h3 class="text-center">Edición de producto</h3>
            <hr />
            <div class="row ">
                <div class="col-md-12">
                    <form action="<?= base_url('/vendedor/producto-editar')?>" method="post"
                        enctype="multipart/form-data">
                        <input name="id" type="hidden" value="<?= esc($Producto['id'])?>">
                        <input name="imgactual" type="hidden" value="<?= esc($Producto['foto'])?>">
                        <input name="tiendaid" type="hidden" value="<?= esc($Producto['idtienda'])?>">
                        <div class="form-group mt-2">
                            <label class="control-label">Nombre</label>
                            <input name="nombre" value="<?= esc($Producto['nombre'])?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.nombre')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Descripción</label>
                            <input name="descripcion" value="<?= esc($Producto['desc'])?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.nombre')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Precio</label>
                            <input name="precio" value="<?= esc($Producto['precio'])?>" type="number"
                                class="form-control" />
                            <span class="text-danger"><?=session('errors.nombre')?></span>
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