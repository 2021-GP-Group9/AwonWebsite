<?php

if ($_POST['donor_email']){
    $email= $_POST['donor_email'];
    $to = $email;
    $subject = "يمكنك التبرع الآن";
    $message ="<p style='text-align: center;'> يمكنك التبرع الان للجمعية الخيرية </p>"."<br>"."<p style='text-align: center;'> https://awoon.000webhostapp.com/index.php"."</p>"."<p style='text-align: center;'>منصة عون الخيرية     </p>";
    $headers = "Content-type:text/html;charset=UTF-8"."\r\n";
    
    if(mail($to, $subject, $message,$headers)){
           
      $sql = "UPDATE `donation` SET `donationStatus`='1' ";  
      
      echo "Email Sent"; 
    }
   
}
?>
