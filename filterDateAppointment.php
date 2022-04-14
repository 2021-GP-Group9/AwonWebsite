<?php
session_start();
$ID = $_SESSION['ID'];
if (!isset($_SESSION['role'])) {
    header('Location:login.php');
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel='stylesheet' href='design.css'>
        <link rel="stylesheet" href="DesignBootstrap.css">
        <script src="jquery.js"></script>
    </head>
    <body>
        <div id="dtr-wrapper" class="clearfix"> 

            <header id="dtr-header-global" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <form id="signout" action="logout.php" method="POST">
                                <input type="submit" class="logoutbtn"style="font-family: Almarai;" value="تسجيل خروج">
                            </form>
                        </div>
                        <div class="col" ><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="ProfilePage.php" style="font-family: Almarai;">الملف الشخصي</a>
                            </div>
                        </div>
                        <div class="col" ><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;">طلبات التبرع</a>
                            </div>
                        </div>

                        <div class="col" ><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="CharityPage.php" style="font-family: Almarai;">المواعيد</a>
                            </div>
                        </div>
                        <div class="col" ><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="charityHome.php" style="font-family: Almarai;">الصفحة الرئيسية</a>
                            </div>
                        </div>
                        <div class="col-sm-2" align="right">
                            <div class="dtr-header-right">
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                                                                              alt="logo" width="108"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </header>

            <div id="dtr-main-content"> 
                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 
                        <div class="row d-flex align-items-center"> 
                            <div class="col-1 col-md-3"> 
                                <div class="col-10 col-md-6" > </div>
                                <div class="dtr-styled-" align="center" style="width: 1200px;">
                                    <?php
                                    require('db_connecting.php');
                                    ?> 
                                    <!-- EDIT FORM -->
                                    <hr>
                                    <?php
                                    if (isset($_GET['q']) AND $_GET['q'] == "edit") {
                                        $appointment_id = $_GET['appointment_id'];
                                        $current_date = $_GET['date'];
                                        $current_time = $_GET['time'];
                                        ?>
                                        <div class="row">
                                            <div class="container">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <div class="well">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label>التاريخ</label>
                                                                <input type="date" name="date" class="form-control" value="<?php echo $_GET['date'] ?>" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>حدد الوقت</label>
                                                                <input type="time" class="form-control" name="time" required value="<?php echo $current_time ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" name="edit_submit" class="btn btn-primary">حفظ الموعد</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                    <?php } ?>       <!-- UPDATE THE DATABASE -->
                                    <?php
                                    if (isset($_POST['edit_submit'])) {
                                        $appointment_id = $_GET['appointment_id'];
                                        $ID = $_SESSION['ID'];
                                        $date = $_POST['date'];
                                        $time = $_POST['time'];

                                        $sqli = "SELECT * FROM appointment WHERE charityId = '$ID' AND appointmentDate='$date' AND appointmentTime='$time'";
                                        $result = $conn->query($sqli);
                                        $no = $result->num_rows;

                                        if ($no == 0) {
                                            $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";
                                            $result = $conn->query($sqli);
                                            $row = $result->fetch_assoc();
                                            $status = $row['suspend'];
                                            if ($status == 'suspend') {
                                                echo"<h3 style='color:red; text-align:center'> تم إيقاف الحساب تواصل مع المشرف</h3>";
                                                echo '<META HTTP-EQUIV="Refresh" Content="3; URL=charityHome.php">';
                                            } else {
                                                $sqli2 = "UPDATE appointment SET appointmentDate='$date', appointmentTime='$time' WHERE appointmentId=$appointment_id";
                                                $result2 = $conn->query($sqli2);
                                                if ($result2) {
                                                    echo '<h1 style="color:green; text-align:center">تم تعديل الموعد بنجاح</h1>';

                                                    echo '<META HTTP-EQUIV="Refresh" Content="2;CharityPage.php">';
                                                    $sqliedit = "SELECT
                                            donor.donorId,
                                            donor.donorEmail,
                                            appointment.donorId,
                                            appointment.appointmentId,
                                            appointment.charityId,
                                            appointment.appointmentDate,
                                            appointment.appointmentTime,
                                            appointment.charityId,
                                            charity.charityId
                                        FROM
                                            donor
                                        JOIN appointment JOIN charity ON
                                            (
                                                donor.donorId = appointment.donorId AND charity.charityId = appointment.charityId
                                            )
                                        WHERE
                                            appointment.charityId = '$ID' AND appointment.appointmentDate = '$date'
                                        ";
                                                    $resultEdit = $conn->query($sqliedit);
                                                    $rowEdit = $resultEdit->fetch_assoc();
                                                    $email = $rowEdit['donorEmail'];
                                                    $data = "";
                                                    $resultEdit = mysqli_query($conn, $sqliedit);
                                                    if ($resultEdit) {
                                                        $to = $email;
                                                        $subject = "تغيير موعد الاستلام";
                                                        $message = "<h1 style='text-align: center;'> تم تغيير موعدك إلى تاريخ " . $date . " و الوقت" . $time . "</h1>" . "<br>" . "<p style='text-align: center;'>يرجى الانتباه بأن المواعيد تتبع توقيت أربعة وعشرون ساعة</p>" . "<br>" . "<p style='text-align: center;'> فريق منصة عون </p>";
                                                        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                        mail($to, $subject, $message, $headers);
                                                        exit();
                                                    } else {
                                                        header("Content-Type: text/html");
                                                        echo "added unsuccessfully ";
                                                    }
                                                    exit();
                                                }
                                        } 
                                        
                                                    }else {
                                                echo "<h2 style='text-align:center; color:red;'>يوجد موعد في نفس هذا التاريخ $date ونفس الوقت $time</h2>";
                                            }
                                        }
                                        ?>
                                        <!-- APPOINTMENT TABLE FOR THE SELECTED DAY -->
                                        <hr>
                                        <h3 align="center">عرض المواعيد</h3>
                                        <p style='color:red; text-align:center;font-family: Almarai;'>عند تغيير أو حذف تاريخ أو وقت الموعد سيتم إرسال ايميل إلى المتبرع لإعلامه</p>
                                        <table dir="rtl" class="table table-bordered" style="width: 1000px; margin: 10px auto; background: #FFF">
                                            <tr class="active">
                                                <th align="center">
                                            <center><h6>تاريخ الموعد</h6></center>
                                            </th>
                                            <th align="center">
                                            <center><h6>الوقت</h6></center>
                                            </th>
                                            <th align="center">
                                            <center><h6>الحالة</h6></center>
                                            </th>
                                            <th align="center">
                                            <center><h6>اسم المتبرع</h6></center>
                                        </th><th align="center">
                                    <center><h6>هاتف المتبرع</h6></center>
                                    </th>
                                    <th align="center">
                                    <center><h6>عنوان المتبرع</h6></center>
                                    </th>
                                    <th align="center">
                                    <center><h6>تعديل أو حذف</h6></center>
                                    </th>

                                    </tr>
                                    <?php
                                    $ID = $_SESSION['ID'];
                                    $date = $_GET['date'];
                                    // To retrive reserved appointments and donor info
                                    $sqli = "SELECT
                                            donor.donorId,
                                            donor.donorName,
                                            donor.donorPhone,
                                            appointment.donorId,
                                            appointment.appointmentId,
                                            appointment.charityId,
                                            appointment.donorLocation,
                                            appointment.appointmentDate,
                                            appointment.appointmentTime,
                                            appointment.charityId,
                                            appointment.reserved,
                                            charity.charityId
                                        FROM
                                            donor
                                        JOIN appointment JOIN charity ON
                                            (
                                                donor.donorId = appointment.donorId AND charity.charityId = appointment.charityId
                                            )
                                        WHERE
                                            appointment.charityId = '$ID' AND appointment.appointmentDate = '$date'
                                        ORDER BY
                                            `appointment`.`reserved` ASC,
                                            `appointment`.`appointmentTime` ASC";

                                    $result = $conn->query($sqli);
                                    $no = $result->num_rows;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr class="active"  style="font-family: Almarai;">
                                            <td>
                                                <?php echo $row['appointmentDate'] ?>
                                            </td>
                                            <td >
                                                <?php echo $row['appointmentTime'] ?>
                                            </td>
                                            <td class="dtr-pr-40">
                                                <?php echo $row['reserved'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['donorName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['donorPhone'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo "<a href ={$row['donorLocation']} style='text-align:center;float:right;'target='_blank' style='font-family: Almarai;'>اضغط هنا</a>";

                                                //echo "<p style='direction: ltr;font-size: 13px;'>{$row['donorLocation']}</p>";
                                                ?>
                                            </td>
                                            <td class="dtr-pr-50">

                                                <a href="?q=edit&appointment_id=<?php echo $row['appointmentId'] ?>&date=<?php echo $row['appointmentDate'] ?>&time=<?php echo $row['appointmentTime'] ?>" class="btn btn-success btn-xs" style="font-family: Almarai;">تعديل</a> &nbsp;&nbsp;&nbsp;
                                                <a href="#" onClick="RemoveAppoiment(<?php echo $row['appointmentId'] ?>)" class="btn btn-danger btn-xs" style="font-family: Almarai;">حذف</a>
                                                <?php
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    // To retrive Unreserved appointments
                                    $sqli4 = "SELECT * FROM appointment WHERE charityId = '$ID' AND appointmentDate='$date' AND reserved = 'غير محجوز' ";
                                    $result4 = $conn->query($sqli4);

                                    while ($row4 = mysqli_fetch_assoc($result4)) {
                                        ?>
                                        <tr class="active">
                                            <td style="font-family: Almarai;">
                                                <?php echo $row4['appointmentDate'] ?>
                                            </td>
                                            <td style="font-family: Almarai;">
                                                <?php echo $row4['appointmentTime'] ?>
                                            </td>
                                            <td class="dtr-pr-40" style="font-family: Almarai;">
                                                <?php echo $row4['reserved'] ?>
                                            </td>
                                            <td>
                                                <p>   </p>
                                            </td>
                                            <td>
                                                <p>   </p>
                                            </td>
                                            <td>
                                                <p>    </p>
                                            </td>

                                            <td class="dtr-pr-50">

                                                <a href="?q=edit&appointment_id=<?php echo $row4['appointmentId'] ?>&date=<?php echo $row4['appointmentDate'] ?>&time=<?php echo $row4['appointmentTime'] ?>" class="btn btn-success btn-xs" style="font-family: Almarai;">تعديل</a> &nbsp;&nbsp;&nbsp;
                                                <a href="#" onClick="RemoveAppoiment(<?php echo $row4['appointmentId'] ?>)" class="btn btn-danger btn-xs" style="font-family: Almarai;">حذف</a>
                                                <?php ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                            </table>
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
            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <script>


                                            function RemoveAppoiment(appointment_id) {
                                                var appointmentid = appointment_id;
                                                if (confirm('هل أنت متأكد من حذف الموعد؟')) {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'RemoveAppointment.php',
                                                        data: {appointmentid: appointment_id},
                                                        success: function (data) {
                                                            alert("تم حذف الموعد بنجاح");
                                                            window.location = 'CharityPage.php';
                                                        }
                                                        , error: function (data) {
                                                            alert("حدث خطأ أعد المحاولة");
                                                            window.location = 'filterDateAppointment.php';
                                                        }
                                                    });
                                                }
                                            }
            </script>
            </html>