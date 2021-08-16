<!-- Modal BEGINS -->
<div class="modal fade" id="ModalAgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('/usuario/usuario-agregar')?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label class="control-label">Usuarios</label>
                        <input name="alias" class="form-control" />
                        <span class="text-danger"><?=session('errors.alias')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Contraseña</label>
                        <input name="pass" type="password" class="form-control" />
                        <span class="text-danger"><?=session('errors.pass')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Nombre Completo</label>
                        <input name="nombre" class="form-control" />
                        <span class="text-danger"><?=session('errors.nombre')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Teléfono</label>
                        <input name="telefono" class="form-control" />
                        <span class="text-danger"><?=session('errors.telefono')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Correo</label>
                        <input name="correo" class="form-control" />
                        <span class="text-danger"><?=session('errors.correo')?></span>
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