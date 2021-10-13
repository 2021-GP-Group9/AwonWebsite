<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='style.css'>

<body>



<!-- Header -->

<header id="headerHome"  style="padding:128px 16px">
   <img src="logo.jpg" alt="logo" class="homeP"  >
   
  
   <i id="bu"> <button class="bu1" onclick="login();return false;">تسجيل دخول </button> <button class="bu1"  onclick="signUp();return false;">طلب الإنضمام</button></i>
  
    
</header>

<!-- First Grid -->
<div class="who">
      <h1>من نحن</h1>
       <br
      <h5 class="who">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>
<br>
      
      
      
      
    </div>

   



<!-- Footer -->
<footer class="footer">  
 <div class="SOCIAL">
                    <br>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
 <p>&copy; KSU|Desigend by Aljawharah , Lamya , Rahaf,Sahar and leen</p>
</footer>



</body>

<script>
 
        function login(){
            window.location = "login.php";
        }
        function signUp(){
            window.location = "SignUp.php";
        }
        
        </script>
</html>

