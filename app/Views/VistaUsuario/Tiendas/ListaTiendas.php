<div class="container">
        <?php if(session('msg')):?>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title"><?= session('msg.body')?></h4>
            </div>
        </div>
        <?php endif;?>
        <div class="card">
            <div class="card-body justify-content-center text-center">
                <h3 class="text-center">Listado de Tiendas</h3>
                <!-- Button trigger modal -->
                <button type="button" 
                    class="btn btn-outline-success text-center" 
                    data-bs-toggle="modal" 
                    data-bs-target="#ModalAgregarTienda">
                Agregar
                </button>
            </div>
        </div>

    <!-- Lista BEGINS -->
    <div class="row justify-content-center mt-5">
        <?php foreach($tiendas as $t):?>
            <div class="card mr-3 mb-3 mr-1 mf-1 products" style="width: 16rem;">
                <img src="<?php echo base_url('public/img/Tiendas/'. $t['foto']);?>" class="card-img-top" width="230" heigth="293" alt="...">
                <div class="card-body text-center py-2">
                    <h5 class="card-title my-1"><?php echo $t['nombre']?></h5>
                    <a class="btn btn-warning card-link" 
                        href="<?php echo base_url('usuario/tienda-formeditar/'.$t['id'])?>"
                    >
                        Editar
                    </a>
                    <a class="btn btn-danger card-link" onclick="return confirm('Estas seguro de eliminar el registro?')"
                        href="<?php echo base_url('usuario/tienda-eliminar/'.$t['id'].'/'.$t['foto'])?>"
                    >
                        Eliminar
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <!-- Lista ENDS -->
</div>