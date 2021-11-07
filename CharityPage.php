<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location:login.php');
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="design.css">
        <link rel="stylesheet" href="DesignBootstrap.css">
    </head>
    <body>
        <div id="dtr-wrapper" class="clearfix"> 

            <!-- Header 
        ============================================= -->
            <header id="dtr-header-global" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <form id="signout" action="logout.php" method="POST">
                                <input type="submit" class="logoutbtn" value="تسجيل خروج">
                            </form>  
                        </div>
                        <div class="col-sm-4" align="center"><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="charityHome.php" style="float: right;">الصفحة الرئيسية</a>
                                <a class="nav-link" href="ProfilePage.php">تعديل الملف الشخصي</a>
                            </div>
                        </div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header ends
        ================================================== --> 

            <!-- == main content area starts == -->
            <!--            <div id="dtr-main-content"> 
            
                            <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                                <div class="container mt-100 mb-100"> -->

            <!--===== row 1 starts =====-->
             <div  id="dtr-main-content"> 

                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                   

                        <!--===== row 1 starts =====-->
                        <div class="row d-flex align-items-center"> 
                            <!-- column 2 starts -->
                            <div class="col-1 col-md-3"></div> 
                            <div class="col-10 col-md-6"> 

                                <!-- heading starts -->
                                <div class="dtr-styled-" align="center">

                        <?php
                        require('db_connecting.php');

                        $ID = $_SESSION['ID'];

                        $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";

                        $result = $conn->query($sqli);

                        while ($row = $result->fetch_assoc()) {
                            // &nbsp; used for spaceing
                            //echo '<h1>مرحبا </h1>';
                            //echo "<h3> <a style='font-size:30px;'>{$row["name"]}</a></h3>";
                        }
                        ?> 
                        <?php include("calendar.php") ?>
                        <!-- form starts 
                        <H3>Aljawharahds Aljawharahds</H3>-->
                        <!-- form ends --> 
                    </div>
                    <!-- heading ends --> 
                </div>
                <!-- column 2 ends --> 
            </div>
            <!--===== row 1 ends =====--> 
       
    </section>
 </div>

    <!--    --------------------------------------------------------------- 
      <header> 
         logo in the right 
          <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

    <!-- navbar for charity should include 'تعديل الملف الشخصي' which is call ProfilePage.php 
    <nav class="topnav">
        <ul>
            <li><a href=".php">تعديل الملف الشخصي</a> </li>
        </ul>
    </nav>--> 
    <!-- log out  as button in the left
    <form id="signout" action="logout.php" method="POST">
        <input type="submit" value="تسجيل خروج">

    </form>
</header>
    -->
    <!-- <form id="signout" action="logout.php" method="POST">
         <input type="submit" value="تسجيل خروج">
 
     </form> 
      <form id="profile" action="ProfilePage.php" method="POST">
          <input type="submit" value="ملف التعريف الشخصي">
      </form> -->
  <!-- <img src="logo.jpg" alt="logo" class="pageP"  >
  </header> 
    <div class="auth-content"> -->
<?php
//                    require('db_connecting.php');
//
//                    $ID = $_SESSION['ID'];
//
//                    $sqli = "SELECT * FROM `charity` WHERE ID = '$ID'";
//
//                    $result = $conn->query($sqli);
//
//                    while ($row = $result->fetch_assoc()) {
//                        // &nbsp; used for spaceing
//
//                        echo '<h1>مرحبا </h1>';
//                        echo "<p> <a style='font-size:30px;'>{$row["name"]}</a></p>";
//                    }
?>      
    <!--     </div>
    Footer 
      <footer>
          <!-- we want footer with  <p>&copy; فريق منصة عون</p> 

          <p>&copy; فريق منصة عون</p>
      </footer>
    -->
    <footer id="dtr-footer"> 

        <!--== copyright starts ==-->
        <div class="dtr-copyright">
            <div class="container"> 
                <!--== row starts ==-->
                <div class="row"> 
                    <!-- column 1 starts -->
                    <div class="col-12 col-md-12" align="center">
                        <p>&copy; فريق منصة عون</p>
                    </div>
                </div>
                <!--== row ends ==--> 

            </div>
        </div>
        <!--== copyright ends ==--> 

    </footer>
    <!-- footer section ends
================================================== --> 

</div>
<!-- == main content area ends == --> 

</div>
<script src="design.js"></script> 
</body>


</html>

