<!--  see comments in line 16 - 19 - 25 - 62 --> 
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

        <!-- navbar for charity should include 'تعديل الملف الشخصي' which is call ProfilePage.php --> 
        <nav class="topnav">
            <ul>
                <li><a href=".php"></a> </li>
            </ul>
        </nav>
        <!-- log out  as button -->
        <form id="signout" action="logout.php" method="POST">
            <input type="submit" value="تسجيل خروج">

        </form>
    </header>
</head>
<body>
    <!-- <form id="signout" action="logout.php" method="POST">
         <input type="submit" value="تسجيل خروج">
 
     </form> 
      <form id="profile" action="ProfilePage.php" method="POST">
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

            echo '<h1>مرحبا </h1>';
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

