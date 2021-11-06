<?php
session_start();

// if the admin loggedin
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location:joiningRequests.php');
    }
}
//// if the Charity loggedin
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        header('Location:charityHome.php');
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

                    </div>

                    <a href="index.php"><img src="finalLogo.jpeg"  class="m-logo" alt="logo"></a> 

                </div>
            </div>
            <header id="dtr-header-global" class="">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-4"></div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"  alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>


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
                                    <h2>تسجيل الدخول</h2>
                                    <!-- form starts -->
                                    <div class="dtr-form">
                                        <form  id="contactform" method="post" action="">
                                            <fieldset>
                                                <div class="dtr-form-row dtr-form-row-2col">
                                                    <p class="">
                                                        <label>اسم المستخدم</label>
                                                        <input name="username"  id="username" class="name-input" type="text" placeholder="اسم المستخدم">
                                                    </p>
                                                    <p class="">
                                                        <label>كلمة المرور</label>
                                                        <input name="pwd"  class="required"  id="password" type="password" placeholder="كلمة المرور">
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
                                        
                                        // to show Error messages
                                        if (isset($_SESSION['errorC'])) {
                                           echo "<span style='color:red'>" . $_SESSION['errorC'] . "</span>";
                                        }
                                        $_SESSION['errorC'] = null;
                                        ?>


                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            require('db_connecting.php');
                                            $username = $_POST['username'];
                                            $password = $_POST['pwd'];
                                            $sql = "select * from admin where username = '$username' ";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // if admin want to log in
                                                $row = mysqli_fetch_assoc($result);

                                                if (password_verify($password, $row['password'])) {
                                                    //If login for the admin is successful ، password and usrname is correct
                                                    $_SESSION['ID'] = $row['ID'];
                                                    $_SESSION['role'] = 'admin';

                                                    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=joiningRequests.php">';
                                                } else {

                                                    //if password for admin not correct 
                                                    $_SESSION['errorC'] = 'اسم المستخدم أو كلمة المرور غير صحيحة';

                                                    echo "<span style='color:red'>" .'اسم المستخدم أو كلمة المرور غير صحيحة'. "</span>"; 

                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                                }
                                            } else {
                                                ?>
                                                <!-- login for charity -->
                                                <?php
                                                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                require('db_connecting.php');
                                                $username = $_POST['username'];
                                                $password = $_POST['pwd'];

                                                $sql_charity = "select * from charity where username = '$username' and `status`='Accepted'";
                                                $result = $conn->query($sql_charity);
                                                if ($result->num_rows > 0) {
                                                    $row = mysqli_fetch_assoc($result);


                                                    if (password_verify($password, $row['password'])) {
                                                        //If login is successful ، password and usrname is correct 

                                                        $_SESSION['ID'] = $row['charityId'];
                                                        $_SESSION['role'] = 'charity';
                                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=charityHome.php">';
                                                        //if password not correct 
                                                    } else {
                                                        $_SESSION['errorC'] = 'اسم المستخدم أو كلمة المرور غير صحيحة ';
                                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                                    }
                                                    // If the username does not exist or the charity has not yet been accepted
                                                } else {
                                                    $_SESSION['errorC'] = 'اسم المستخدم  غير صحيح أو الجمعية لم تقبل بعد  ';
                                                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                                                }
                                            }
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
                        <!-- row 1 ends --> 
                    </div>
                </section>

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
                            <!-- row ends --> 

                        </div>
                    </div>
                    <!-- copyright ends --> 

                </footer>
                <!-- footer section ends
        ================================================== --> 

            </div>
            <!-- == main content area ends == --> 

        </div>
    </body>


</html>

</html>
