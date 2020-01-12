<?php
// En desarrollo .
include('comuni.php');
    
    function consul_user($usuario){
       @include '../config.php';
        $sql ="select id from users where email='".trim($usuario)."' or id_usuario='".trim($usuario)."' or nom_usuario='".trim($usuario)."' ";
        $query=pg_query($conexion, $sql);
        $rows=pg_num_rows($query);
            if($rows)
             return "1";
            else
            return "2";
    }
    function forgot_password($usuario){
        @include '../config.php';
        $consul_user = consul_user($usuario);

            if($consul_user==1){
                $sql ="select clave, email from users where email='".trim($usuario)."' or id_usuario='".trim($usuario)."' or nom_usuario='".trim($usuario)."' ";
                $query=pg_query($conexion, $sql);
                $rows=pg_num_rows($query);
                $datos = pg_fetch_assoc($query);

                $correo_user = $datos['email'];
                $clave = $datos['clave'];
                // enviamos contraseña;
                $destino = $correo_user;
                $asunto = "Recordatorio de contraseña";
                $mensaje = "Tu contraseña es: ".$clave;
                $enviar_password = enviar_mail ($destino, $asunto, $mensaje);

                return "1";
            }else
            return "2";
       
    }
    function autenticar($usuario, $clave){

            include '../config.php';

           // Buscamos eel usuario
           $sql ="select * from users where nom_usuario='".trim($usuario)."' and clave='".trim($clave)."' ";
           $query=pg_query($conexion, $sql);
           $rows=pg_num_rows($query);
               if($rows){
                      $datos = pg_fetch_assoc($query);
                      $_SESSION['id'] = $datos['id']; 
                      $_SESSION['usuario']= $datos['nombre']." ".$datos['apellidos']; 
                      $_SESSION['id_usuario']= $datos['id_usuario']; 
                      $_SESSION['email']= $datos['email']; 
                      $_SESSION['tipouser'] = $datos['tipouser']; // Tipo de usuario
                      return "1";
                       
               }else {
                   return "2"; // Usuario y/o clave incorrecta
               }

    }

    function logout ($id){
        @session_start();

            if($_SESSION['id']==$id){
                session_unset();
                session_destroy();
                return "1";
            }else
                return "2"; // Error destruyendo sesión.
    }

    function crear_usuario ($id_usuario, $nombre, $apellidos, $email, $clave, $nom_usuario, $grado, $colegio, $tipouser){  // Crear usuario

        include '../config.php';
         // Buscamos eel usuario
         $sql ="select id from users where id_usuario='".trim($id_usuario)."' or nom_usuario='".trim($nom_usuario)."' ";
         $query=pg_query($conexion, $sql);
         $rows=pg_num_rows($query);
             if($rows){
                   return "2"; // Usuario ya existe;                     
             }else {
                
                // Insertamos usuario

                $insert = "insert into users (id_usuario, nombre, apellidos, email, clave, nom_usuario, id_grado, id_colegio, tipouser, fecha_registro)
                values('".$id_usuario."', '".$nombre."', '".$apellidos."', '".$email."', '".$clave."', '".$nom_usuario."', '".$grado."', '".$colegio."', '".$tipouser."', '".$fecha_registro."') ";
                $q_insert = pg_query($conexion, $insert);
                    if($q_insert)
                    return "1";
                    else
                    return "3"; // Problemas creando el usuario
             }

    }

    function ver_usuarios(){
        include '../config.php';
             $sql="select users.id, users.id_usuario, users.nombre, users.apellidos, users.email, users.nom_usuario, tipouser.descripcion tipouser,
             grado.descripcion as grado, colegio.descripcion as colegio 
             from users, grado, colegio, tipouser 
             where users.id_grado=grado.id and users.id_colegio=colegio.id and users.tipouser=tipouser.id
             ";
            $query = pg_query($conexion, $sql);

            $tabla = "";
            $i=1;
                    while($datos=pg_fetch_assoc($query)){

                        $resp = "";
                     $accion= '<a href=\"editar_user.php?id='.$datos["id"].'&nombre='.utf8_encode($datos['nombre']).'\" tittle=\"Revisar\"><p class=\"icon-note lg\">Editar Usuario</p></a>';
                         $tabla.='{ 
                                      "#":"'.$i.'",      
                                      "id_usuario":"'.$datos['id_usuario'].'",                                
                                      "nombre":"'.utf8_encode($datos['apellidos'])." ".utf8_encode($datos['nombre']).'",
                                      "username":"'.$datos['nom_usuario'].'",
                                      "email":"'.$datos['email'].'",
                                      "tipouser":"'.$datos['tipouser'].'",  
                                      "grado":"'.$datos['grado'].'",
                                      "colegio":"'.$datos['colegio'].'",                                        
                                      "accion":"'.$accion.'"
                              },';
                             // $data['data'][] = $tabla;
                              $i++;
                        }
                        //echo json_encode($data);
                        $tabla= substr($tabla,0, strlen($tabla) -1);
                        echo '{"data": ['.$tabla.']}';

    }

 
?>