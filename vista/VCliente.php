<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <!-- Puedes agregar un título o una breadcrumb aquí si es necesario -->
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Clientes Registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Razón Social</th>
                <th>NIT/CI</th>
                <th>Dirección</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoCliente()">Nuevo</button>
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
              $clientes = ControladorCliente::ctrInfoClientes();
              foreach($clientes as $cliente) {
                ?>
                <tr>
                  <td><?php echo $cliente["id_cliente"]; ?></td>
                  <td><?php echo $cliente["razon_social_cliente"]; ?></td>
                  <td><?php echo $cliente["nit_ci_cliente"]; ?></td>
                  <td><?php echo $cliente["direccion_cliente"]; ?></td>
                  <td><?php echo $cliente["nombre_cliente"]; ?></td>
                  <td><?php echo $cliente["telefono_cliente"]; ?></td>
                  <td><?php echo $cliente["email_cliente"]; ?></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-secondary" onclick="FEditCliente(<?php echo $cliente['id_cliente']; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MElitCliente(<?php echo $cliente['id_cliente']; ?>)">
                        <i class="fas fa-trash"></i>
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
