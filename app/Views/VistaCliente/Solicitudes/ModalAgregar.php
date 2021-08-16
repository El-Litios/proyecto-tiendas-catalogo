<!-- Modal BEGINS -->
<div class="modal fade" id="ModalAgregarSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de Solicitud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo base_url('/cliente/solicitud-crear')?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <label class="control-label">Motivo</label>
                        <textarea name="motivo" class="form-control"></textarea>
                        <span class="text-danger"><?=session('errors.motivo')?></span>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label">Link (RRSS)</label>
                        <input name="link" class="form-control" />
                        <span class="text-danger"><?=session('errors.link')?></span>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Enviar Solicitud" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal ENDS -->
