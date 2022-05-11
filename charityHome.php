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
    <link rel='stylesheet' href='design.css'>
    <link rel="stylesheet" href="DesignBootstrap.css">
</head>

<body>
    <div id="dtr-wrapper" class="clearfix">
        <!-- Header  -->

        <header id="dtr-header-global" class="">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form id="signout" action="logout.php" method="POST">
                            <input type="submit" class="logoutbtn" style="font-family: Almarai; float: left;" value="تسجيل خروج">
                        </form>
                    </div>
                     <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="get_paymentlist.php" style="font-family: Almarai;">قائمة التبرعات</a>
                                    </div>
                                </div>
                   
                    <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                            <a class="nav-link" href="charityChat.php" style="font-family: Almarai;">محادثات</a>
                        </div>
                    </div>
                    
                    <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                           
                            <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;">طلبات التبرع</a>
                        </div>
                    </div>
                    <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                           
                            <a class="nav-link" href="CharityPage.php?" style="font-family: Almarai;">المواعيد</a>
                           
                        </div>
                    </div>
                     <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                            <a class="nav-link" href="ProfilePage.php" style="font-family: Almarai;">الملف الشخصي</a>
                        </div>
                    </div>
             
                    <div class="col" align="right">
                        <div class="dtr-header-right">
                            <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                    alt="logo" width="108"></a>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- main content -->
        <div id="dtr-main-content">
            <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                <div class="container mt-100 mb-100">
                    <div class="row d-flex align-items-center">
                        <div class="col-1 col-md-3"></div>
                        <div class="col-10 col-md-6">
                            <div class="dtr-styled-" align="center">
                                <h2 style="float: right;">مرحبا </h2>
                                <?php
                                require('db_connecting.php');

                                $ID = $_SESSION['ID'];

                                $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";

                                $result = $conn->query($sqli);

                                while ($row = $result->fetch_assoc()) {
                                    echo "&nbsp;" . "<h3> <a style='font-size:30px; float:right;'>  {$row["name"]}</a></h3><br>";
                                   // echo '<img src="./image/' . $row['picture'] . '">';
                                   echo "<br><br>";
                                   echo "<h4>".$row['city']."</h4>";
                                   echo "<br>";
                                   echo "<h4>".$row['location']."</h4>";
                                   echo "<br>";
                                   echo "<h4>".$row['descrption']."</h4>";
                                   echo "<br>";
                                   echo "<h4>".$row['phone']."</h4>";
                                   echo "<br>";
                                   echo "<h4>".$row['email']."</h4>";
                                   echo "<br>";
                                   echo "<h4>".$row['licenseNumber']."</h4>";
                                   echo "<br>";
                                   echo "<h4>".$row['donationType']."</h4>";
                                   
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</body>
<!-- Footer -->
<footer id="dtr-footer">
    <div class="dtr-copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12" align="center">
                    <p style="font-family: Almarai;">&copy; فريق منصة عون</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

</html>