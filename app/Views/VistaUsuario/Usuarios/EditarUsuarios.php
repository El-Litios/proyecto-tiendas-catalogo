<div class="container">
    <div class="card card-login mt-5">
        <div class="card-body justify-content-center">
            <h3 class="text-center">Edición de usuario</h3>
            <hr />
            <div class="row ">
                <div class="col-md-12">
                    <form action="<?= base_url('/usuario/usuario-editar')?>" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= esc($usuario['id'])?>">
                        <div class="form-group mt-2">
                            <label class="control-label">Nombre de usuario</label>
                            <input name="alias" value="<?= esc($usuario['alias']) ?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.alias')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Nombre Completo</label>
                            <input name="nombre" value="<?= esc($usuario['nombre']) ?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.nombre')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Correo</label>
                            <input name="correo" value="<?= esc($usuario['correo']) ?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.correo')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Teléfono</label>
                            <input name="telefono" value="<?= esc($usuario['telefono']) ?>" class="form-control" />
                            <span class="text-danger"><?=session('errors.telefono')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Rol de usuario</label>
                            <select name="rol" class="form-select" aria-label="Default select example">
                                <option disabled selected>Selecciona un Rol</option>
                                <?php foreach($rol as $r):?>
                                    <option value="<?php echo $r['id']?>">
                                        <?php echo $r['desc']?>
                                    </option>
                                <?php endforeach;?>
                            </select>
                            <span class="text-danger"><?=session('errors.rol')?></span>
                        </div>
                        <div class="form-group mt-4">
                            <input name="" type="submit" value="Editar Usuario"
                                class="btn btn-outline-primary btn-block" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>