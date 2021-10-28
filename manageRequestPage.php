<!-- see comments in line 19 - 22 - 28 - 35 - 127 --><!-- comment -->
<?php
//var_dump(password_hash("12345", PASSWORD_DEFAULT));

session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        ?>

        <html lang="en">
            <head>
                <title>طلب إنضمام</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel='stylesheet' href='style.css'>
                <link rel="stylesheet" href="DesignPages.css">
            <header> 
                <!-- logo in the right -->
                <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

                <!-- navbar for charity should include 'طلبات الانضمام' which is call joiningRequests.php  --> 
                <nav class="topnav">
                    <ul>
                        <li><a href=".php"></a> </li>
                    </ul>
                </nav>
                <!-- log out  as button in the left-->
                <form id="signout" action="logout.php" method="POST">
                    <input type="submit" value="تسجيل خروج">

                </form>
            </header>
        </head>
        <!-- Header with navigation bar -->
        <body>
            <!--
            style="padding:2em 4ems"
            -->
            <!--  <header>
              <div class="h1" style="padding:128px 16px"> 
              <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">
              </div>
              <nav class="topnav">
                       <a id="cta" href="index.php">تسجيل خروج</a>
                       <a href="joiningRequests.php">طلبات الإنضمام</a>
                  </nav>
              
              </header> -->
            <div class="auth-content"> 
                <!-- we will bring it from the database -->
                <div id="requestTable">
                    <!-- design --> 
                    <?php
                    // To verify the license number the admin visits the website
                    echo "<p style='color: gray; text-align:center;'>يرجى إدخال رقم الترخيص باللغة الإنجليزية</p>";
                    echo "<a href =https://hrsd.gov.sa/ar/ngo-enquiry style='text-align:right;'target='_blank'>:للتحقق من رقم ترخيص وبيانات الجمعية</a>";
                    $connection = mysqli_connect("localhost", "root", "root", "awondb");
                    $id = $_GET['id'];
                    $sqli = "SELECT * FROM `charity` WHERE ID= $id ";
                    $result = $connection->query($sqli);
                    while ($row = $result->fetch_assoc()) {
                        echo "<table id='manageJoiningRequest' class='requestTable'>";
                        echo "<tr>";
                        echo "<th>" . $image = '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"width="50em"/>' . "</td>";
                        echo "</th></tr><tr>";
                        // <!-- bring charity name from database  -->
                        echo "<th><p>" . $row['name'] . "</p></th>";
                        echo "<th><p>:اسم المنظمة الخيرية</p>";
                        echo "</th>";
                        echo "<th><p>" . $row['username'] . "</th>";
                        //<!-- bring charity username from database  -->
                        echo "<th><p>:اسم المستخدم</p>";
                        echo "</th>";
                        echo "</tr>";
                        echo "<tr>";
                        //<!-- bring charity liceane number from database  -->
                        echo "<th><p>" . $row['LicenseNumber'] . "</p></th>";
                        echo "<th><p>:رقم الترخيص</p>";
                        echo "</th>";
                        // <!-- bring charity email from database  -->
                        echo "<th><p>" . $row['email'] . "</p></th>";
                        echo "<th><p>:البريد الإلكتروني</p>";
                        echo "</th>";
                        echo "</tr><tr>";
                        //<!-- bring charity type of donation number from database  -->
                        echo "<th><p>" . $row['location'] . "</p></th>";
                        echo "<th><p>:الموقع</p>";
                        echo "</th>";
                        //<!-- bring charity phone number from database  -->
                        echo "<th><p>" . $row['phone'] . "</p></th>";
                        echo" <th><p>:رقم الجوال</p></th></tr>";
                        echo "<tr>";
                        // <!-- bring charity PICKUP number from database  -->
                        echo "<th><p>" . $row['service'] . "</p></th>";
                        echo "<th><p>:توافر خدمة التوصيل</p>";
                        //<!-- bring charity description from database  -->
                        echo "<th><p>" . $row['descrption'] . "</p></th>";
                        echo "<th><p>:وصف المنظمة الخيرية</p></th></th></tr>";
                        echo "<tr>";
                        //<!-- bring charity type of donation number from database  -->
                        echo "<th><p>" . $row['donatoionType'] . "</p></th>";
                        echo "<th><p>:أنواع التبرعات التي تستقبلها المنظمة الخيرية</p></th></tr>";
                        echo "<br><br>";
                        echo "<tr>";
                        //<!-- bring charity status  from database  -->
                        echo "<th><p>" . $row['register_date'] . "</p></th>";
                        echo "<th><p>:وقت الإنضمام</p></th></tr>";
                        echo "<th><p>" . $row['status'] . "</p></th>";
                        echo "<th><p>:الحالة</p></th></tr>";
                        echo "<br><br>";
                        echo "<tr>";
                        echo "<td><button id='acc' class='bu1' style='width: 100px;height:60px;' onclick='accept({$row["ID"]})'>قبول</button>" . "<button id='rej' class='bu1'value={$row['ID']}  style='width: 100px;height:60px;' onclick='reject({$row["ID"]})'>رفض</button>";

                        //echo "<td><br><br><button class='bu1' style='width: 100px;height:60px;' onclick=';return false;' ><a href='accept.php?id={$row["ID"]}'>قبول</a></button>" . "<button class='bu1' style='width: 100px;height:60px;' onclick=';return false;'><a href='reject.php?id={$row["ID"]}'>رفض</a></button>";
                        // echo "<td> <br><br><input type='button' class='bu1' style='width: 100px;height:60px;' value='قبول' onclick=''><input type='button'style='width: 100px;height:60px;' class='bu1' value='رفض' onclick=''></td>'";
                        echo "</tr> </table>";
                    }
                    ?>
                </div> 
            </div>
        </body>
        <!-- Footer -->

        <!-- Footer -->
        <footer>
            <!-- we want footer with  <p>&copy; فريق منصة عون</p>  -->

            <p>&copy; فريق منصة عون</p>
        </footer>
        </html>
        <?php
    }
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