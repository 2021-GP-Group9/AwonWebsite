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
                            <h2>أدخل الرمز المرسل إليك عبر البريد الإلكتروني</h2>
                            <div class="dtr-form">
                                <form  id="contactform" method="post" action="">
                                    <fieldset>
                                        <div class="dtr-form-row dtr-form-row-2col">
                                            <p class="">
                                                <label style="font-family: Almarai;">الرمز</label>
                                                <input name="otp"  id="otp" class="name-input" type="text" placeholder="أدخل الرمز المرسل عبر البريد الإلكتروني">
                                            </p>

                                        </div><br>
                                        <p class="text-center">
                                            <button class="dtr-btn btn-blue" style="font-family: Almarai;" type="submit">التحقق</button>
                                        </p>
                                        <div id="result"></div>
                                    </fieldset>
                                </form>

                                <br>

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
                                    $token = $_POST['otp'];
                                    $sql = "select email from charity where token = '$token' ";
                                    //$result = $conn->query($sql);
                                    $result= mysqli_query($conn, $sql);
                                    $row = $result->fetch_assoc();
                                    if ($result->num_rows > 0) {

                                        $email_token= $row['email'];
                                        // if admin want to log in
                                        header('Location:confirm_password.php?email='.$email_token .'&token='.$token);
                                        exit();
                                    } else {

                                        $_SESSION['errorC'] = 'اسم المستخدم أو كلمة المرور غير صحيحة';

                                        echo "<span style='color:red;font-family: Almarai;'>" . 'انتهت صلاحية كلمة المرور لمرة واحدة' . "</span>";

                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=otp.php">';
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