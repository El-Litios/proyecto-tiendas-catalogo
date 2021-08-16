<div class="container">
        <div class="card">
            <div class="card-body justify-content-center text-center">
                <h3 class="text-center">Listado de Tiendas</h3>
            </div>
        </div>

    <!-- Lista BEGINS -->
    <div class="row justify-content-center mt-5">
        <?php foreach($Tiendas as $t):?>
            <div class="card mr-3 mb-3 mr-1 mf-1 products" style="width: 16rem;">
                <img src="<?php echo base_url('public/img/Tiendas/'. $t['foto']);?>" class="card-img-top" width="230" heigth="293" alt="...">
                <div class="card-body text-center py-2">
                    <h5 class="card-title my-1"><?php echo $t['nombre']?></h5>
                    <a class="btn btn-primary card-link"
                        href="<?php echo base_url('/vendedor/lista-producto/'.$t['id'])?>"
                    >
                        Ver Productos
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <!-- Lista ENDS -->
</div>