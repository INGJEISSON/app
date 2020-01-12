<?php 
    
    function visual_plantilla($id){
             include '../config.php';

            // Nombre de la plantilla 
            $sql ="select * from plantilla where id='".$id."' ";
            $query=pg_query($conexion, $sql);
            $rows=pg_num_rows($query);
                if($rows){
                        $datos = pg_fetch_assoc($query);
                        // Buscamos si existen preguntas
                        $sql2="select * from preguntas where id_plantilla='".$id."' ";
                        $query2 = pg_query($conexion, $sql2);
                        $rows2=pg_num_rows($query2);
                                if($rows2){
                                    include('plantilla.php'); // Mostramos la plantila con sus preguntas..

                                }else{
                                    return "No existen preguntas formuladas en ésta plantilla "; // NO existen preguntas aún. 
                                }
                }else {
                    return "Ocurrio un problema aquí, comunícate con el administrador"; // PLantilla No existe.
                }


    }
    
    
    function ver_plantillas(){
            include '../config.php';
            $sql="select plantilla.id, plantilla.nombre, plantilla.descripcion, tipo_plantilla.descripcion as tipoplantilla, estado.descripcion as estado, plantilla.cant_preguntas
            from plantilla, tipo_plantilla, estado where plantilla.tipo=tipo_plantilla.id and plantilla.id_estado=estado.id
            ";
            $query = pg_query($conexion, $sql);

            $tabla = "";
            $i=1;
                    while($datos=pg_fetch_assoc($query)){

                         $s="select * from preguntas where id_plantilla='".$datos['id']."' ";
                        $q=pg_query($conexion, $s);
                        $r=pg_num_rows($q);

                        $n_preguntas = $r;
                     $accion= '<a href=\"crear_preguntas.php?id='.$datos["id"].'&nombre='.utf8_encode($datos['nombre']).'\" tittle=\"Revisar\"><img src=\"../../librerias/img/conversation.png\" title=\"Crear preguntas\" /></a> |<a href=\"plantilla.php?modo=1&id='.$datos["id"].'&nombre='.utf8_encode($datos['nombre']).'\" tittle=\"Revisar\"><img src=\"../../librerias/img/view.png\" title=\"Visualizar\" /></a> ';
                         $tabla.='{ 
                                      "#":"'.$i.'",
                                      "nombre":"'.utf8_encode($datos['nombre']).'",
                                      "descripcion":"'.utf8_encode($datos['descripcion']).'",
                                      "tipo":"'.$datos['tipoplantilla'].'",
                                      "estado":"'.$datos['estado'].'",
                                      "n_preguntas":"'.$n_preguntas.'",
                                      "cant_preguntas":"'.$datos['cant_preguntas'].'",
                                      "accion":"'.$accion.'"
                              },';
                             // $data['data'][] = $tabla;
                              $i++;
                        }
                        //echo json_encode($data);
                        $tabla= substr($tabla,0, strlen($tabla) -1);
                        echo '{"data": ['.$tabla.']}';

    }

    function ver_preguntas($id){
        include '../config.php';
             $sql="select preguntas.id, preguntas.id_tipopregunta, preguntas.titulo, preguntas.nombre, plantilla.nombre as plantilla, estado.descripcion as estado, tipopregunta.nombre as tipopregunta
            from estado, preguntas, plantilla, tipopregunta
            where tipopregunta.id=preguntas.id_tipopregunta and estado.id=preguntas.id_estado and preguntas.id_plantilla=plantilla.id and preguntas.id_tipopregunta=tipopregunta.id
            and preguntas.id_plantilla='".$id."' ";
            $query = pg_query($conexion, $sql);

            $tabla = "";
            $i=1;
                    while($datos=pg_fetch_assoc($query)){

                        $s="select * from opciones where id_pregunta='".$datos['id']."' ";
                        $q=pg_query($conexion, $s);
                        $r=pg_num_rows($q);

                        $s2="select opciones.nombre from opciones, resp_pregunta where resp_pregunta.id_opcion=opciones.id and resp_pregunta.id_pregunta='".$datos['id']."' ";
                        $q2=pg_query($conexion, $s2);
                        $r2=pg_num_rows($q2);
                            if($r2==0)
                            $resp = "<font color=red><b>NO DISPONIBLE</b></font>";
                            else {
                                $d2 =pg_fetch_assoc($q2);
                                $resp = $d2['nombre'];
                            }


                      
                     $accion= '<a href=\"crear_opciones.php?id='.$datos["id"].'&nombre='.utf8_encode($datos['titulo']).'\" tittle=\"Revisar\"><p class=\"icon-note lg\">Crear opciones</p></a>';
                         $tabla.='{ 
                                      "#":"'.$i.'",
                                      "titulo":"'.utf8_encode($datos['titulo']).'",
                                      "nombre":"'.utf8_encode($datos['nombre']).'",
                                      "tipo":"'.$datos['tipopregunta'].'",
                                      "estado":"'.$datos['estado'].'",
                                      "respuesta":"'.$resp.'",
                                      "plantilla":"'.$datos['plantilla'].'",
                                      "opciones":"'.$r.'",
                                      "accion":"'.$accion.'"
                              },';
                             // $data['data'][] = $tabla;
                              $i++;
                        }
                        //echo json_encode($data);
                        $tabla= substr($tabla,0, strlen($tabla) -1);
                        echo '{"data": ['.$tabla.']}';

    }

    function ver_opciones($id){
        include '../config.php';
             $sql="select opciones.id, plantilla.nombre as plantilla, opciones.nombre, opciones.valor, preguntas.titulo as pregunta
             from opciones, preguntas, plantilla
             where opciones.id_pregunta=preguntas.id and preguntas.id_plantilla=plantilla.id
             and opciones.id_pregunta = '".$id."'
             ";
            $query = pg_query($conexion, $sql);

            $tabla = "";
            $i=1;
                    while($datos=pg_fetch_assoc($query)){

                        $resp = "";
                     $accion= '<a href=\"editar_opcion.html?id='.$datos["id"].'&nombre='.utf8_encode($datos['nombre']).'\" tittle=\"Revisar\"><p class=\"icon-note lg\">Editar opción</p></a>';
                         $tabla.='{ 
                                      "#":"'.$i.'",                                      
                                      "nombre":"'.utf8_encode($datos['nombre']).'",
                                      "plantilla":"'.$datos['plantilla'].'",
                                      "valor":"'.$datos['valor'].'",
                                      "pregunta":"'.$datos['pregunta'].'",                                      
                                      "accion":"'.$accion.'"
                              },';
                             // $data['data'][] = $tabla;
                              $i++;
                        }
                        //echo json_encode($data);
                        $tabla= substr($tabla,0, strlen($tabla) -1);
                        echo '{"data": ['.$tabla.']}';

    }
    function consul_plantilla ($nombre, $tipo){
        @include '../config.php';
         $sql = "select * from plantilla where nombre='".utf8_decode($nombre)."' and tipo='".$tipo."' ";
        $query=pg_query($conexion, $sql);
        $rows=pg_num_rows($query);
                if($rows)
                return "1";
                else {
                    return "2";
                }
    }
    function crear_plantilla($nombre, $descripcion, $tipo, $estado, $user, $cant_preguntas){
        @include '../config.php';
        $valida_plant = consul_plantilla($nombre,$tipo);
                if($valida_plant==2){

                    // $in = "insert into plantilla (nombre, descripcion, tipo, id_estado, id_user) 
                     $in = "insert into plantilla (nombre, descripcion, tipo, id_estado, cant_preguntas) 
                    values('".utf8_decode($nombre)."', '".utf8_decode($descripcion)."', '".$tipo."', '".$estado."', '".$cant_preguntas."') ";
                    $qin=pg_query($conexion, $in);

                        if($qin)
                        return "1";
                        else {
                            return "2";
                        }
                }else {
                    return "3"; // Nombre ya existe
                }
    }

    function editar_plantilla($id, $nombre, $descripcion, $tipo, $estado){
          @include '../config.php';
           $valida_plant = consul_plantilla($nombre,$tipo);
             if($valida_plant==1){
                    $up = "update plantilla set nombre='".$nombre."', tipo='".$tipo."', id_estado='".$estado."',
                    descripcion='".$descripcion."' where id='".$id."' ";
                    $qup=pg_query($conexion, $up);
             }else {
                 return "2"; // Planillta no existe..
             }
    }
    function elim_plantilla($id, $estado, $nombre, $tipo){
        @include '../config.php';
           $valida_plant = consul_plantilla($nombre,$tipo);
             if($valida_plant==1){
                    $up = "update plantilla set id_estado='".$estado."' where id='".$id."' ";
                    $qup=pg_query($conexion, $up);
             }else {
                 return "2"; // Planillta no existe..
             }
    }

// --------------------------------------------------------------------------------------------------------
    // Permisos de plantilla
    function permisos_usu($id, $user){
        $sql = "select * from permisos_plant where id_plantilla='".$id."' and id_user='".$user."' ";
        $query=pg_query($conexion, $sql);
        $rows=pg_num_rows($query);
                if($rows) // Usuario ya esta con algun permiso.
                return "1";
                else {
                    return "2";
                }
    }

    function permisos_plant($id, $user, $estado, $nombre, $tipo){
         @include '../config.php';
           $valida_plant = consul_plantilla($nombre,$tipo);
            if($valida_plant==1){

                    $validar_perms_usu = permisos_usu($id,$user);
                        if($validar_perms_usu==1)
                         $up= "update permisos_plant set id_estado='".$estado."' where id_plantilla='".$id."' and id_user='".$user."'  ";
                         else
                         $up = "insert into permisos_plant (id_plantilla, id_user, id_estado) values('".$id."', '".$user."', '".$estado."' ) ";

                        $qup=pg_query($conexion, $up);
               

            }else {
                 return "2"; // Planillta no existe..
            }
    }




    // --------------------------------------------------------------------------------------------------------
    // Preguntas de plantilla

    function consul_pregunta ($id, $tipo, $nombre){
        @include '../config.php';
         $sql = "select * from preguntas where nombre='".$nombre."' and id_tipopregunta='".$tipo."' and id_plantilla='".$id."' ";
        $query=pg_query($conexion, $sql);
        $rows=pg_num_rows($query);
                if($rows)
                return "2"; // Pregunta existe
                else {
                    return "1";
                }

    }
     function crear_pregunta($id, $tipo, $estado, $titulo, $nombre, $ayuda, $competencia, $componente){
          @include '../config.php';
         $validar_pregunt = consul_pregunta($id, $tipo, $nombre);
            if($validar_pregunt==1){
                if(isset($_SESSION['id_archivo'])){
                  //  echo "Entró aquí";
                $id_archivo  = $_SESSION['id_archivo'];
                }
                else
                $id_archivo=0; // No tiene archivo adjunto.

                //echo "id_archivo". $id_archivo;

               $in = "insert into preguntas (id_plantilla, id_tipopregunta, id_estado, titulo, nombre, ayuda, competencia, componente, id_archivo)
                values('".$id."', '".$tipo."', '".$estado."', '".$titulo."',  '".$nombre."', '".$ayuda."', '".$competencia."', '".$componente."', '".$id_archivo."') ";
                 $qin = pg_query($conexion, $in);

                 if(isset($_SESSION['id_archivo'])){
                    session_unset($_SESSION['id_archivo']); // Borramos de id para archivos.
                    $_SESSION['id_archivo'] =""; // Borramos de id para archivos.
                 }
                 
                        if($qin)
                        return "1";
                        else {
                            return "2";
                        }
            }else {
                return "3"; // PRegnta ya existe.
            }

     }
     function edit_pregunta(){

     }
     function elim_pregunta(){

     }

     function crear_respuesta(){

     }

     function edit_respuesta(){

     }
     function elim_respuesta(){

     }


      // --------------------------------------------------------------------------------------------------------
    // Opciones Preguntas de plantilla
    

//     function resp_opcion ($id, $nombre){
//         @include '../config.php';
//         $sql ="select * from opciones where id_pregunta='".$id."' and nombre='".$nombre."' ";
//         $query=pg_query($conexion, $sql);
//          $rows=pg_num_rows($query);
//                if($rows){
                   
//                     $datos = pg_fetch_assoc($query);
//                      return 
//                }
//                else
//                return "1"; 

//    }

function validar_resp_correcta($id_pregunta){
    @include '../config.php';
     $sql ="select id from resp_pregunta where id_pregunta='".$id_pregunta."' ";
    $query=pg_query($conexion, $sql);
     $rows=pg_num_rows($query);
        if($rows)
        return "1";
        else 
        return "2";

}

    function resp_correcta($id_pregunta, $id_opcion){ // Insertamos opción de la respuesta correcta a la pregunta
        @include '../config.php';
                $validar = validar_resp_correcta($id_pregunta);
                        if($validar==2){
                    $in = "insert into resp_pregunta (id_pregunta, id_opcion, fecha_registro)
                    values ('".$id_pregunta."', '".$id_opcion."', '".$fecha_registro."') ";
                        }
                        else{
                            $in = "update resp_pregunta set id_opcion='".$id_opcion."' where  id_pregunta='".$id_pregunta."' ";
                        }

                $qin= pg_query($conexion, $in);
            
                

    }
    function validar_opcion ($id, $nombre){
         @include '../config.php';
         $sql ="select * from opciones where id_pregunta='".$id."' and nombre='".$nombre."' ";
         $query=pg_query($conexion, $sql);
          $rows=pg_num_rows($query);
                if($rows)
                return "2"; // Opcion ya existe.
                else
                return "1"; 

    }
    function crear_opcion ($id, $nombre, $valor, $resp_correcta){
        @include '../config.php';
        $validar = validar_opcion($id, $nombre);
            if($validar==1){  

                if($valor=='')
                $valor =0;

               // echo  "valor de : ".$resp_correcta;

                $in = "insert into opciones (id_pregunta, nombre, valor, fecha_registro) 
                values('".$id."', '".$nombre."', '".$valor."', '".$fecha_registro."') ";
                $qin= pg_query($conexion, $in);

                        if($qin){
                          
                          

                            if($resp_correcta==1) { // Si la opción es sí,, insertamos la respuesta correcta a ésta pregunta.
                                 $s = "select max(id) as id from opciones";
                                $q = pg_query($conexion, $s);
                                $r = pg_num_rows($q);
                                    if($r){
                                        $d = pg_fetch_assoc($q);
                                        $in_resp = resp_correcta($id, $d['id']);
                                    }      
                            }
                                 
                            return "1";
                        }
                        else
                        return "2";

            }else {
                return "3"; // Opción ya existe.
            }


    }
?>