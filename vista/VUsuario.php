

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
    
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
      
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usuarios Registrados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Login</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Ultimo Acceso</th>
                    <th>Fecha de registro</th>
                    <td>
                    <button class="btn btn-primary" onclick="MNuevoUsuario()"> nuevo </button>
                  </td>
                  </tr>
                  </thead>
                  <tbody>
               <?php

               $usuario=ControladorUsuario::ctrInfoUsuarios();
               foreach($usuario as $value){
                ?>
                <tr>
                    <td> <?php echo  $value["id_usuario"];  ?></td>
                    <td> <?php echo  $value["login_usuario"];  ?></td>
                    <td> <?php echo  $value["perfil"];  ?></td>

                    <td> <?php
                    if( $value["estado"]==1){
                      ?>
                      <span class="badge badge-succes">activo</span>

                    <?php
                    }else{
                      ?>
                      <span class="badge badge-danger">Inactivo</span>

                    <?php
                    }
                    ?></td>
                    <td> <?php echo  $value["ultimo_login"];  ?></td>
                    <td> <?php echo  $value["fecha_registro"];  ?></td>
                    <td>
                    <div class="btn-group">
                    <button class="btn btn-secondary" onclick="FEditUsuario(<?php echo  $value['id_usuario'];  ?>)"> 
                      <i class="fas fa-edit"> </i>
                  </button>
                  <button class="btn btn-danger"      onclick="MElitUsuario(<?php echo  $value['id_usuario'];  ?>)"> 
                      <i class="fas fa-trash"> </i>
                  </button>

                    </div>
                    </td>
             
                  </tr>



                <?php
               }
               ?>
                 
                 
                  </tbody>
                

                </table>
            </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </div>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->