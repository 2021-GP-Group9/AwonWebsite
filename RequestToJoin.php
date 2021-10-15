<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
    <!-- <script src="webPro.js"></script> -->
    <header id="headerPage" style="padding:128px 16px">
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
            
            
            <form method="POST" id="JoiningRequestForm" >
                <!-- <fieldset> --> 
                    <legend><h1> <br>التسجيل</h1></legend>

               
                <br>
                <br>

                <input type="text" name="name" id="name" class="name-input" placeholder="اسم المنظمة الخيرية" required> 
                
                <input type="text" name="username" id="username" class="name-input" placeholder="اسم المستخدم "required>
                
                <textarea name="descrption" id="description" class="name-input" rows="5" cols="20" placeholder="وصف المنظمة الخيرية"></textarea>
                <!--<input type="text" name="username" id="username" class="name-input" placeholder="وصف المنظمة الخيرية" required> -->
                <br><br>
                <input type="email" name="email" id="email" class="name-input" placeholder="البريد الالكتروني "required>
                
                <input type="password" name="passwod" class="password" id="password" placeholder="كلمة المرور" required >
                <br><br>

                <input type="text" name="PhoneNumber" id="phone" class="name-input" placeholder="رقم الجوال"required><!-- tel or number?  -->
                
                <input type="text" name="LicenseNumber" id="liccenNum" class="name-input" placeholder="رقم الترخيص"required>
                
                 <label> صورة الملف التعريفي</label>
            <input type="file" name="picture" id="pic" class="name-input" >
                
                <!--<input type="image" name="picture" id="pic" class="name-input" placeholder="صورة الملف التعريفي"required>--><!-- it is uploade not sure --> 
                <br><br>
                <!<!-- API -->
                <input type="text" name="location" id="location" class="name-input" placeholder="الموقع"required><!-- not sure if it is url maybe it is select -->
                <br> <br>  
                
               <!-- <label>هل تتوفر خدمة التوصيل ؟ </label>
                  <input type="radio" name="username" id="username" class="name-input">
                  <label for="نعم">نعم</label>
                  <input type="radio" name="username" id="username" class="name-input">
                  <label for="لا">لا</label> -->
                
                 <label>هل تتوفر خدمة التوصيل ؟</label>
              <ol>
                  <il> <input id="yes" type="radio" name="option" class="name-input" value="نعم" checked>نعم </il>
                  <il> <input id="no" type="radio" name="option" class="name-input" value="لا">لا</il>
            </ol>
              
        
                <br><br>
                <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                <input type="checkbox" name="type" id="clothes" class="name-input">
                <label for="ملابس">ملابس</label>
                <input type="checkbox" name="type" id="furniture" class="name-input">
                <label for="اثاث">اثاث</label>
                <input type="checkbox" name="type" id="electronic" class="name-input">
                <label for="الكترونيات">الكترونيات</label>
                 <input type="checkbox" name="type" id="books" class="name-input">
                <label for="الكترونيات">كتب وورق</label>
                <br>

                  
             <!-- <input type="submit" name="submit" class="bu1" value="تسجيل"  onclick="validate();return false;"/> -->
                
                <button type="submit" name="submit" class="bu1" onclick="validate();return false;" >تسجيل</button>
                
         
                <br><br>
           
            </form>

                </div>
<?php

            $server = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "awondb";

                    //define DB
                $connection = mysqli_connect($server , $username, $password, $dbname);

                //error handling
                          $error =mysqli_connect_error();
                          if ($error != null) {
                          echo "<p>Eror!! could not connect to DB may not connect </p>";}
                          
                          
                          
      //insert data from form to DB
         if($_SERVER['REQUEST_METHOD']=="POST"){
                          
         //if (isset($_POST['submit'])){
             
                 $ID=$_SESSION['ID'];
                 $name = $_POST['name'];
                 $username = $_POST['username'];
                 $descrption = $_POST['descrption'];
                 $email = $_POST['email'];
                 $passwod = $_POST['passwod'];
                 $PhoneNumber =$_POST['PhoneNumber'];
                 $LicenseNumber = $_POST['LicenseNumber'];
                 $picture = $_POST['$picture']; 
                 $location = $_POST['location'];
                 $option = $_POST['option'];
                 $type = $_POST['type'];
                 
                 
                  $query = "INSERT INTO joining_request(ID, name, user_name, descrption, description, email, password , phone_num , License_num , photo, location, pickup_service , typeof_donation ) values('$ID','$name', '$username' , '$descrption', '$email', '$passwod',$PhoneNumber,$LicenseNumber, $picture, $location, $option, $type )";
                  
                  $run = mysqli_query( $connection, $query ) or die(mysqli_error()) ;
                  
                  if($run){
                      
                      echo "Add information register successfully!" ;
                      }
                      
                   else {
                         echo "incorrect added" . mysqli_error($connection);
                     
                        /*
                    $sql2 = "SELECT id, name FROM Class WHERE coach_id=$coach_id";
                    $resul1t=mysqli_query($connection, $sql2);
                    while($rows=mysqli_fetch_assoc($resul1t)){
                     $idco = $rows['id'];
                     }
                     header("location:classInformation.php?id=$idco");*/
                   }
          }
       
                 
                 ?>
                 
            


                </body>
    <!-- Footer -->
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
    <!-- validation to verify forms input -->
    <script>
        
        function validate(form) {
     
 var Email = document.getElementById("email"); 
 var Password = document.getElementById("password"); 
 var Name = document.getElementById("name"); 
 var phone = document.getElementById("phone");
 
 
  var syn = /[^@]+@[a-zA-Z]+\.[a-zA-Z]{2,6}/;  // to ensure the email input allow only correct address
  //validate input email
  
  var letters = /^[a-zA-Z\s]*$/;     // to ensure the name input allow to string only

  var digit = /^\d{10}$/ ; //to ensure the phone# input allow only correct address
  
  
  
//1-validate name

var checkName = Name.value.match(letters);

        if (Name.value == "" || Name.value == null ) {
            alert("من فضلك ادخل اسم الجمعية");
            Name.focus();
            return false; }

if (!checkName){
alert("من فضلك ادخل اسم صحيح");
            Name.focus();
            return false;}
        
//2-validate phone number

var checkPhone = phone.value.match(digit); // must be numbers

        if (phone.value == "" ) {
            alert("من فضلك ادخل رقم الجمعية");
            phone.focus();
            return false;
        }
if (!checkPhone || phone.value.length <10 || phone.value.length >10)
{
           alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
            phone.focus();
            return false;
        }

 
//3-validate email
var checkEmail = Email.value.match(syn);

        if (Email.value == "") {
           alert( "من فضلك ادخل البريد الإلكتروني");
            Email.focus();
           return false; }
 
if (!checkEmail){
alert( "من فضلك ادخل بريد إلكتروني صالح");
            Email.focus();
            return false;}

//4-validate password
if (Password.value == "") {
           alert( "من فضلك ادخل كلمة المرورة");
            Password.focus();
           return false; }
       
        //confirm ("تأكيد معلومات التسجيل");
         if(!confirm("هل أنت متأكد من معلومات التسجيل؟")) {
                  return false;}
              
              else{
                  return window.location = "index.php";
              }   

  
             this.form.submit();
 
}


      </script>
      
      

                </html>

