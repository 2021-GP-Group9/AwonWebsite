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
<!DOCTYPE html>
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
            <header id="dtr-header-global" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>            <!-- main content -->
            <div  id="dtr-main-content"> 
                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 
                        <div class="row d-flex align-items-center"> 
                            <div class="col-1 col-md-3"></div> 
                            <div class="col-10 col-md-6"> 
                                <div class="dtr-styled-" align="center">
                                    <h2>تسجيل الدخول</h2>
                                    <div class="dtr-form">
                                        <form  id="contactform" method="post" action="">
                                            <fieldset>
                                                <div class="dtr-form-row dtr-form-row-2col">
                                                    <p class="">
                                                        <label style="font-family: Almarai;">اسم المستخدم</label>
                                                        <input name="username"  id="username" class="name-input" type="text" placeholder="اسم المستخدم">
                                                    </p>
                                                    <p class="">
                                                        <label style="font-family: Almarai;">كلمة المرور</label>
                                                        <input name="pwd"  class="required"  id="password" type="password" placeholder="كلمة المرور">
                                                    </p>
                                                </div><br>
                                                <p class="text-center">
                                                    <button class="dtr-btn btn-blue" style="font-family: Almarai;" type="submit">تسجيل الدخول</button>
                                                </p>
                                                <div id="result"></div>
                                            </fieldset>
                                        </form>

                                        <br>
                                        <p style="font-family: Almarai;">جمعية جديدة؟ <a href="RequestToJoin.php" style="font-family: Almarai;">تسجيل جديد</a></p>
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

                                                    echo "<span style='color:red;font-family: Almarai;'>" . 'اسم المستخدم أو كلمة المرور غير صحيحة' . "</span>";

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

                                </div>

                            </div>

                        </div>

                    </div>
                </section>
                </body>
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

