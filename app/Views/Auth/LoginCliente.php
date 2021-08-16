<div class="container">
    <?php if(session('msg')):?>
    <div class="card">
        <div class="card-body text-center">
            <h5 class="card-title"><?= session('msg.body')?></h4>
        </div>
    </div>
    <?php endif;?>
    <div class="card card-login mt-5">
        <div class="card-body justify-content-center">
            <h3 class="text-center">Ingreso de cliente</h3>
            <hr />
            <div class="row ">
                <div class="col-md-12">
                    <form action="<?= base_url('/cliente/login')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-2">
                            <label class="control-label">Nombre usuario</label>
                            <input name="alias" type="text" class="form-control" />
                            <span class="text-danger"><?=session('errors.alias')?></span>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label">Contraseña</label>
                            <input name="pass" type="password" class="form-control" />
                            <span class="text-danger"><?=session('errors.pass')?></span>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" value="Iniciar Sesión" class="btn btn-outline-primary btn-block" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>