


<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
   
    </head>
    <header id="headerPage" style="padding:28px 16px">
            <form id="signout" action="logout.php" method="POST">
                <input type="submit" value="تسجيل خروج">
            </form> 
            <img src="logo.jpg" alt="logo" class="pageP"  >
        </header>
    <body>
        
        <div class="auth-content"> 
            <?php
            echo '<h1>نموذج طلب انضمام المنظمات الخيرية</h1>';
            ?> 

   
    <form method="POST">
        
                <fieldset>
                    
                <input type="text" name="name"  placeholder="اسم المنظمة الخيرية" required> <br>
                <input type="text" name="username" placeholder="اسم المستخدم "required> <br>
                <input type="textarea" name="descrption"  rows="5" cols="20" placeholder="وصف المنظمة الخيرية"><br>
                <input type="email" name="email" placeholder="البريد الالكتروني "required><br>
                <input type="password" name="passwod" placeholder="كلمة المرور" required ><br>
                <input type="text" name="PhoneNumber" placeholder="رقم الجوال"required><br>  <br>
                
                    <label>هل تتوفر خدمة التوصيل ؟</label>
              <ol>
                  <il> <input id="yes" type="radio" name="option"  value="yes" >نعم </il>
                  <il> <input id="no" type="radio" name="option"  value="no">لا</il>
            </ol>
              <br>
               <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                <input type="checkbox" name="type[]" id="clothes" class="name-input" value ="ملابس">ملابس 
                <input type="checkbox" name="type[]" id="furniture" class="name-input" value="اثاث"> اثاث
                <input type="checkbox" name="type[]" id="electronic" class="name-input" value="الكترونيات"> الكترونيات
                <input type="checkbox" name="type[]" id="books" class="name-input" value="كتب_ورق"> كتب وورق
              
                <br><br> 
             
                <input type="text" name="location" placeholder="الموقع"required>
                <br>  <br> 
                
                <input type="text" name="LicenseNumber" placeholder="رقم الترخيص" required> <br> <br> 
                
                
                <input type="file" name="picture" placeholder="صورة الملف التعريفي"><br> <br> 
        
                <button type="submit" name="submit" class="bu1" onclick="validate();return false;" >تسجيل</button>
                </fieldset>
            </form>
            <?php
           $server = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "awondb";

                    //define DB
                $conn = mysqli_connect("$server" , "$username", "$password", "$dbname");
                
                $error =mysqli_connect_error();
                          if ($error != null) {
                          echo "<p>Eror!! could not connect to DB may not connect </p>";}
                          else {    echo 'success connect';}
             
            if($_SERVER['REQUEST_METHOD']=="POST"){ 
                
               $name = $_POST['name'];
               $username = $_POST['username'];
               $descrption = $_POST['descrption'];
               $email = $_POST['email'];
               $passwod = $_POST['passwod'];
               $PhoneNumber =$_POST['PhoneNumber'];
               $option = $_POST['option'];
               $type = $_POST['type'];
               $servicetype="";
              
          for ($i=0; $i< sizeof ($type);$i++) {  
          $servicetype.=$type[$i].","; }
          
              $location =$_POST['location'];
              $LicenseNumber = $_POST['LicenseNumber'];
              $picture=$_POST['picture'];
                
              $query = "INSERT INTO `charity`(name , username, descrption, email , pass , phone, service, donatoionType,location,LicenseNumber,picture,status) VALUES ('$name', '$username', '$descrption' ,'$email', '$passwod', '$PhoneNumber','$option','$servicetype','$location','$LicenseNumber','$picture','null')";
              $run = mysqli_query($conn, $query);
                     
       if($run){
           
          echo '<script> alert("success Rigester");</script>';
            echo
           '<script>
           window.location ="confirmationPage.php";
           </script>';
          
       }
                  
              
           else {    
               echo '<script> alert("field Riggester");</script>';}
                   
} 
                
            
            
            ?>
        
                 
                            </div>


   
                </body>
                <br><br>
                <footer class="footer">  
                    <div class="SOCIAL">
                        <br>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                    <p>&copy; KSU|Desigend by Aljawharah, Lamya, Rahaf, Sahar and Leen</p>
                </footer>
  
   
    
