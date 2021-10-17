<?php 
	session_start();

	if(!isset($_SESSION['role']))
	{
		header('Location:login.php');
	}
	
?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>manage joining request</title>
    </head> 
    <header id="headerPage" style="padding:28px 16px">
        <form id="signout" action="logout.php" method="POST">
	<input type="submit" value="تسجيل خروج">
	</form> 
    <img src="logo.jpg" alt="logo" class="pageP">
    </header>
    <body data-new-gr-c-s-loaded="9.38.0">
    <div class="auth-content"> 
        <h1>طلبات الاضافة</h1>      
            <?php
            $connection = mysqli_connect("localhost", "root", "root", "awondb");
            $sqli = "SELECT * FROM `charity_orgnization` ";
                    $result = $connection->query($sqli);
                    echo '<table id="manageJoiningRequest">';
                    echo '<tbody><tr>';
                    echo'<th>قبول / رفض</th>';
                    echo '<th>الجمعية الخيرية</th>';
                    echo '</tr>';                    
                    while ($row = $result->fetch_assoc()) {
                    echo'<tr>';
                    // &nbsp; used for spaceing
                    echo "<td><button class='bu1' style='width: 100px;height:60px;' onclick=';return false;'>قبول</button>"."<button class='bu1' style='width: 100px;height:60px;' onclick=';return false;'>رفض</button>";
                    echo "<td>"."<a href='manageRequestPage.php?id={$row["ID"]}'>{$row["name"]}</a>"."&nbsp;&nbsp;&nbsp;&nbsp;".$image='<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"width="50em"/>'."</td>";
                    echo "</tr>";
                    }
                    echo "</tbody></table>";
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


<!--INSERT INTO charity_orgnization(`ID`,`name`,`username`,`email`,`phone_number`,`license_Number`,`location`,`pickup_servise`,`type_of_donation`,`photo`,`password`,`description`) VALUES ('1234','سحر','sand','itsaharcs@gmail.com','555555555','12345','Riyadh','1','clothes','','1212','سحر هي منظمة') -->   
</html>
