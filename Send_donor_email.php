<?php
                                             
   require('db_connecting.php');
                                                     
                                                 
                                            $sqli2 = "SELECT `name`,`email`,`phone` FROM `charity`";
                                            $result2 = $conn->query($sqli2);
                                        ?>
<?php
                                                if ($result2 ->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                       //$name = $row['name'];
                                                       $email = $row['email'];
                                                       $phone = $row['phone'];
                                                }}
                                                       ?>

<?php
                                             
   require('db_connecting.php');
                                                    
                                                 
                                            $sqli2 = "SELECT `itemName` FROM `donation` ";
                                            $result2 = $conn->query($sqli2);
                                        ?>
<?php
                                                if ($result2 ->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                       $itemName = $row['itemName'];
                                                }}
                                                       ?>
<?php
if ($_POST['donor_email']){
    $email= $_POST['donor_email'];
    $to = $email;
    $subject = "يمكنك التبرع الآن";
    $message ="<p style='text-align: center;'> يمكنك التبرع الان للجمعية الخيرية عن الطلب: $itemName </p>" ."<br>"."<p style='text-align: center;'>للتواصل مع الجمعية عبر البريد الالكتروني:$email </p>"."<br>"." <p style='text-align: center;'>أو عبر الهاتف:  $phone </p>"."<br>"."<p style='text-align: center;'> شاكرين لك مساهمتك وانضمامك معنا  </p>"."<br>"."<p style='text-align: center;'>   منصة عون الخيرية</p>";
    $headers = "Content-type:text/html;charset=UTF-8"."\r\n";
    
    if(mail($to, $subject, $message,$headers)){
           
      $sql = "UPDATE `donation` SET `donationStatus`='1' ";
      $result = $conn->query($sql);
      
      echo "Email Sent"; 
    }
   
}
?>
