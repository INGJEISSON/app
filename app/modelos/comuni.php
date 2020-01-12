<?php 
    // Enviar email

    function enviar_mail ($destino, $asunto, $mensaje){

        $to = "no-responder@sicmath.herokuapp.com";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: $host' . "\r\n";
       // $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to,$asunto,$mensaje,$headers);

            return "1";

        // $asunto = "HTML email";

        // $message = "
        // <html>
        // <head>
        // <title>HTML email</title>
        // </head>
        // <body>
        // <p>This email contains HTML Tags!</p>
        // <table>
        // <tr>
        // <th>Firstname</th>
        // <th>Lastname</th>
        // </tr>
        // <tr>
        // <td>John</td>
        // <td>Doe</td>
        // </tr>
        // </table>
        // </body>
        // </html>
        // ";

        // Always set content-type when sending HTML email
      
    }

?>