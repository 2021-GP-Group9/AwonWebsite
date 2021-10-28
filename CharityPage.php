<?php
session_start();
//test21
if (!isset($_SESSION['role'])) {
    header('Location:login.php');
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css'>
        <link rel="stylesheet" href="DesignPages.css">
    <header> 
        <!-- logo in the right -->
        <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">
        <div style="float: right;">
            <!-- navbar for charity should include '' --> 
                    <nav class="topnav">
                        <ul>
                            <li><a href="charityPage.php">الصفحة الرئيسية</a> </li>
                            <li><a id='cta' href="ProfilePage.php">تسجيل خروج</a></li>
                            <li><a href="">test</a></li>
                        </ul>
                    </nav>
                </div>
    </header>
</head>
<body>
     <form id="signout" action="logout.php" method="POST">
        <input type="submit" value="تسجيل خروج">

    </form> 
   <!-- <form id="profile" action="ProfilePage.php" method="POST">
        <input type="submit" value="ملف التعريف الشخصي">
    </form> -->
<!-- <img src="logo.jpg" alt="logo" class="pageP"  >
</header> -->
    <div class="auth-content"> 
        <?php
        require('db_connecting.php');

        $ID = $_SESSION['ID'];

        $sqli = "SELECT * FROM `charity` WHERE ID = '$ID'";

        $result = $conn->query($sqli);

        while ($row = $result->fetch_assoc()) {
            // &nbsp; used for spaceing

            echo '<h1>Welcome :) </h1>';
            echo "<p> <a style='font-size:30px;'>{$row["name"]}</a></p>";
        }
        ?>      
    </div>
    <!-- Footer -->
    <footer>
        <!-- we want footer with  <p>&copy; فريق منصة عون</p>  -->
       
        <p>&copy; فريق منصة عون</p>
    </footer>



</body>


</html>

