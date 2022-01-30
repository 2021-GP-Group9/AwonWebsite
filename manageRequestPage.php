<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        ?>

        <html lang="en">
            <head>
                <title>تفاصيل طلب الإنضمام</title>
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
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                                </div>
                            </div>
                        </div>
                    </header>

                    <!-- main content  -->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <div class="row d-flex align-items-center"> 
                                    <div class="col-1 col-md-2"> </div> 
                                    <div class="col-10 col-md-8"> 
                                        <!--// To verify the license number, the admin visits the website who verified by government-->
                                        <a href =https://hrsd.gov.sa/ar/ngo-enquiry style='text-align:center;float:right;font-family: Almarai;'target='_blank'>:للتحقق من رقم ترخيص وبيانات الجمعية</a>
                                        <p style='color:gray; text-align:center;font-family: Almarai;'>يرجى إدخال رقم الترخيص باللغة الإنجليزية</p>
                                        <?php
                                       require('db_connecting.php');
                                        $id = $_GET['id'];
                                        // Get each row data who is not accepted
                                        $sqli = "SELECT * FROM `charity` WHERE charityId= $id ";
                                        $result = $conn->query($sqli);
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<table width='100%' class='tab-requets'>";
                                            echo "<tr align='left' style='font-family: Almarai;'>";
                                            echo "<th>" . $image = '<img src="data:image/jpeg;base64, ' . base64_encode($row['picture']) . '"width="50em"/>' . "</th>";
                                            echo "<th></th></tr>";
                                            echo '</table>';
                                            echo '<table width="100%" class="tab-requets">';
                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td>:اسم المنظمة الخيرية</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['username'] . '</td>';
                                            echo '<td>:اسم المستخدم</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['licenseNumber'] . '</td>';
                                            echo '<td>:رقم الترخيص</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>:البريد الإلكتروني</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['location'] . '</td>';
                                            echo '<td>:الموقع</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['phone'] . '</td>';
                                            echo '<td>:رقم الجوال</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['service'] . '</td>';
                                            echo '<td>:توافر خدمة التوصيل</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['descrption'] . '</td>';
                                            echo '<td>:وصف المنظمة الخيرية</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['donationType'] . '</td>';
                                            echo '<td>:أنواع التبرعات التي تستقبلها المنظمة الخيرية</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['registerDate'] . '</td>';
                                            echo '<td>:وقت الإنضمام</td></tr>';

                                            echo '<tr align="right" style="font-family: Almarai;">';
                                            echo '<td>' . $row['status'] . '</td>';
                                            echo '<td>:الحالة</td></tr>';

                                            echo "<td><button id='acc' class='btn btn-success btn-xs' style='width:100px;height:60px;float:right;font-family: Almarai;' onclick='accept({$row["charityId"]})'>قبول </button>" .
                                                    "<button id='rej' class='btn btn-danger btn-xs'  style='width: 100px;height:60px;float:left;font-family: Almarai;'  onclick='reject({$row["charityId"]})'>رفض</button>";
                                            echo "</table>";
                                        }
                                    }
                                    ?>

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
            <?php
        }
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            function accept(id) {
                var charityID = $('#acc').val();
                var data = "ID=" + charityID;
                if (confirm('هل أنت متأكد من قبولك للجمعية؟')) {
                    $.ajax({
                        type: 'POST',
                        url: 'accept.php',
                        data: {ID: id},
                        success: function (data) {
                            alert("تم قبول الجمعية الخيرية");
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
            function reject(id) {
                var charityID = $('#rej').val();
                var data = "charityId=" + charityID;

        if (confirm('هل أنت متأكد من رفضك للجمعية؟')) {
                    $.ajax({
                        type: 'POST',
                        url: 'reject.php',
                        data: {charityId: id},
                        success: function (data) {
                            alert("تم رفض الجمعية الخيرية");
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