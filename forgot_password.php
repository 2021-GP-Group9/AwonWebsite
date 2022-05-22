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
                            <h2>هل نسيت كلمة السر؟</h2>
                            <div class="dtr-form">
                                <form  id="contactform" method="post" action="">
                                    <fieldset>
                                        <div class="dtr-form-row dtr-form-row-2col">
                                            <p class="">
                                                <label style="font-family: Almarai;">البريد الإلكتروني</label>
                                                <input name="email"  id="email" class="name-input" type="text" placeholder="أدخل البريد الإلكتروني">
                                            </p>

                                        </div><br>
                                        <p class="text-center">
                                            <button class="dtr-btn btn-blue" style="font-family: Almarai;" type="submit">إعادة ضبط</button>
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
                                    $email = $_POST['email'];
                                    $sql = "select * from charity where email = '$email' ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        // if admin want to log in
                                        $row = mysqli_fetch_assoc($result);
                                        $six_digit_random_number = random_int(100000, 999999);
                                        $token_sql = "UPDATE charity SET token='$six_digit_random_number' WHERE email ='$email'";
                                        mysqli_query($conn, $token_sql);
                                        $to = $email;
                                        $subject = "طلب إعادة تعيين كلمة المرور";
                                        $message = "<p style='text-align: center;'>هل رمز إعادة تعيين كلمة المرور هو:$six_digit_random_number</p><br>" . "<p style='text-align: center;'>يمكنك الاستفسار من خلال الرسائل الخاصة" . "</p><a href='mailto:Awongp35@gmail.com' style='text-align: center;'>اضغط هنا للتواصل عبر البريد الإلكتروني</a>" . "<p style='text-align: center;'> فريق منصة عون </p>";
                                        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                                        mail($to, $subject, $message, $headers);

                                        header('Location:otp.php');
                                        exit();
                                    } else {

                                        $_SESSION['errorC'] = 'اسم المستخدم أو كلمة المرور غير صحيحة';

                                        echo "<span style='color:red;font-family: Almarai;'>" . 'هذا البريد الإلكتروني غير موجود' . "</span>";

                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=forgot_password.php">';
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