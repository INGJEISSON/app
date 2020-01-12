<?php 
session_start();

if(!isset($_SESSION['id'])){
  
?>
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!--<div class="login-logo">-->
  <!--  <a href="../../index2.html"><b>SICT</b>MATH</a>-->
  <!--</div>-->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><img src='logo_final.png' width='64' height='64'></p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id='usuario' placeholder="Ingrese correo electrónico ó identificación">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <!-- <div class="input-group mb-3">
          <input type="password" class="form-control" id='clave' placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> -->
        <div class="row">
     
          <div class="col-12">
            <button type="button" id='enviar_clave' class="btn btn-success btn-block">Enviar clave</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">RECUPERAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Se ha enviado su contraseña a su correo electrónico registrado, por favor revise en su bandeja de 
         entrada o correo no deseado (SPAM)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">RECUPERAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Nombre de usuario y contraseña incorrecto, por favor verifique e inténtenlo de nuevo.
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
        <h5 class="modal-title" id="exampleModalLongTitle">RECUPERAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Ocurrió un problema 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
      
      </div>
    </div>
  </div>
</div>

      <!--<div class="social-auth-links text-center mb-3">-->
      <!--  <p>- OR -</p>-->
      <!--  <a href="#" class="btn btn-block btn-primary">-->
      <!--    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook-->
      <!--  </a>-->
      <!--  <a href="#" class="btn btn-block btn-danger">-->
      <!--    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+-->
      <!--  </a>-->
      <!--</div>-->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="../app/">Iniciar sesión</a>
      </p>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


        <script>
          $(document).ready(function(){

                      $("#enviar_clave").click(function(){  

                       
                          var usuario = $("#usuario").val();
                        

                              if(usuario!=""){
                                //alert("ingreso aqui");
                                    var datos='password_reset='+1+'&usuario='+usuario;
                                     $.ajax({
                                       type: "POST",
                                       data: datos,
                                       url: 'modelos/funciones.php',
                                       success: function (valor){
                                          if(valor==1)
                                          $('#exampleModalCenter1').modal('show');
                                          else if(valor==2)
                                          $('#exampleModalCenter2').modal('show');
                                          else if (valor==3)
                                          $('#exampleModalCenter3').modal('show');
                                       }
                                     })
                              }else{
                                alert("Por favor ingrese correo o identificación")
                              }

                      })
            
               //  alert("prueba");
          })
       </script> 
</body>
</html>
<?php
}else{
//echo "entró aqui";
?>
  <script>
   parent.location="portal";
  </script> 
<?php
}
?>