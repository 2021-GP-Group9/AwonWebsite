<!--  see comments in line 24 - 27 - 33 - 114 --> <?php
session_start();
$ID = $_SESSION['ID'];
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "awondb";

$conn = mysqli_connect("$server", "$username", "$password", "$dbname");

$error = mysqli_connect_error();
if ($error != null) {
    echo "<p>Eror!! could not connect to DB may not connect </p>";
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

            <!-- preloader starts 
            <div class="dtr-preloader">
                <div class="dtr-preloader-inner">
                    <div class="dtr-preloader-img"></div>
                </div>
            </div>
            <!-- preloader ends ---->> 

            <!-- Small Devices Header 
        ============================================= -->
            <div class="dtr-responsive-header">
                <div class="container"> 

                    <div class="dtr-header-left" style="float: left;"> 
                        <form id="signout" action="logout.php" method="POST">
                            <input type="submit" class="logoutbtn" value="تسجيل خروج">
                        </form>       
                    </div>

                    <!-- small devices logo --> 
                    <a href="index.php"><img src="finalLogo.jpeg" class="m-logo" alt="logo"></a> 
                    <!-- small devices logo ends --> 
                </div>
            </div>
            <!-- Small Devices Header ends 
        ============================================= --> 

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
                                <a class="nav-link" href="CharityPage.php">الصفحة الرئيسية</a>
                            </div>
                        </div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>
            <div id="dtr-main-content"> 
                <?php
                if (isset($_POST["Edit"])) {
                    echo "<h1>تعديل بيانات الحساب</h1>";
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $passwod = PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT);
                    $email = $_POST['email'];
                    $PhoneNumber = $_POST['phone_number'];
                    $LicenseNumber = $_POST['license_Number'];
                    $location = $_POST['location'];
                    $description = $_POST['description'];
                    $option = $_POST['pickup_servise'];
                    $type = $_POST['types'];

                    $servicetype = implode(",", $type);




                    $picture = $_FILES['img']['name'];

                    $sql = "select * from charity where (username='$username' or email='$email' or phone='$PhoneNumber') AND ID<>$ID";

                    $res = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res) > 0) {


                        $row = mysqli_fetch_assoc($res);
                        if ($email == isset($row['email'])) {
                            echo "<h3 style='color:red; text-align:center'>email already exists</h3>";
                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                        }

                        if ($username == isset($row['username'])) {
                            echo "<h3 style='color:red; text-align:center'>username already exists</h3>";
                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                        }

                        if ($PhoneNumber == isset($row['PhoneNumber'])) {
                            echo "<h3 style='color:red; text-align:center'>phone number already exists</h3>";
                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                        }
                    } else {

                        ///die("Update query");
                        $query = "UPDATE charity SET name='" . $name . "', username='" . $username . "', pass='" . $passwod . "', email='" . $email . "',
                     phone='" . $PhoneNumber . "', LicenseNumber='" . $LicenseNumber . "', service='" . $option . "', donatoionType='" . $servicetype . "', location='" . $location . "', descrption='" . $description . "' WHERE ID='" . $ID . "'";
                        ///echo $query;

                        if ($conn->query($query) === TRUE) {
                            echo '<h1 style="color:green; text-align:center">تم الحفظ</h1>';
                            ?>
                            <META HTTP-EQUIV="Refresh" Content="3; URL=CharityPage.php">
                            <?php
                        } else {
                            echo "الرجاء اعادة المحاولة: ";
                        }
                    }
                }
                ?> 
<!--   <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
<div class="container mt-100 mb-100"> 

                <!--===== row 1 starts =====-
                <div class="row d-flex align-items-center"> 
                <!-- column 2 starts 
                <div class="col-1 col-md-2"></div> 
                <div class="col-12 col-md-8"> 

                <!-- heading starts 
                <div class="dtr-styled-" align="center">
                    <div class="dtr-styled-heading">
                <?php
//                                        if (isset($_POST["Edit"])) {
//                                            echo "  <h2>تعديل بيانات الحساب</h2><br>";
//                                            $name = $_POST['name'];
//                                            $username = $_POST['username'];
//                                            $passwod = PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT);
//                                            $email = $_POST['email'];
//                                            $PhoneNumber = $_POST['phone_number'];
//                                            $LicenseNumber = $_POST['license_Number'];
//                                            $location = $_POST['location'];
//                                            $description = $_POST['description'];
//                                            $option = $_POST['pickup_servise'];
//                                            $type = $_POST['types'];
//
//                                            $servicetype = implode(",", $type);
//                                            
//
//
//
//                                            $picture = $_FILES['img']['name'];
//
//                                            $sql = "select * from charity where (username='$username' or email='$email' or phone='$PhoneNumber') AND ID<>$ID";
//
//                                            $res = mysqli_query($conn, $sql);
//
//                                            if (mysqli_num_rows($res) > 0) {
//
//
//                                                $row = mysqli_fetch_assoc($res);
//                                                if ($email == isset($row['email'])) {
//                                                    echo "<h3 style='color:red; text-align:center'>email already exists</h3>";
//                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
//                                                }
//
//                                                if ($username == isset($row['username'])) {
//                                                    echo "<h3 style='color:red; text-align:center'>username already exists</h3>";
//                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
//                                                }
//
//                                                if ($PhoneNumber == isset($row['PhoneNumber'])) {
//                                                    echo "<h3 style='color:red; text-align:center'>phone number already exists</h3>";
//                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
//                                                }
//                                            } else {
//
//                                                ///die("Update query");
//                                                $query = "UPDATE charity SET name='" . $name . "', username='" . $username . "', pass='" . $passwod . "', email='" . $email . "',
//                     phone='" . $PhoneNumber . "', LicenseNumber='" . $LicenseNumber . "', service='" . $option . "', donatoionType='" . $servicetype . "', location='" . $location . "', descrption='" . $description . "' WHERE ID='" . $ID . "'";
//                                                ///echo $query;
//
//                                                if ($conn->query($query) === TRUE) {
//                                                    echo '<h2 class="c-g">تم الحفظ</h2>';
//                                                    
                ?>
                                    <META HTTP-EQUIV="Refresh" Content="3; URL=CharityPage.php">-->
                //<?php
//                                                } else {
//                                                    echo "الرجاء اعادة المحاولة: ";
//                                                }
//                                            }
//                                        }
                ?> 
                <!-- heading starts
                <div class="dtr-styled-heading">
                    <h2>تعديل بيانات الحساب</h2><br>
                    <br>
                    <h2 class="c-g">تم الحفظ</h2> -->
            </div>
            <!-- heading ends --> 


            <!-- form ends --> 
        </div>
        <!-- heading ends --> 
    </div>
    <!-- column 2 ends --> 
</div>
<!--===== row 1 ends =====--> 
</div>
</section>


<!--    -----------------------------------------------------------
<header> 
    logo in the right
    <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

<!-- navbar for charity should include 'الصفحة الرئيسية' which is call CharityPage.php 
<nav class="topnav">
    <ul>
        <li><a href=".php"></a> </li>
    </ul>
</nav> -->
<!-- log out  as button in the left
<form id="signout" action="logout.php" method="POST">
    <input type="submit" value="تسجيل خروج">

</form>
</header>-->
<!-- <header id="headerPage" style="padding:28px 16px">
         <form id="signout" action="logout.php" method="POST">
             <button type="submit" onclick="index();return false;">تسجيل الخروج</button>
         </form> 
         <img src="logo.jpg" alt="logo" class="pageP"  >
     </header

<div class="auth-content">
> -->
<?php
//                    if (isset($_POST["Edit"])) {
//                        echo "<h1>تعديل بيانات الحساب</h1>";
//                        $name = $_POST['name'];
//                        $username = $_POST['username'];
//                        $passwod = PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT);
//                        $email = $_POST['email'];
//                        $PhoneNumber = $_POST['phone_number'];
//                        $LicenseNumber = $_POST['license_Number'];
//                        $location = $_POST['location'];
//                        $description = $_POST['description'];
//                        $option = $_POST['pickup_servise'];
//                        $type = $_POST['types'];
//
//                        $servicetype = implode(",", $type);
//                        ;
//
//
//
//                        $picture = $_FILES['img']['name'];
//
//                        $sql = "select * from charity where (username='$username' or email='$email' or phone='$PhoneNumber') AND ID<>$ID";
//
//                        $res = mysqli_query($conn, $sql);
//
//                        if (mysqli_num_rows($res) > 0) {
//
//
//                            $row = mysqli_fetch_assoc($res);
//                            if ($email == isset($row['email'])) {
//                                echo "<h3 style='color:red; text-align:center'>email already exists</h3>";
//                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
//                            }
//
//                            if ($username == isset($row['username'])) {
//                                echo "<h3 style='color:red; text-align:center'>username already exists</h3>";
//                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
//                            }
//
//                            if ($PhoneNumber == isset($row['PhoneNumber'])) {
//                                echo "<h3 style='color:red; text-align:center'>phone number already exists</h3>";
//                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
//                            }
//                        } else {
//
//                            ///die("Update query");
//                            $query = "UPDATE charity SET name='" . $name . "', username='" . $username . "', pass='" . $passwod . "', email='" . $email . "',
//                     phone='" . $PhoneNumber . "', LicenseNumber='" . $LicenseNumber . "', service='" . $option . "', donatoionType='" . $servicetype . "', location='" . $location . "', descrption='" . $description . "' WHERE ID='" . $ID . "'";
//                            ///echo $query;
//
//                            if ($conn->query($query) === TRUE) {
//                                echo '<h1 style="color:green; text-align:center">تم الحفظ</h1>';
//                                
?>
<!--    <META HTTP-EQUIV="Refresh" Content="3; URL=CharityPage.php">-->
//<?php
//                            } else {
//                                echo "الرجاء اعادة المحاولة: ";
//                            }
//                        }
//                    }
?> 
<!--     </div>

    Footer                 <footer>
        <!-- we want footer with  <p>&copy; فريق منصة عون</p>  

        <p>&copy; فريق منصة عون</p>
    </footer>-->
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
<script src="design.js"></script> 
</html><!-- comment -->