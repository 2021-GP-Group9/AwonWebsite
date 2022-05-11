<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location:login.php');
}
?>
<!DOCTYPE html>
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
        
           <header id="dtr-header-global" class="">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form id="signout" action="logout.php" method="POST">
                            <input type="submit" class="logoutbtn" style="font-family: Almarai;" value="تسجيل خروج">
                        </form>
                    </div>
                    <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="charityChat.php" style="font-family: Almarai;" >محادثات</a>
                                    </div>
                                </div>
                    <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="get_paymentlist.php" style="font-family: Almarai;">قائمة التبرعات</a>
                                    </div>
                                </div>
                    <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                            <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;">طلبات التبرع</a>
                        </div>
                    </div>
                    <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                            <a class="nav-link" href="ProfilePage.php" style="font-family: Almarai;">الملف الشخصي</a>
                        </div>
                    </div>
                    <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                           
                            <a class="nav-link" href="charityHome.php" style="font-family: Almarai;">الرئيسية</a>
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
            <div  id="dtr-main-content"> 
                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="row d-flex align-items-center"> 
                        <div class="col-1 col-md-3"></div> 
                        <div class="col-10 col-md-6"> 
                            <div class="dtr-styled-" align="center">
                                <?php
                                require('db_connecting.php');

                                $ID = $_SESSION['ID'];

                                $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";

                                $result = $conn->query($sqli);

                                while ($row = $result->fetch_assoc()) {
                                    
                                }
                                ?> 
                                <?php include("calendar.php") ?>
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

