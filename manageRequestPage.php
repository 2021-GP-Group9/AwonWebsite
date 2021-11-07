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
                    <!-- Header -->
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
                                        <a class="nav-link" href="joiningRequests.php">طلبات الإنضمام</a>
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
                    <div id="dtr-main-content"> 

                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 

                                <!--===== row 1 starts =====-->
                                <div class="row d-flex align-items-center"> 
                                    <!-- column 2 starts -->
                                    <div class="col-1 col-md-2">

                                    </div> 
                                    <div class="col-10 col-md-8"> <!--// To verify the license number the admin visits the website-->
                                        <a href =https://hrsd.gov.sa/ar/ngo-enquiry style='text-align:center;float:right;'target='_blank'>:للتحقق من رقم ترخيص وبيانات الجمعية</a>
                                        <p style='color:gray; text-align:center;'>يرجى إدخال رقم الترخيص باللغة الإنجليزية</p>


                                        <?php
                                        $connection = mysqli_connect("localhost", "root", "root", "awondb");
                                        $id = $_GET['id'];
                                        $sqli = "SELECT * FROM `charity` WHERE charityId= $id ";
                                        $result = $connection->query($sqli);
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<table width='100%' class='tab-requets'>";
                                            echo "<tr align='left'>";
                                            echo "<th>" . $image = '<img src="data:image/jpeg;base64, ' . base64_encode($row['picture']) . '"width="50em"/>' . "</th>";
                                            echo "<th></th></tr>";
                                            echo '</table>';
                                            echo '<table width="100%" class="tab-requets">';
                                            echo '<tr align="right">';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td>:اسم المنظمة الخيرية</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['username'] . '</td>';
                                            echo '<td>:اسم المستخدم</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['licenseNumber'] . '</td>';
                                            echo '<td>:رقم الترخيص</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['email'] . '</td>';
                                            echo '<td>:البريد الإلكتروني</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['location'] . '</td>';
                                            echo '<td>:الموقع</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['phone'] . '</td>';
                                            echo '<td>:رقم الجوال</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['service'] . '</td>';
                                            echo '<td>:توافر خدمة التوصيل</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['descrption'] . '</td>';
                                            echo '<td>:وصف المنظمة الخيرية</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['donatoionType'] . '</td>';
                                            echo '<td>:أنواع التبرعات التي تستقبلها المنظمة الخيرية</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['registerDate'] . '</td>';
                                            echo '<td>:وقت الإنضمام</td></tr>';

                                            echo '<tr align="right">';
                                            echo '<td>' . $row['status'] . '</td>';
                                            echo '<td>:الحالة</td></tr>';

                                            echo "<td><button id='acc' class='btn btn-success btn-xs' style='width:100px;height:60px;float:right;' onclick='accept({$row["charityId"]})'>قبول </button>" . "<button id='rej' class='btn btn-danger btn-xs' value={$row['charityId']}  style='width: 100px;height:60px;float:left;' onclick='reject({$row["charityId"]})'>رفض</button>";
                                            echo "</table>";
                                        }
                                    }
                                    ?>

                                    <!-- heading ends --> 
                                </div>
                                <!-- column 2 ends --> 
                            </div>
                            <!--===== row 1 ends =====--> 
                        </div>
                    </section>
                </div>
            </div> 
        </div>
    </body>

    <!-- Footer -->
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
    <?php
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="design.js"></script>
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
        if (confirm('هل أنت متأكد من رفضك للجمعية؟')) {
            $.ajax({
                type: 'POST',
                url: 'reject.php',
                data: {ID: id},
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