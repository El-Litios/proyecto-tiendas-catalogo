<main>
    <div class="container">
        <?php if(session('msg')):?>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title"><?= session('msg.body')?></h4>
            </div>
        </div>
        <?php endif;?>
        <div class="card card-login mt-2">
            <div class="card-body justify-content-center">
                <h3 class="text-center">Formulario de Registro</h3>
                <hr />
                <div class="row ">
                    <div class="col-md-12">
                        <form action="<?= base_url('/registro-store')?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mt-2">
                                <label class="control-label">R.U.T</label>
                                <input name="rut" class="form-control" />
                                <span class="text-danger"><?=session('errors.rut')?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label">Nombre de Usuario</label>
                                <input name="alias" class="form-control" />
                                <span class="text-danger"><?=session('errors.alias')?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label">Contraseña</label>
                                <input name="pass" type="password" class="form-control" />
                                <span class="text-danger"><?=session('errors.pass')?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label">Confirmar Contraseña</label>
                                <input name="pass_conf" type="password" class="form-control" />
                                <span class="text-danger"><?=session('errors.pass')?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label">Nombre Completo</label>
                                <input name="nombre" class="form-control" />
                                <span class="text-danger"><?=session('errors.nombre')?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label">Correo</label>
                                <input name="correo" class="form-control" />
                                <span class="text-danger"><?=session('errors.correo')?></span>
                            </div>
                            <div class="form-group mt-2">
                                <label class="control-label">Teléfono</label>
                                <input name="telefono" class="form-control" />
                                <span class="text-danger"><?=session('errors.telefono')?></span>
                            </div>
                            <div class="form-group mt-4">
                                <input name="" type="submit" value="Crear Cuenta"
                                    class="btn btn-outline-primary btn-block" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>