<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $error = NULL;
        $color = null;
        require('db_connecting.php');
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
                                                    <br><button class="dtr-btn btn-blue" type="submit" name="hitsearch"
                                                                >بحث</button> </h6>
                                            </form>
                                            <br><br>
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
                                                                echo"<br><h6 class='text-center'>";
                                                                if ($row['suspend'] == "unsuspend") {
                                                                    echo "<button id='sus' class='btn btn-danger btn-xs' value=$donorId onclick='sus($donorId)' style='font-family: Almarai;'>تعليق</button>";
                                                                } else {
                                                                    echo "<button id='unsus' class='btn btn-success btn-xs' value=$donorId onclick='unsus($donorId)' style='font-family: Almarai;'>تفعيل</button>";
                                                                }
//"<button id='sus' class='btn btn-success btn-xs' onclick='sus({$row["donorId"]})'>تعليق</button>"
//"<button id='unsus' class='btn btn-success btn-xs' onclick='unsus({$row["donorId"]})'>تفعيل</button>"
                                                            }
                                                        } else {
                                                            $sqli1 = "SELECT * FROM `charity` WHERE email='$str'";
                                                            $result1 = $conn->query($sqli1);
                                                            if ($result1->num_rows > 0) {
                                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                    $charityId = $row1['charityId'];
                                                                    ?> <tr align="right" style="font-family: Almarai;">
                                                                    <th>الحالة</th>
                                                                    <th>البريد الإلكتروني</th>
                                                                    <th>رقم هاتف الجمعية</th>
                                                                    <th>اسم الجمعية</th>
                                                                </tr>
                                                                <tr align="right" style="font-family: Almarai;">
                                                                    <?php
                                                                    echo " <td>";
                                                                    if ($row1['suspend'] == "unsuspend") {
                                                                        echo "فعال";
                                                                    } else {
                                                                        echo "معلق";
                                                                    }"</td>";
                                                                    echo "<td>" . $row1['email'] . "</td>";
                                                                    echo "<td>" . $row1['phone'] . "</td>";
                                                                    echo "<td>" . $row1['name'] . "</td>";
                                                                    echo" </tr>";
                                                                    echo "</table><br>";
                                                                    echo"<br><h6 class='text-center'>";
                                                                    if ($row1['suspend'] == "unsuspend") {
                                                                        echo "<button id='sus' class='btn btn-danger btn-xs'  onclick='susC({$row1['charityId']})' style='font-family: Almarai;'>تعليق</button>";
                                                                    } else {
                                                                        echo "<button id='unsus' class='btn btn-success btn-xs'  onclick='unsusC({$row1['charityId']}' style='font-family: Almarai;'>تفعيل</button>";
                                                                    }
                                                                }  
                                                            }else{
                                                                    echo '<h3>لايوجد متبرع أو جمعية بهذا الإيميل المدخل</h3>';
                                                                
                                                            }
                                                        }
                                                        
                                                            }
                                                        echo '</table>';
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
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                            <script>
                                function sus(id) {
                                    var donorId = $('#sus').val();
                                    var data = "ID=" + donorId;
                                    if (confirm('هل أنت متأكد من تعليق الوصول لهذا الحساب ؟')) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'suspendEmailDonor.php',
                                            data: {ID: id},
                                            success: function (data) {
                                                alert("تم تعليق الحساب وإرسال إيميل");
                                                window.location = 'joiningRequests.php';
                                            }
                                            , error: function (data) {
                                                alert("حدث خطأ أعد المحاولة");
                                                window.location = 'joiningRequests.php';
                                            }
                                        });
                                    }
                                }

                            </script>
                            <script>
                                function unsus(id) {
                                    var donorId = $('#unsus').val();
                                    var data = "ID=" + donorId;
                                    if (confirm('هل أنت متأكد من تفعيل الوصول لهذا الحساب ؟')) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'suspendEmailDonor.php',
                                            data: {ID: id},
                                            success: function (data) {
                                                alert("تم تفعيل الحساب وإرسال إيميل");
                                                window.location = 'joiningRequests.php';
                                            }
                                            , error: function (data) {
                                                alert("حدث خطأ أعد المحاولة");
                                                window.location = 'joiningRequests.php';
                                            }
                                        });
                                    }
                                }

                            </script>
                            <script>
                                function susC(id) {
                                    var charityId = $('#sus').val();
                                    var data = "ID=" + charityId;
                                    if (confirm('هل أنت متأكد من تعليق الوصول لهذا الحساب ؟')) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'suspendEmailCharity.php',
                                            data: {ID: id},
                                            success: function (data) {
                                                alert("تم تعليق الحساب وإرسال إيميل");
                                                window.location = 'joiningRequests.php';
                                            }
                                            , error: function (data) {
                                                alert("حدث خطأ أعد المحاولة");
                                                window.location = 'joiningRequests.php';
                                            }
                                        });
                                    }
                                }

                            </script>
                            <script>
                                function unsusC(id) {
                                    var charityId = $('#unsus').val();
                                    var data = "ID=" + charityId;
                                    if (confirm('هل أنت متأكد من تفعيل الوصول لهذا الحساب ؟')) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'suspendEmailCharity.php',
                                            data: {ID: id},
                                            success: function (data) {
                                                alert("تم تفعيل الحساب وإرسال إيميل");
                                                window.location = 'joiningRequests.php';
                                            }
                                            , error: function (data) {
                                                alert("حدث خطأ أعد المحاولة");
                                                window.location = 'joiningRequests.php';
                                            }
                                        });
                                    }
                                }

                            </script>
                            </html>

