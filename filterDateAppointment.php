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
                        <div class="col-sm-4">
                            <form id="signout" action="logout.php" method="POST">
                                <input type="submit" class="logoutbtn" value="تسجيل خروج">
                            </form>  
                        </div>
                        <div class="col-sm-4" align="center"><br>
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="charityHome.php" style="float: right;">الصفحة الرئيسية</a>
                                <a class="nav-link" href="CharityPage.php"style="float: left;">المواعيد</a>
                            </div>
                        </div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
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
                                            $sqli2 = "UPDATE appointment SET appointmentDate='$date', appointmentTime='$time' WHERE appointmentId=$appointment_id AND reserved ='غير محجوز'";

                                            $result2 = $conn->query($sqli2);
                                            if ($result2) {
                                                echo '<h1 style="color:green; text-align:center">تم تعديل الموعد بنجاح</h1>';

                                                echo '<META HTTP-EQUIV="Refresh" Content="2;CharityPage.php">';
                                                exit();
                                            }
                                        } else {
                                            echo "<h2 style='text-align:center; color:red'>يوجد موعد في نفس هذا التاريخ $date ونفس الوقت $time</h2>";
                                        }
                                    }
                                    ?>
                                    <!-- APPOINTMENT TABLE FOR THE SELECTED DAY -->
                                    <hr>
                                    <h3 align="center">عرض المواعيد</h3>
                                    <p style='color:red; text-align:center;'>يرجى عدم تغيير أو حذف الموعد المحجوز</p>
                                    <table dir="rtl" class="table table-bordered" style="width: 1000px; margin: 10px auto; background: #FFF">
                                        <tr class="active">
                                            <th align="center">
                                        <center>تاريخ الموعد</center>
                                        </th>
                                        <th align="center">
                                        <center>الوقت</center>
                                        </th>
                                        <th align="center">
                                        <center>الحالة</center>
                                        </th>
                                        <th align="center">
                                        <center>اسم المتبرع</center>
                                    </th><th align="center">
                                <center>هاتف المتبرع</center>
                                </th>
                                <th align="center">
                                <center>عنوان المتبرع</center>
                                </th>
                                <th align="center">
                                <center>تعديل أو حذف </center>
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
                                    <tr class="active">
                                        <td>
                                            <?php echo $row['appointmentDate'] ?>
                                        </td>
                                        <td>
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
                                               echo "<a href ={$row['donorLocation']} style='text-align:center;float:right;'target='_blank'>اضغط هنا</a>";                 

                                          ?>
                                        </td>
                                        <td class="dtr-pr-50">

                                            <a href="?q=edit&appointment_id=<?php echo $row['appointmentId'] ?>&date=<?php echo $row['appointmentDate'] ?>&time=<?php echo $row['appointmentTime'] ?>" class="btn btn-success btn-xs">تعديل</a> &nbsp;&nbsp;&nbsp;
                                            <a href="#" onClick="RemoveAppoiment(<?php echo $row['appointmentId'] ?>)" class="btn btn-danger btn-xs">حذف</a>
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
                                        <td>
                                    <?php echo $row4['appointmentDate'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row4['appointmentTime'] ?>
                                        </td>
                                        <td class="dtr-pr-40">
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

                                            <a href="?q=edit&appointment_id=<?php echo $row4['appointmentId'] ?>&date=<?php echo $row4['appointmentDate'] ?>&time=<?php echo $row4['appointmentTime'] ?>" class="btn btn-success btn-xs">تعديل</a> &nbsp;&nbsp;&nbsp;
                                            <a href="#" onClick="RemoveAppoiment(<?php echo $row4['appointmentId'] ?>)" class="btn btn-danger btn-xs">حذف</a>
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
                                        <p>&copy; فريق منصة عون</p>
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

