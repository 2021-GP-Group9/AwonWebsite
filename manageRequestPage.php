<?php 
//var_dump(password_hash("12345", PASSWORD_DEFAULT));

session_start();

	if(isset($_SESSION['role']))
	{
		if($_SESSION['role'] == 'admin') 
		{
		?>

<html lang="en">
    <head>
    <title>طلب إنضمام</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
    </head>
    <!-- Header with navigation bar -->
    <body>
        <!--
        style="padding:2em 4ems"
        -->
    <header>
    <div class="h1" style="padding:128px 16px"> 
    <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">
    </div>
    <nav class="topnav">
             <a id="cta" href="index.php">تسجيل خروج</a>
             <a href="joiningRequests.php">طلبات الإنضمام</a>
        </nav>
    
    </header>
        <div class="auth-content"> 
        <!-- we will bring it from the database -->
        <div id="requestTable">
        <?php
        // To verify the license number the admin visits the website
        echo "<a href =https://hrsd.gov.sa/ar/ngo-enquiry style='text-align:right;'target='_blank'>:للتحقق من رقم ترخيص وبيانات الجمعية</a>";
        echo "<p style='color: gray; text-align:right;'>يرجى إدخال رقم الترخيص باللغة الإنجليزية</p>";
        $connection = mysqli_connect("localhost", "root", "root", "awondb");
        $id=$_GET['id'];
        $sqli = "SELECT * FROM `charity_orgnization` WHERE ID= $id ";
                   $result = $connection->query($sqli);
                    while ($row = $result->fetch_assoc()) {
                        echo "<table id='manageJoiningRequest' class='requestTable'>";
                        echo "<tr>";
                        echo "<th>".$image='<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"width="50em"/>'."</td>";
                        echo "</th></tr><tr>";
                        // <!-- bring charity name from database  -->
                        echo "<th><p>".$row['name']."</p></th>";
                        echo "<th><p>:اسم المنظمة الخيرية</p>";
                        echo "</th>";
                        echo "<th><p>".$row['username']."</th>";
                        //<!-- bring charity username from database  -->
                        echo "<th><p>:اسم المستخدم</p>";
                        echo "</th>";
                        echo "</tr>";
                        echo "<tr>";
                        //<!-- bring charity liceane number from database  -->
                        echo "<th><p>".$row['license_Number']."</p></th>";
                        echo "<th><p>:رقم الترخيص</p>";
                        echo "</th>";
                        // <!-- bring charity email from database  -->
                        echo "<th><p>".$row['email']."</p></th>";
                        echo "<th><p>:البريد الإلكتروني</p>";
                        echo "</th>";
                        echo "</tr><tr>";
                        //<!-- bring charity type of donation number from database  -->
                        echo "<th><p>".$row['location']."</p></th>";
                        echo "<th><p>:الموقع</p>";
                        echo "</th>";
                        //<!-- bring charity phone number from database  -->
                        echo "<th><p>".$row['phone_number']."</p></th>";
                        echo" <th><p>:رقم الجوال</p></th></tr>";
                        echo "<tr>";
                        // <!-- bring charity PICKUP number from database  -->
                        echo "<th><p>".$row['pickup_servise']."</p></th>";
                        echo "<th><p>:توافر خدمة التوصيل</p>";
                        //<!-- bring charity description from database  -->
                        echo "<th><p>".$row['description']."</p></th>";
                        echo "<th><p>:وصف المنظمة الخيرية</p></th></th></tr>";
                        echo "<tr>";
                        //<!-- bring charity type of donation number from database  -->
                        echo "<th><p>".$row['description']."</p></th>";
                        echo "<th><p>:أنواع التبرعات التي تستقبلها المنظمة الخيرية</p></th></tr>";
                        echo "<br><br>";
                        echo "<tr>";
                        echo "<td> <br><br><input type='button' class='bu1' style='width: 100px;height:60px;' value='قبول' onclick=''><input type='button'style='width: 100px;height:60px;' class='bu1' value='رفض' onclick=''></td>'";
                        echo "</tr> </table>";
                    }
                     
                    ?>
            </div>
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
<?php	
		}
		
	}
	
?>