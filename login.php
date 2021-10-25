
<?php 
//var_dump(password_hash("12345A", PASSWORD_DEFAULT));

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

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='style.css'>
<!-- Header -->

<header id="headerPage" style="padding:28px 16px">
   <img src="logo.jpg" alt="logo" class="pageP"  >
   
  
   
  
</header>








   <div class="auth-content"> 
       
       
       <form id="loginForm" method="post" > 
      
     
      <h2> <br>تسجيل الدخول</h2>
                   <br>
                     <br>


                   <label class="name"><h3> <input type="text" name="username" id="username" class="name-input" required>اسم المستخدم:</label> </h3><br><br>
                    <br>

                    
                  
                    <label class="name"><h3><input type="password" name="pwd" class="password" id="password">كلمة المرور: </label></h3>
                    <br>
                
                    <input type="submit" class="bu1" value="تسجيل الدخول"/>
                    <br><br>
                    
                  <p>جمعية جديدة? <a href ="RequestToJoin.php" > تسجيل جديد </a></p> 
                  
                  <?php 
                  
   
	if(isset($_SESSION['errorC']))
	{
	echo "<span style='color:red'>".$_SESSION['errorC']."</span>";
	}
	$_SESSION['errorC']=null;
	?>
                  
                  
 <?php
       
                // put your code here
        if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('db_connecting.php');
         
	
	$username = $_POST['username'];
	$password   = $_POST['pwd'];
    
	
	$sql= "select * from admin where username = '$username' ";
	
    $result = $conn->query($sql);
    
	
    if($result->num_rows > 0)
    {
		$row = mysqli_fetch_assoc($result);
                
              /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";

		
		//if(password_verify($password, $row['password'])){
		if(password_verify($password, $row['password'])){
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['role'] = 'admin';
			header('Location:joiningRequests.php');
		}else{   
			$_SESSION['errorC'] = 'UserName or password is not correct';
			header('Location:login.php');
		}
		
		
		 
	}
	else{
		$_SESSION['errorC'] = 'UserName or password is not correct';
		header('Location:login.php');
	}
        
 	
}

       ?>



       <!-- charity page code -->

<?php
       
                // put your code here
        if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('db_connecting.php');
         
	
	$username = $_POST['username'];
	$password   = $_POST['pwd'];
        $status = $_GET['status']; 
	    $id = $_GET['id'];
            
            
                
//        $sqli = "SELECT * FROM `charity` WHERE ID='$id' ";
//       $result = $connection->query($sqli);
// while ($row = $result->fetch_assoc()) {
//
//                         if($id=$row['id'] and $status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
//        
// }
            
	$sql_charity= "select * from charity where username = '$username' and `status`='Accepted'";
	
    $result = $conn->query($sql_charity);
    
	
    if($result->num_rows > 0)
    {
		$row = mysqli_fetch_assoc($result);
                
              /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";

//		if ($status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
		//if(password_verify($password, $row['password'])){
		if(password_verify($password, $row['pass'])){
                       
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['role'] = 'charity';
			header('Location:CharityPage.php');
                        
//                        
                    
		}else{   
			$_SESSION['errorC'] = 'اسم المستخدم أو كلمة المرور غير صحيحة';
			header('Location:login.php');
		}
                      
		 
	}
  
	else{
		$_SESSION['errorC'] = 'هذه الجمعية لم تقبل بعد أو اسم المستخدم غير صحيح';
		header('Location:login.php');
	}
        
     
  
 	
}

       ?>

                  
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
</html>

