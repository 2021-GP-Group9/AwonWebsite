<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $error = NULL;
        $color = null;
        require('db_connecting.php');
        if (isset($_POST["ema"])) {
            $color = $_POST['color'];
            $query = "insert into `donor` (`reason`) values('$color') WHERE donorId='" . $donorId . "'";
            if ($conn->query($query) === TRUE) {
                echo '<h1 style="color:green; text-align:center">تم الارسال</h1>';
                ?>
                <META HTTP-EQUIV="Refresh" Content="2; URL=manageAccounts.php">
                <?php
            } else {
                echo "الرجاء اعادة المحاولة ";
            }
        }
        $options = array(
            'شكوى صادرة من متبرع',
            'شكوى صادرة من جمعية خيرية',
            'تجاوزات في المحادثة',
            'مصلحة عامة',
            'مخالفة شروط التطبيق',
            'آخرى',
        );
        ?>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no">
                <link rel='stylesheet' href='design.css'>
                <link rel="stylesheet" href="DesignBootstrap.css">
                <title>إدارة حسابات المستخدمين</title>
            </head>  
            <body>
                <div id="dtr-wrapper" class="clearfix"> 

                    <header id="dtr-header-global" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <form id="signout" action="logout.php" method="POST">
                                        <input type="submit" class="logoutbtn" style="font-family: Almarai;" value="تسجيل خروج">
                                    </form>  
                                </div>
                                <div class="col-sm-4" align="center"><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="joiningRequests.php" style="font-family: Almarai;">طلبات الإنضمام</a>
                                    </div>
                                </div>
                                <div class="col-sm-4" align="right">
                                    <div class="dtr-header-right"> 
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"  alt="logo" width="108"></a></div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!--main content -->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <div class="row d-flex align-items-center"> 
                                    <div class="col-1 col-md-2"></div> 
                                    <div class="col-12 col-md-8"> 
                                        <div class="dtr-styled-" align="center">
                                            <form method="POST">
                                                <h6><lable>ادخل البريد الإلكتروني الذي ترغب بالبحث عنه</lable></h6>
                                                <input type="text" name="search" value="">
                                                <h6 class="text-center">
                                                    <button class="dtr-btn btn-blue" type="submit" name="hitsearch"
                                                            >بحث</button> </h6>
                                            </form>
                                            <table width="100%" class="tab-requets">
                                                <?php
                                                if (isset($_POST['hitsearch'])) {
                                                    // Get donor info based on donor email
                                                    $str = $_POST['search'];
                                                    $sqli = "SELECT * FROM `donor` WHERE donorEmail='$str'";
                                                    $result = $conn->query($sqli);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $donorId = $row['donorId'];
                                                            $donorEmail = $row['donorEmail'];
                                                            $mess = "";
                                                            ?> <tr align="right" style="font-family: Almarai;">
                                                                <th>الحالة</th>
                                                                <th>البريد الإلكتروني</th>
                                                                <th>رقم هاتف المتبرع</th>
                                                                <th>اسم المتبرع</th>
                                                            </tr>
                                                            <tr align="right" style="font-family: Almarai;">
                                                                <?php
                                                                echo " <td>";
                                                                if ($row['suspend'] == "unsuspend") {
                                                                    echo "فعال";
                                                                } else {
                                                                    echo "معلق";
                                                                }"</td>";
                                                                echo "<td>" . $row['donorEmail'] . "</td>";
                                                                echo "<td>" . $row['donorPhone'] . "</td>";
                                                                echo "<td>" . $row['donorName'] . "</td>";
                                                                echo" </tr>";
                                                                echo "</table><br>";

                                                                echo '<form method="POST">';
                                                                echo"<h6>" . "<label>سبب تعليق/عدم تعليق الحساب" . "</label>" . "</h6>";
                                                                ?> <p class="dtr-form-column">
                                                                <label for="color">السبب</label>
                                                                <?php
                                                                echo "<select name='color' title='يجب اختيار سبب''required>";
                                                                foreach ($options as $option) {
                                                                    echo "<option selected='selected' value='$option'>$option</option>";
                                                                }
                                                                echo "</select>";
                                                                ?> 
                                                            </p></form>

                                                            <?php
                                                            echo"<br><h6 class='text-center'>"
                                                            //<button class="dtr-btn btn-blue" type="submit" name="hitsearch"
                                                            // >بحث</button>
                                                            . "<a href='suspendEmail.php?id={$row['donorId']}' class='btn btn-success btn-xs' name='ema' style='font-family: Almarai;'>ارسل ايميل</a>";

                                                            if ($row['suspend'] == "unsuspend") {
                                                                $sql = "UPDATE donor SET suspend='suspend' WHERE donorId ='$id'";
                                                            } else {
                                                                $sql = "UPDATE donor SET suspend='unsuspend' WHERE donorId ='$id'";
                                                            }
                                                            $result = mysqli_query($conn, $sql);
                                                        }
                                                    } else {
                                                        echo '<h3>لايوجد متبرع بهذا الإيميل المدخل</h3>';
                                                    }
                                                } echo '</table>';
                                                ?>

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

        <?php
    }
}
?>

</html>

