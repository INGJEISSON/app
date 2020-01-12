<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SICMATH</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
 <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="librerias/js/funciones.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <!--<div class="register-logo">-->
  <!--  <a href="../../index2.html"><b>Admin</b>LTE</a>-->
  <!--</div>-->

  <div class="card">
    <div class="card-body register-card-body">
          <p class="login-box-msg"><img src='logo_final.png' width='64' height='64'></p>
      <p class="login-box-msg">Registarse como nuevo miembro</p>

      <form  class="needs-validation">
           <div class="input-group mb-3">
          <input type="text" class="form-control" id='id_usuario' placeholder="Identificación" onKeyPress="return soloNumeros(event)" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id='nom_usuario' placeholder="Nombre de usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="text" class="form-control" id='nombre' placeholder="Nombres" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="text" class="form-control" id='apellidos' placeholder="Apellidos" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
         
        <div class="input-group mb-3">
          <input type="email" class="form-control" id='email' placeholder="Email ó correo electrónico" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id='clave' placeholder="Contraseña"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
            <select class='form-control' id='colegio' required>
                <option value="">SELECCIONE INSTITUCION</option>
                <option value="1">MASTER</option>
            </select> 
          <!-- <input type="password" class="form-control" placeholder="Colegio">
          <div class="input-group-append">
            <div class="input-group-text">
            
            </div>
          </div> -->
        </div>
        <div class="input-group mb-3">
            <select class='form-control' id='grado' required>
                <option value="">SELECCIONE GRADO</option>
                <option value="2">DECIMO</option>
                <option value="3">ONCE</option>
            </select> 
        </div>
        <div class="row">
          <div class="col-8">
            <!--<div class="icheck-primary">-->
            <!--  <input type="checkbox" id="agreeTerms" name="terms" value="agree">-->
            <!--  <label for="agreeTerms">-->
            <!--   I agree to the <a href="#">terms</a>-->
            <!--  </label>-->
            <!--</div>-->
          </div>
          <!-- /.col -->
          <div class="col-12">
          <button  id='registrar' class="btn btn-success btn-block">REGISTRAR</button>
        
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Nombre de usuario ó identificación ya existe, por favor intente con otro.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REGISTRAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Ocurrió un problema técnico
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>

      <!--<div class="social-auth-links text-center">-->
      <!--  <p>- OR -</p>-->
      <!--  <a href="#" class="btn btn-block btn-primary">-->
      <!--    <i class="fab fa-facebook mr-2"></i>-->
      <!--    Sign up using Facebook-->
      <!--  </a>-->
      <!--  <a href="#" class="btn btn-block btn-danger">-->
      <!--    <i class="fab fa-google-plus mr-2"></i>-->
      <!--    Sign up using Google+-->
      <!--  </a>-->
      <!--</div>-->

      <a href="../app/" class="text-center">Ingrese a su cuenta</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('button', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script>
          $(document).ready(function(){

                      $("#registrar").click(function(){  

                          var id_usuario = $("#id_usuario").val();
                          var nombre = $("#nombre").val();
                          var apellidos = $("#apellidos").val();
                          var email = $("#email").val();
                          var colegio = $("#colegio").val();
                          var grado = $("#grado").val();
                          var nom_usuario = $("#nom_usuario").val();
                          var tipo = 2;
                          var clave= $("#clave").val();



                              if(id_usuario!="" && nom_usuario != "" && nombre != "" && apellidos != "" 
                              && email != "" && colegio != "" && grado != "" && clave !="" ){
  
                                    var datos='g_users='+1+'&crea_user='+1+'&id_usuario='+id_usuario+'&nom_usuario='+nom_usuario
                                    +'&nombre='+nombre+'&apellidos='+apellidos+'&email='+email+'&colegio='+colegio+'&grado='+grado+'&tipo='+tipo+'&clave='+clave;
                                     $.ajax({
                                       type: "POST",
                                       data: datos,
                                       url: 'modelos/funciones.php',
                                       success: function (valor){
                                          if(valor==1){
                                             alert("Usuario registrado correctamente")
                                             parent.location='../app/';

                                          }
                                          else if(valor==2)
                                          $('#exampleModalCenter2').modal('show');
                                          else if (valor==3)
                                          $('#exampleModalCenter3').modal('show');
                                       }
                                     })
                              }else{
                                alert("Por favor complete el formulario")
                              }

                      })
            
               //  alert("prueba");
          })
       </script> 
