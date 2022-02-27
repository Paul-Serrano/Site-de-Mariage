<?php



if(isset($_POST['contact-submit'])){
  
         if(true) {

          $paulMail = "paul.serrano08374@gmail.com";
          $sujet = "test";
          $header ='From:"Site Mariage'; 
          $message='
          <html>
            <body>
              <div align="center">
                '.nl2br($_POST['message']).'
              </div>
            </body>
          </html>
          '; 
  
        mail($paulMail, $sujet, $message, $header);
       }

         else {
          return;
        }

         header("Location:../view/index.php?success=sendMail");
 
} ?>