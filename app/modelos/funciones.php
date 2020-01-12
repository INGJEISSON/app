<?php 
include('model_plantilla.php');
include('model_user.php'); // Modelos de usuario
    // Genramos la interfaz inical de la APP


        if (isset($_POST['login'])){

            echo $autenticar = autenticar($_POST['usuario'], $_POST['clave']);
            

        }
        if(isset($_POST['password_reset'])){
            echo $forgot_password = forgot_password($_POST['usuario']);
        }

        // if(isset($_POST['g_plantilla'])){ // Gestor de usuario

        // }

        if(isset($_POST['g_users'])){ // Gestor resolución de examen
           // echo "entro aquí";
                // Crear usuario
            if(isset($_POST['crea_user'])){
                    

               // echo "entro acá también";
                 echo $crear_user = crear_usuario ($_POST['id_usuario'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['clave'], $_POST['nom_usuario'], $_POST['grado'], $_POST['colegio'], $_POST['tipo']);

            }

        }



        if(isset($_POST['vista_app'])){ // Generamos la vista 
                //echo "jeisson";
                if($_POST['menu']){
                    include ('../app/template/menu.html');
                }

                if(isset($_POST['plantilla'])){ // Constructor de plantilla
                            $visualizar = visual_plantilla($_POST['id']);                                
                                echo $visualizar;

                }
        }

         if(isset($_GET['listar'])){ // Ver plantillas
                ver_plantillas();
         }
         if(isset($_GET['listar_preguntas'])){ // Ver plantillas
                ver_preguntas($_GET['id']);
         }

         if(isset($_GET['listar_opciones'])){ // Ver opciones
                ver_opciones($_GET['id']);
         }
         if(isset($_GET['listar_users'])){ // Listar usuarios
                 ver_usuarios();
         }
         
        if(isset($_POST['g_plantilla'])){ // Gestor de plantillas
           
            if(isset($_POST['crear'])){ // Crear plantilla

                $crear = crear_plantilla($_POST['nombre'], $_POST['descripcion'], $_POST['tipo'], $_POST['estado'], $_POST['user'], $_POST['cant_preguntas']);
                echo $crear;
            }
            if(isset($_POST['crear_pregunta'])){
                $crear = crear_pregunta($_POST['id_plantilla'], $_POST['tipo'], $_POST['estado'], $_POST['titulo'],
                 $_POST['nombre'], $_POST['ayuda'], $_POST['competencia'], $_POST['componente']);
                 echo $crear;
            }
            if(isset($_POST['crear_opcion'])){
             //  ($id, $nombre, $valor)
                $crear = crear_opcion ($_POST['id_pregunta'], $_POST['nombre'], $_POST['valor'], $_POST['resp_correcta']);
                echo $crear;

            }

        }
        
        
?>