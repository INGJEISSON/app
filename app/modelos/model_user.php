<?php
// En desarrollo ..

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

 
?>