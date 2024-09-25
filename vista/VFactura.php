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
          <h3 class="card-title">FACTURAS REGISTRADOS</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
              <tr>
              <th># Factura</th>
            <th>Cliente</th>
            <th>Emitido</th>
            <th>Total</th>
            <th>Estado</th>
                  <td >
                    <a href="FormVenta" class="btn btn-primary">Nuevo </a>
                     <!-- <button class="btn btn-primary" onclick="MNuevoFactura()">Nuevo</button>-->
                    </td>
              </tr>
        </thead>
            <tbody>
              <?php
              $factura = ControladorFactura::ctrInfoFacturas();
              foreach($factura as $value) {
                ?>
                <tr>
                <td><?php echo $value["codigo_factura"]; ?></td>
                <td><?php echo $value["razon_social_cliente"]; ?></td>
                <td><?php echo $value["fecha_emision"]; ?></td>
                <td><?php echo $value["total"]; ?></td>

                <td><?php
                    if( $value["estado_factura"]==1){
                      ?>
                      <span class="badge badge-success">Emitido</span>
                    <?php
                    }else{
                      ?>
                      <span class="badge badge-danger">Anulada</span>

                    <?php
                    }
                    ?></td>

                <td>
                    <div class="btn-group">
                      <button class="btn btn-secondary" onclick="VerFactura(<?php echo $value['id_factura']; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MElitFactura('<?php echo $value['cuf']; ?>')">
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
