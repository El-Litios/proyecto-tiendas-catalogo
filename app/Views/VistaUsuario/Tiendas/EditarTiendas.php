<div class="container">
    <div class="card card-login mt-5">
        <div class="card-body justify-content-center">
            <h3 class="text-center">Edición de Tienda</h3>
            <hr />
            <div class="row ">
                <div class="col-md-12">
                    <form action="<?= base_url('/usuario/tienda-editar')?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= esc($tiendas['id'])?>">
                        <input type="hidden" name="imgactual" value="<?= esc($tiendas['foto'])?>">
                        <div class="form-group mt-2">
                            <label class="control-label">Nombre</label>
                            <input name="nombre" value="<?= esc($tiendas['nombre']) ?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.nombre')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label for="formFile" class="form-label">Fotografía</label>
                            <input class="form-control" name="archivo" type="file" id="formFile">
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