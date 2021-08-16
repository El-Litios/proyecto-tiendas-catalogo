<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('public/CSS/site.css')?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"></head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Principal: Usuario</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(session('rol') == 1):?>
            <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url()?>/usuario/usuario-lista">Usuarios</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>/usuario/tienda-lista">Tiendas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>/usuario/lista-solicitud">Solicitudes</a>
            </li>
        <?php elseif(session('rol') == 2):?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/vendedor/lista-tienda/'.session('id_usuario'))?>">Tiendas</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/vendedor/lista-venta')?>">Ventas</a>
            </li>
        <?php endif;?>
      </ul>
      <div class="d-flex text-white">
        <label class="nav-link text-white"><?= session('nombre')?></label>
        <a class="nav-link text-white btn btn-outline-danger" href="<?php echo base_url()?>/usuario/logout">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </div>
</nav>