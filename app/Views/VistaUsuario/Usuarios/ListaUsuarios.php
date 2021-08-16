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
            <h3 class="text-center">Listado de Usuarios</h3>
            <!-- Button trigger modal -->
            <button type="button" 
                class="btn btn-outline-success text-center" 
                data-bs-toggle="modal" 
                data-bs-target="#ModalAgregarUsuario">
              Agregar
            </button>
        </div>
    </div>


    <!-- Lista BEGINS -->
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuario as $u):?>
            <tr>
                <th scope="col"><?php echo $u['id']?></th>
                <td><?php echo $u['alias']?></td>
                <td><?php echo $u['nombre']?></td>
                <td><?php echo $u['telefono']?></td>
                <td><?php echo $u['correo']?></td>                
                <td><?php echo $u['desc']?></td>   
                <td>
                    <a class="btn btn-warning" 
                        href="<?php echo base_url('usuario/usuario-formeditar/'.$u['id'])?>">
                        Editar
                    </a> |
                    <a class="btn btn-danger"
                       onclick="return confirm('Está seguro de Borrar el registro?')" 
                       href="<?php echo base_url('usuario/usuario-eliminar/'.$u['id'])?>">
                       Eliminar
                    </a>
                </td>             
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <!-- Lista ENDS -->
</div>