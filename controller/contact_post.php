<?php

require_once "../includes/_head.php";

if(isset($_POST['contact-submit'])){

  if(empty($_POST['mail-to'])) {
    header('Location:../view/contact.php?error=noMailTo');
    exit;
  }

  if(empty($_POST['message'])) {
    header('Location:../view/contact.php?error=noMessage');
    exit;
  }
  
         if(true) {

          if($_POST['mail-to'] == 'paul') {
            $mailTo = "paul.serrano08374@gmail.com";
          }

          $header="MIME-Version: 1.0\r\n";

          if(isset($_SESSION['mail'])) {
            $header.='From:'.$_SESSION['mail']."\n";
          }
          else {
            $header.='From:'.$mailTo."\n";
          }

          $header.='Content-Type:text/html; charset="utf-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit';

          $sujet = $_POST['mail-to-topic'];
          $message='
          <html>
            <body>
              <div>
                '.nl2br($_POST['message']).'
              </div>
            </body>
          </html>
          '; 
  
        mail($mailTo, $sujet, $message);
       }


    ?><pre><?php 
    var_dump($mailTo);
    var_dump($message);
    var_dump($sujet);
    var_dump($header);
    ?></pre><?php

         header("Location:../view/index.php?success=sendMail");
 
} ?>