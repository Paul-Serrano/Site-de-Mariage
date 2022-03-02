<?php

require_once "../includes/_head.php";

if(isset($_POST['contact-submit'])){
  
         if(true) {

          if($_POST['mail-to'] = 'paul') {
            $mailTo = "paul.serrano08374@gmail.com";
          }

          
          $sujet = $_POST['mail-to-topic'];
          $header ='From:'.$_SESSION['mail'].''; 
          $message='
          <html>
            <body>
              <div align="center">
                '.nl2br($_POST['message']).'
              </div>
            </body>
          </html>
          '; 
  
        mail($mailTo, $sujet, $message, $header);
       }

         else {
          return;
        }


        ?><pre><?php 
    // var_dump($_SESSION['surname']);
    var_dump($mailTo);
    var_dump($message);
    var_dump($sujet);
    // var_dump($userPass);
    ?></pre><?php

         header("Location:../view/index.php?success=sendMail");
 
} ?>