<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <center><img   src="assest/dist/img/logo_login.png" width="150">  <center>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="usuario" name="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
        
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">ACCEDER</button>
          </div>
          <!-- /.col -->
        </div>
      <?php
      $login= new ControladorUsuario();
      $login->ctrIngresoUsuario();
      ?>
      </form>
      <!-- /.social-auth-links -->
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<!--<script src="../../plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->
<!--<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!-- AdminLTE App -->
<!--<script src="../../dist/js/adminlte.min.js"></script>-->
<!--</body>-->
