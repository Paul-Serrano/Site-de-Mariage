<?php



if(isset($_POST['contact-submit'])){
  
         if(true) {

          $header = "";
          $header="MIME-Version: 1.0\r\n";
          $header.='From:"Site Mariage'."\n";
          $header.='Content-Type:text/html; charset="utf-8"'."\n";
          $header.='Content-Transfer-Encoding: 8bit'; 
          $message='
          <html>
            <body>
              <div align="center">
                '.nl2br($_POST['message']).'
              </div>
            </body>
          </html>
          '; 
  
  mail("paul.serrano08374@gmail.com", "Site Mariage !", $message,
  $header);



         }

         else {
          return;
        }
         
         echo "<script>alert('Votre message a bien été envoyé, je vous répondrais dans les meilleurs délais !');</script>";
         sleep(1);

         header("Location:../view/index.php");
 
} ?>