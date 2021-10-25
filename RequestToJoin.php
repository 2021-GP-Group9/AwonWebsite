
<?php 


session_start();

	if(isset($_SESSION['role']))
	{
		if($_SESSION['role'] == 'admin') 
		{
			header('Location:joiningRequests.php');
		}
		
	}

	if(isset($_SESSION['role']))
	{
		if($_SESSION['role'] == 'charity') 
		{
			header('Location:CharityPage.php');
		}
		
	}
	
?>


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
                    
                <input type="text" name="name" id="name" class="name-input" placeholder="اسم المنظمة الخيرية" required> <br>
                <input type="text" name="username" id="username" class="name-input" placeholder="اسم المستخدم "required> <br>
                <input type="textarea" name="descrption" id="descrption" class="name-input"  rows="5" cols="20" placeholder="وصف المنظمة الخيرية"><br>
                <input type="email" name="email" id="email" class="name-input" placeholder="البريد الالكتروني "required><br>
                <input type="password" name="passwod" id="passwod" class="name-input" placeholder="كلمة المرور" required ><br>
                <input type="text" name="PhoneNumber" id="PhoneNumber" class="name-input" placeholder="رقم الجوال"required><br>  <br>
                
                    <label>هل تتوفر خدمة التوصيل ؟</label>
              <ol>
                  <il> <input id="yes" type="radio" name="service" id="serviceY" class="name-input"  value="yes" >نعم </il>
                  <il> <input id="no" type="radio" name="service" id="serviceN" class="name-input"  value="no">لا</il>
            </ol>
              <br>
               <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                <input type="checkbox" name="type[]" id="clothes" class="name-input" value ="ملابس">ملابس 
                <input type="checkbox" name="type[]" id="furniture" class="name-input" value="اثاث"> اثاث
                <input type="checkbox" name="type[]" id="electronic" class="name-input" value="الكترونيات"> الكترونيات
                <input type="checkbox" name="type[]" id="books" class="name-input" value="كتب_ورق"> كتب وورق
              
                <br><br> 
             
                <input type="text" name="location" id="location" class="name-input" placeholder="الموقع"required>
                <br>  <br> 
                
                <input type="text" name="LicenseNumber" id="LicenseNumber" class="name-input" placeholder="رقم الترخيص" required> <br> <br> 
                
                
                <input type="file" name="picture"> صورة الملف التعريفي<br> <br> 
        
                <button type="submit" name="submit" class="bu1" onclick="validate();return false;" >تسجيل</button>
                
                </fieldset>
        <?php 
						if(isset($_SESSION['faild']))
						{
							echo "<span style='color:red'>".$_SESSION['faild']."</span>";
						}
                                                $_SESSION['faild']=null;
	
					?>
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
                         // else {    echo 'success connect';}
             
            if($_SERVER['REQUEST_METHOD']=="POST"){ 
                
               $name = $_POST['name'];
               $username = $_POST['username'];
               $descrption = $_POST['descrption'];
               $email = $_POST['email'];
               $passwod = $_POST['passwod'];
               $passwod = PASSWORD_HASH($_POST["passwod"], PASSWORD_DEFAULT);
               $PhoneNumber =$_POST['PhoneNumber'];
               $option = $_POST['service'];
               $type = $_POST['type'];
               $servicetype="";
              
          for ($i=0; $i< sizeof ($type);$i++) {  
          $servicetype.=$type[$i].","; }
          
              $location =$_POST['location'];
              $LicenseNumber = $_POST['LicenseNumber'];
              $picture=$_POST['picture'];
                
              
                //cheack from email 
	$sql_chk_email= "select * from charity where email = '$email' ";
	
    $result = $conn->query($sql_chk_email);
              
                if($result->num_rows > 0)
    {
		$_SESSION['faild'] = 'This email is already exists in our website';
		header('Location:RequestToJoin.php');
	}
 else {
        
        $sql_chk_email= "select * from charity where phone = '$PhoneNumber' ";
	
    $result = $conn->query($sql_chk_email);
              
                if($result->num_rows > 0)
    {
		$_SESSION['faild'] = 'This phone number is already exists in our website';
		header('Location:RequestToJoin.php');
	}
                   
 
		
		$sql_chk_username= "select * from charity where username = '$username' ";
	
		$res = $conn->query($sql_chk_username);
		
		if($res->num_rows > 0)
		{
			$_SESSION['faild'] = 'This username is already exists in our website';
			header('Location:RequestToJoin.php');
		}
                
 else {
              $query = "INSERT INTO `charity`(name , username, descrption, email , pass , phone, service, donatoionType,location,LicenseNumber,picture,status) VALUES ('$name', '$username', '$descrption' ,'$email', '$passwod', '$PhoneNumber','$option','$servicetype','$location','$LicenseNumber','$picture','null')";
              $run = mysqli_query($conn, $query);
 }
                     
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
                
                <script>
                    
   function validate(form) {
  
     var phone = document.getElementById("PhoneNumber");
     var digit = /^\d{10}$/ ; //to ensure the phone# input allow only correct address
     //1-validate phone number
        var checkPhone = phone.value.match(digit); // must be numbers
        if (!checkPhone || phone.value.length <10 || phone.value.length >10)
        {
                   alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
                    phone.focus();
                    return false;}
                
        
      var Password = document.getElementById("passwod");
      var passworsChar  = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
      var cheackPass =Password.value.match(passworsChar); 
//2-validate password
if (Password.value == "") {
           alert( "من فضلك ادخل كلمة المرورة");
            Password.focus();
           return false; }
       
       if(Password.value.length < 8){
           
            alert( "كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
            Password.focus();
           return false; }
       
        if(!cheackPass){
        alert("password should contain atleast one number and one special character");
        return false;
    }     

     
          this.form.submit();
    }
    </script>
 