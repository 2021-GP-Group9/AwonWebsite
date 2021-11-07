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
                        <div class="col-sm-4">
                            <form id="signout" action="logout.php" method="POST">
                                <input type="submit" class="logoutbtn" value="تسجيل خروج">
                            </form>  
                        </div>
                        <div class="col-sm-4" align="center"><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="ProfilePage.php" style="float: right;">تعديل الملف الشخصي</a>
                                <a class="nav-link" href="CharityPage.php?">المواعيد</a>
                            </div>
                        </div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- == main content area starts == -->

            <div  id="dtr-main-content"> 

                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 

                        <!--===== row 1 starts =====-->
                        <div class="row d-flex align-items-center"> 
                            <!-- column 2 starts -->
                            <div class="col-1 col-md-3"></div> 
                            <div class="col-10 col-md-6"> 

                                <!-- heading starts -->
                                <div class="dtr-styled-" align="center">
                                    <h2 style="float: right;">مرحبا </h2>
                                    <?php
                                    require('db_connecting.php');

                                    $ID = $_SESSION['ID'];

                                    $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";

                                    $result = $conn->query($sqli);

                                    while ($row = $result->fetch_assoc()) {

                                        // echo '<h1>مرحبا </h1>';
                                        echo "&nbsp;" . "<h3> <a style='font-size:30px; float:right;'>{$row["name"]}</a></h3><br>";
                                    }
                                    ?>  

                                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                <!-- form starts 
                                <H3>Aljawharahds Aljawharahds</H3>-->
                                <!-- form ends --> 
                            </div>  
                            <!-- heading ends --> 
                        </div>
                        <!-- column 2 ends --> 
                    </div>
                </section>              <!--===== row 1 ends =====--> 
            </div>



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
</body>


</html>
