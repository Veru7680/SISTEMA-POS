<?php
require_once "../../controlador/usuarioControlador.php";
require_once "../../modelo/usuarioModelo.php";

$id=$_GET["id"];
$usuario=ControladorUsuario::ctrInfoUsuario($id);
?>


<form action="" id="FEditUsuario">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">registro nuevo de Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="">Login Usuario</label>
                <input type="text"  class="form-control" name="login" id="login" value="<?php  echo $usuario["login_usuario"]; ?>" readonly> 
                <input type="hidden" name="idUsuario" value="<?php  echo $usuario["id_usuario"]; ?>">
            </div>

            <div class="form-group">
                <label for="">password</label>
                <input type="password"  class="form-control" name="password"  id="password" value="<?php  echo $usuario["password"]; ?>"> 
            </div>

            <div class="form-group">
                <label for="">repetir password</label>
                <input type="password"  class="form-control" name="vrPassword"  id="vrPassword" value="<?php  echo $usuario["password"]; ?>"> 
                <input type="hidden" value="<?php echo $usuario["password"]; ?>" name="passActual">
              </div>


            <div class="form-group">
    <label for="perfil">Perfil</label>
    <select name="perfil" id="perfil" class="form-control">
        <option value="Administrador" <?php if($usuario["perfil"] == "Administrador"): ?>selected<?php endif; ?>>Administrador</option>
        <option value="Moderador" <?php if($usuario["perfil"] == "Moderador"): ?>selected<?php endif; ?>>Moderador</option>
    </select>
</div>


<div class="form-group">
<label for="" class="">ESTADO</label>
  <div class="row">
    <div class="col-sm-6">
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="estado" id="estadoActivo" 
        <?php if($usuario["estado"] == "1"): ?>checked<?php endif; ?>value="1"> 
        <label for="estadoActivo" class="custom-control-label">ACTIVO</label>
      </div>
    </div>
      
    <div class="col-sm-6">
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" name="estado" id="estadoInactivo"
        <?php if($usuario["estado"] == "0"): ?>checked<?php endif; ?> value="0"> 
        <label for="estadoInactivo" class="custom-control-label">INACTIVO</label>
      </div>
    </div>
  </div>
</div>



            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

            
</form>


<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      editUsuario()
    }
  });
  $('#FEditUsuario').validate({
    rules: {
      login: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 3
      },
      vrPassword: {
        required: true,
        minlength: 3
      },
    },
  
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>