

<?php 
	session_start();

	if(!isset($_SESSION['role']))
	{
		header('Location:login.php');
	}
	
?>


<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='style.css'>
<body>

    
    <form id="signout" action="logout.php" method="POST">
			<input type="submit" value="تسجيل خروج">
		</form> 
<img src="logo.jpg" alt="logo" class="pageP"  >
</header>
<div class="auth-content"> 
                    <?php

            $connection = mysqli_connect("localhost", "root", "root", "awondb");
            $sqli = "SELECT * FROM `charity_orgnization` ";
                    $result = $connection->query($sqli);
                    while ($row = $result->fetch_assoc()) {
                    // &nbsp; used for spaceing

                    







echo '<h1>Wlcame :) </h1>';
                    echo "<p> <a style='font-size:30px;'>{$row["name"]}</a></p>";
}
                    ?>      
   
  
                   <br>
                     <br>
                   

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
 <p>&copy; KSU|Desigend by Aljawharah, Lamya, Rahaf, Sahar and Leen</p>
</footer>



</body>


</html>
