<?php session_start();
$ID = $_SESSION['ID'];
$server = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "awondb";

$conn = mysqli_connect("$server" , "$username", "$password", "$dbname") ;
                
                $error =mysqli_connect_error();
                          if ($error != null) {
                          echo "<p>Eror!! could not connect to DB may not connect </p>";}

	
?>


<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
    <header id="headerPage" style="padding:28px 16px">
           <form id="signout" action="logout.php" method="POST">
	<input type="submit" value="تسجيل خروج">
		</form> 
            </form> 
            <img src="logo.jpg" alt="logo" class="pageP"  >
        </header>
    

<?php
	$option = "";

	$sqli = "SELECT * FROM `charity` WHERE ID = '$ID'";
	////echo $sqli;
	$result = $conn->query($sqli);

	$row = $result->fetch_assoc();
	//define DB
	$name =$row['name'];
	$username = $row['username'];
	$pass=$row['pass'];
	$email=$row['email'];
	$PhoneNumber=$row['phone'];
	$LicenseNumber=$row['LicenseNumber'];
	$location=$row['location'];
	$descrption=$row['descrption'];
	$option = $row['service'];
	$type = $row['donatoionType'];
	$picture=$row['picture'];
?>
        
        <body>
        <div class="auth-content"> 
            <?php
            echo '<h1>إدارة الملف الشخصي</h1>';
            ?>    
            
             <form method="post" id="ManageTheProfile" enctype="multipart/form-data" action="UpdateProfilePage.php">
                 
                 
         
              <input type="text" name="name" id="name" required value= "<?php echo $name?>" >
              <label for="username">اسم المستخدم</label>
               
          
                  
              <input type="text" name="username" id="username" required value= "<?php echo $username?>">
              <label for="name" >اسم المنظمة الخيرية</label>  
         
          
             
              <br>
               
           
              <input type="email" name="email" id="email" required value= "<?php echo $email?>" >
              <label for="password">كلمةالمرور</label>
               
          
               <input type="password" name="pwd" class="password" id="password"  required value= "<?php echo $pass?>" >
               <label for="email">البريد الالكتروني</label>
                  
                        
                <br>
                        
               <input type="tel" name="phone_number" id="phone_number" maxlength="10" required value= "<?php echo $PhoneNumber?>"><!-- tel or number?  -->
               <label  for="license_Number">رقم الترخيص</label> 
          
                     
                <input type="int" name="license_Number" id="license_Number" required value= "<?php echo $LicenseNumber?>">
                <label for="phone_number">رقم الجوال</label>
                      
                       
                 <br>
                        
                    
                 <input type="text" name="location" id="location" required value= "<?php echo $location?>"><!-- not sure if it is url maybe it is select -->
                 <label  for="location">الموقع</label>
                   
                 <br>
                     
                  
                  <label>هل تتوفر خدمة التوصيل ؟ </label>
                 <?php ///echo " option : ", $option . "<br>"; ?>
                  <input type="radio" name="pickup_servise" id="pickup_servise" value="yes"  <?php if( $option == 'yes') echo " checked" ?>>
                  <label for="نعم">نعم</label>
                  <input type="radio" name="pickup_servise" id="pickup_servise"  value="no"  <?php if( $option == 'no') echo " checked" ?>>
                  <label for="لا">لا</label>    
                      
                <br>

                    <?php 

                        ///echo  $type;

                        $headers = explode(',', $type);

                      
                       
                    ?>

                <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                <input type="checkbox" name="types[]" id="type_of_donation"  value="ملابس"
                       <?php
                        if (in_array('ملابس', $headers)) {
                             echo " checked ";
                        }
                        ?>
                       >
                <label for="ملابس">ملابس</label>
                 
                <input type="checkbox" name="types[]" id="type_of_donation"   value="اثاث"
                       <?php
                        if (in_array('اثاث', $headers)) {
                             echo " checked ";
                        }
                        ?>
                       
                       >
                <label for="اثاث">اثاث</label>
                <input type="checkbox" name="types[]" id="type_of_donation"  value="الكترونيات"
                       <?php
                        if (in_array('الكترونيات', $headers)) {
                             echo " checked ";
                        }
                        ?>
                       
                       >
                
                <label for="الكترونيات">الكترونيات</label>
                
                 <input type="checkbox" name="type[]" id="books" class="name-input" value="كتب_ورق"
                        
                        
                            <?php
                        if (in_array('كتب_ورق', $headers)) {
                             echo " checked ";
                        }
                        ?>
                       
                       >
                           <label for="كتب_ورق">كتب_ورق</label>
                        
                          
                
                <br>
                <br>
           
                
                <input type="file" id="img" name="img" accept="image/*"  >
                <label for="img">صورة الملف التعريفي</label>
        
                <br>
       
                 <textarea rows="4" type="text" name="description" id="description" required > <?php echo $descrption ?> </textarea>
                 <label for="description">وصف المنظمة الخيرية</label> 
                
                 <br>
                  
                     <button class="bu1" id="Edit" type="submit" name="Edit" onclick="return validate();">حفظ</button>
              
             </form>
            

                </div>


            


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
   
<script>
       
    
     function validate(form) {
        	///alert("validate edit form");
		 	var phone = document.getElementById("phone_number");
		 	var digit = /^\d{10}$/ ; //to ensure the phone# input allow only correct address
		 	//1-validate phone number
			var checkPhone = phone.value.match(digit); // must be numbers
			if (!checkPhone || phone.value.length <10 || phone.value.length >10)
			{
			   	alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
				phone.focus();
				return false;
			}

			///alert("phone done");
			var myPassword = document.getElementById("password");
		 	var newPass = document.getElementById("password").value;
		 	///alert("New Password : " + newPass);
			var passworsChar  = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
			var cheackPass =document.getElementById("password").value.match(passworsChar); 
		 
		 
		 	
			//2-validate password
			if (newPass == "") {
				alert( "من فضلك ادخل كلمة المرورة");
				myPassword.focus();
				return false; 
			}
       
			if(newPass.length < 8){

				alert( "كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
				myPassword.focus();
			   return false; 
			}
       
        	if(!cheackPass){
				alert("password should contain at least one number and one special character");
				return false;
			}     
		 	///alert("Password done");
         
		 this.form.submit();
    }
       
      
     </script>
          </html>
            
              
         <!-- VALIDATE -->
              


          <!-- UPDATE -->
 
   
