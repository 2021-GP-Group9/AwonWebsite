<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link href="calendar.css" rel="stylesheet" type="text/css">
<?php
if (isset($_POST['submit'])) {
    $ID = $_SESSION['ID'];
    $date = $_GET['date'];
    $time = $_POST['time'];

    $sqli = "SELECT * FROM appointment WHERE charityId = '$ID' AND appointmentDate='$date' AND appointmentTime='$time'";
    $result = $conn->query($sqli);
    $no = $result->num_rows;

    if ($no == 0) {
        //Add the appointment
        $sqli2 = "INSERT INTO `appointment` VALUES(NULL,'$date', '$time', $ID, NULL ,'لم يحدد بعد' , 0, 0 ,'غير محجوز')";
      

        $result2 = $conn->query($sqli2);
        if ($result2) {
            //Display a message 
            echo '<h1 style="color:green; text-align:center">تم إضافة الموعد بنجاح</h1>';
            echo '<META HTTP-EQUIV="Refresh" Content="2;CharityPage.php">';
            exit();
        }
    } else {
        //Conflect
        echo "<h2 style='text-align:center; color:red'>يوجد موعد في نفس هذا التاريخ $date ونفس الوقت $time</h2>";
    }
}
?>
<br>
<i class="fa fa-calendar"></i><h3> مذكرة المواعيد
</h3>
<!-- filter form -->
<div id="mainContent1" style="padding: 20px 10px;">
    <?php if (isset($_GET['q'])) { ?>
        <div class="row">
            <div class="container">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="well">
                        <form method="post">
                            <div class="form-group">
                                <label>التاريخ</label>
                                <input type="text" name="date" class="form-control" readonly value="<?php echo date("d/m/Y", strtotime($_GET['date'])) ?>">
                            </div>
                            <div class="form-group">
                                <label>حدد الوقت</label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="dtr-btn btn-blue btn-small">حفظ الموعد</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    <?php } ?>
    <?php
// Set our timezone
    date_default_timezone_set('Asia/Riyadh');
// Get prev & next month
    if (isset($_GET['ym'])) {
        $ym = $_GET['ym'];
    } else {
// This month
        $ym = date('Y-m');
    }
// Check format
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }
// Today
    $today = date('Y-m-j', time());
// For H3 title
    $html_title = date('Y / m', $timestamp);
// Create prev & next month link mktime(hour,minute,second,month,day,year)
    $prev = date('Y-m', strtotime('-1 month', $timestamp));
    $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
    $day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
    $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);
// Create the calendar
    $weeks = array();
    $week = '';
// Add empty cell
    $week .= str_repeat('<td></td>', $str);
    $msg = '';
    $msg2 = '';
    $forLoopDate = '';
    for ($day = 1; $day <= $day_count; $day++, $str++) {
        $date = $ym . '-' . $day;
        $forLoopDate = $date;
        $this_date = date("Y-m-d");
        //Get and display the Added appointments for loged in charity
        $query1 = "SELECT * FROM appointment WHERE appointmentDate='$date' and reserved='محجوز' and charityId = {$ID}";
        $result1 = mysqli_query($conn, $query1);
        $count = mysqli_num_rows($result1);
        if ($count == 0) {
            $count = 0;
            $msg = '';
        } else {
            $count = $count;
            // display the number of appointment in each day
            $msg = '<div class="pull-left" style="color:red;">● ' . $count . "</div>";
        }
        //Get and display the Added appointments for loged in charity
        $query2 = "SELECT * FROM appointment WHERE appointmentDate='$date' and reserved='غير محجوز' and charityId = {$ID}";
        $result2 = mysqli_query($conn, $query2);
        $count1 = mysqli_num_rows($result2);
        if ($count1 == 0) {
            $count1 = 0;
            $msg1 = '';
        } else {
            $count1 = $count1;
            // display the number of appointment in each day
            $msg1 = '<div class="pull-left" style="color:green;">● ' . $count1 . "</div>";
        }
        if ($today == $date) {
            // Current day to show the charity so no need to check any outsource
            $week .= '<td class="text-center" style="background-color:#CAD3C8;position:relative"><h2 class="text-center;">' . $day . '</h2>';
        } else {
            $week .= '<td class="text-center" style="position:relative" ><h2 class="text-center;">' . $day;
            $week .= '</h2>';
        }
        $week .= '<a href="filterDateAppointment.php?date=' . $date . '" title="Appointments">';
        $week .= '<span class="label label-info pull-left">' . $msg . '</span></a>';
        $week .= '<a href="filterDateAppointment.php?date=' . $date . '" title="Appointments">';
        $week .= '<span class="label label-info pull-left">' . $msg1 . '</span></a>';
        $week .= '<span class="label label-success pull-right">' . $msg2 . '</span></a>';
        // To select an appointment
        $week .= '<a href="?q=show_time&date=' . $date . '" style="border:none;position: absolute;top: 3px;right: 5px;" class="dtr-btn btn-blue btn-small">+</a>';
        $week .= '</td>';

        // End of the week OR End of the month
        if ($str % 7 == 6 || $day == $day_count) {
            if ($day == $day_count) {
                // Add empty cell
                $week .= str_repeat('<td></td>', 6 - ($str % 7));
            }
            $weeks[] = '<tr>' . $week . '</tr>';
            // Prepare for new week
            $week = '';
        }
    }
    ?>
    <h3><a href="?ym=<?php echo $prev; ?>" class="btn btn-success btn-xs">&lt;</a> <?php echo $html_title; ?> <a class="btn btn-success btn-xs" href="?ym=<?php echo $next; ?>">&gt;</a></h3>
    <table class="table table-bordered" dir="rtl">
        <tr class="active">
            <th>الاحد</th>
            <th>الاثنين</th>
            <th>الثلاثاء</th>
            <th>الاربعاء</th>
            <th>الخميس</th>
            <th>الجمعة</th>
            <th>السبت</th>
        </tr>
        <?php
        foreach ($weeks as $week) {
            echo $week;
        }
        ?>
    </table>
</div>