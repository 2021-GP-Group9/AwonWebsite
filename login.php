<!-- see comments in line 26 - 30 - 47 - 144 -->

<?php
session_start();
////var_dump(password_hash("12345A", PASSWORD_DEFAULT));

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location:joiningRequests.php');
    }
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        header('Location:CharityPage.php');
    }
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
            <div class="dtr-responsive-header">
                <div class="container"> 
                    <div class="dtr-header-left" style="float: left;"> 
                        <form id="signout" action="logout.php" method="POST">
                            <input type="submit" class="logoutbtn" value="تسجيل خروج">
                        </form>       
                    </div>
                    <!-- small devices logo --> 
                    <a href="index.php"><img src="finalLogo.jpeg"  class="m-logo" alt="logo"></a> 
                    <!-- small devices logo ends --> 
                </div>
            </div>
            <header id="dtr-header-global" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <form id="signout" action="logout.php" method="POST">
                                <input type="submit" class="logoutbtn" value="تسجيل خروج">
                            </form>  
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"  alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header
            
            <header id="headerPage" style="padding:28px 16px">
               <img src="logo.jpg" alt="logo" class="pageP"  >
        
            </header>
            -->

            <div id="dtr-main-content"> 

                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 

                        <!--===== row 1 starts =====-->
                        <div class="row d-flex align-items-center"> 
                            <!-- column 2 starts -->
                            <div class="col-1 col-md-3"></div> 
                            <div class="col-10 col-md-6"> 

                                <!-- heading starts -->
                                <div class="dtr-styled-" align="center">
                                    <h2>تسجيل الدخول</h2>
                                    <!-- form starts -->
                                    <div class="dtr-form">
                                        <form id="contactform" method="post" action="">
                                            <fieldset>
                                                <div class="dtr-form-row dtr-form-row-2col">
                                                    <p class="">
                                                        <label>اسم المستخدم</label>
                                                        <input name="username"  type="text" placeholder="اسم المستخدم">
                                                    </p>
                                                    <p class="">
                                                        <label>كلمة المرور</label>
                                                        <input name="pwd"  class="required" type="password" placeholder="كلمة المرور">
                                                    </p>
                                                </div><br>
                                                <p class="text-center">
                                                    <button class="dtr-btn btn-blue" type="submit">تسجيل الدخول</button>
                                                </p>
                                                <div id="result"></div>
                                            </fieldset>
                                        </form>

                                        <br>
                                        <p>جمعية جديدة؟ <a href="RequestToJoin.php">تسجيل جديد</a></p>
                                        <?php
                                        if (isset($_SESSION['errorC'])) {
                                            echo "<span style='color:red'>" . $_SESSION['errorC'] . "</span>";
                                        }
                                        $_SESSION['errorC'] = null;
                                        ?>


                                        <?php
                                        // put your code here
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            require('db_connecting.php');
                                            $username = $_POST['username'];
                                            $password = $_POST['pwd'];
                                            $sql = "select * from admin where username = '$username' ";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                                /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";
                                                //if(password_verify($password, $row['password'])){
                                                if (password_verify($password, $row['password'])) {
                                                    $_SESSION['ID'] = $row['ID'];
                                                    $_SESSION['role'] = 'admin';

                                                    echo '<META HTTP-EQUIV="Refresh" Content="1; URL=joiningRequests.php">';
                                                } else {
                                                    $_SESSION['errorC'] = 'UserName or password is not correct';
                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                                }
                                            } else {
                                                $_SESSION['errorC'] = 'UserName or password is not correct';
                                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                            }
                                        }
                                        ?>
                                        <!-- charity page code -->
                                        <?php
                                        // put your code here
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            require('db_connecting.php');
                                            $username = $_POST['username'];
                                            $password = $_POST['pwd'];

//        $sqli = "SELECT * FROM `charity` WHERE ID='$id' ";
//       $result = $connection->query($sqli);
// while ($row = $result->fetch_assoc()) {
//
//                         if($id=$row['id'] and $status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
//        
// }

                                            $sql_charity = "select * from charity where username = '$username' and `status`='Accepted'";
                                            $result = $conn->query($sql_charity);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);

                                                /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";
//		if ($status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
                                                //if(password_verify($password, $row['password'])){
                                                if (password_verify($password, $row['pass'])) {

                                                    $_SESSION['ID'] = $row['ID'];
                                                    $_SESSION['role'] = 'charity';
                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=CharityPage.php">';
//                        
                                                } else {
                                                    $_SESSION['errorC'] = 'UserName or password is not correct';
                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                                }
                                            } else {
                                                $_SESSION['errorC'] = 'اسم المستخدم غير صحيح أو الجمعية لم تقبل بعد';
                                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <!-- form ends --> 
                                </div>
                                <!-- heading ends --> 
                            </div>
                            <!-- column 2 ends --> 
                        </div>
                        <!--===== row 1 ends =====--> 
                    </div>
                </section>
                <!-- ----------------------------------------------------------------------------------------
                <div class="auth-content"> 
                <!-- design 
                <form id="loginForm" method="post" > 
                    <h2> <br>تسجيل الدخول</h2>
                    <br>
                    <br>
                    <label class="name"><h3>   <input type="text" name="username" id="username" class="name-input" required>اسم المستخدم </label> </h3><br><br>
                        <br>
                        <label class="name"><h3>   <input type="password" name="pwd" class="password" id="password">كلمة المرور </label></h3>
                            <br>
                            <input type="submit" class="bu1" value="تسجيل الدخول"/>
                            <br><br>
                            <p>جمعية جديدة? <a href ="RequestToJoin.php" > تسجيل جديد </a></p> --> 

                <?php
//                                if (isset($_SESSION['errorC'])) {
//                                    echo "<span style='color:red'>" . $_SESSION['errorC'] . "</span>";
//                                }
//                                $_SESSION['errorC'] = null;
                ?>
                <?php
                // put your code here
//                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                                    require('db_connecting.php');
//                                    $username = $_POST['username'];
//                                    $password = $_POST['pwd'];
//                                    $sql = "select * from admin where username = '$username' ";
//                                    $result = $conn->query($sql);
//                                    if ($result->num_rows > 0) {
//                                        $row = mysqli_fetch_assoc($result);
//                                        /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";
//                                        //if(password_verify($password, $row['password'])){
//                                        if (password_verify($password, $row['password'])) {
//                                            $_SESSION['ID'] = $row['ID'];
//                                            $_SESSION['role'] = 'admin';
//
//                                            echo '<META HTTP-EQUIV="Refresh" Content="1; URL=joiningRequests.php">';
//                                        } else {
//                                            $_SESSION['errorC'] = 'UserName or password is not correct';
//                                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
//                                        }
//                                    } else {
//                                        $_SESSION['errorC'] = 'UserName or password is not correct';
//                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
//                                    }
//                                }
                ?>
                <!-- charity page code -->
                <?php
                // put your code here
//                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                                    require('db_connecting.php');
//                                    $username = $_POST['username'];
//                                    $password = $_POST['pwd'];
//        $sqli = "SELECT * FROM `charity` WHERE ID='$id' ";
//       $result = $connection->query($sqli);
// while ($row = $result->fetch_assoc()) {
//
//                         if($id=$row['id'] and $status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
//        
// }
//
//                                    $sql_charity = "select * from charity where username = '$username' and `status`='Accepted'";
//                                    $result = $conn->query($sql_charity);
//                                    if ($result->num_rows > 0) {
//                                        $row = mysqli_fetch_assoc($result);
//
//                                        /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";
////		if ($status !='Accepted'){
////                             $_SESSION['errorC'] = 'the charity not Accepted yet';
////			header('Location:login.php');
////                         }
//                                        //if(password_verify($password, $row['password'])){
//                                        if (password_verify($password, $row['pass'])) {
//
//                                            $_SESSION['ID'] = $row['ID'];
//                                            $_SESSION['role'] = 'charity';
//                                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=CharityPage.php">';
////                        
//                                        } else {
//                                            $_SESSION['errorC'] = 'UserName or password is not correct';
//                                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
//                                        }
//                                    } else {
//                                        $_SESSION['errorC'] = 'Username not currect or the charity not accepted yet';
//                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
//                                    }
//                                }
                ?>
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
    <!-- Footer 
    <footer>
        <!-- we want footer with  <p>&copy; فريق منصة عون</p>  

        <p>&copy; فريق منصة عون</p>
    </footer>-->
</html>

