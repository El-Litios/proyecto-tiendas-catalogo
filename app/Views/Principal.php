<!--Carousel BEGINS-->
<div id="carouselExampleCaptions" class="carousel slide mb-4" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url('public/img/Carousel/juegosxbox.jpg');?>" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Videojuegos</h5>
                <p>Revisa los videojuegos disponibles</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('public/img/Carousel/WallpaperRopa.jpg')?>" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Vestuario</h5>
                <p>Revisa los productos en vestuario disponibles.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--Carousel ENDS-->

<div class="container">
    <div class="row justify-content-center float-left mb-5">
        <h1>Mas reciente</h1>
        <!--Cards BEGIN-->
        <?php foreach($producto as $pr):?>
            <div class="card mr-3 mb-3 mr-1 mf-1 products" style="width: 16rem;">
                <img src="<?php echo base_url('public/img/Productos/'. $pr['foto']);?>" class="card-img-top" width="230" heigth="293" alt="...">
                <div class="card-body text-center py-2">
                    <h5 class="card-title my-1"><?php echo $pr['nombre']?></h5>
                </div>
                <ul class="list-group list-group-flush py-2">
                    <li class="list-group-item"><b>Precio: </b><?php echo $pr['precio']?></li>
                </ul>
            </div>
        <?php endforeach;?>
        <!--Cards ENDS-->
    </div>
</div>