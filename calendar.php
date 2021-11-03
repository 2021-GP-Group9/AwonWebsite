<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
<link href="calendar.css" rel="stylesheet" type="text/css">
<?php
if (isset($_POST['submit'])) {
    $ID = $_SESSION['ID'];
    $date = $_GET['date'];
    $time = $_POST['time'];

    $sqli = "SELECT * FROM appointment WHERE charity_id = '$ID' AND appointment_date='$date' AND appointment_time='$time'";
    ////echo $sqli;
    $result = $conn->query($sqli);
    $no = $result->num_rows;

    if ($no == 0) {
        $sqli2 = "INSERT INTO appointment VALUES(NULL, '$date', '$time', NULL, $ID, 0)";
        $result2 = $conn->query($sqli2);
        if ($result2) {
            echo '<META HTTP-EQUIV="Refresh" Content="0;CharityPage.php">';
            exit();
        }
    } else {
        echo "<h2 style='text-align:center; color:red'>يوجد موعد في نفس هذا التاريخ $date ونفس الوقت $time</h2>";
    }
}
?>

<i class="fa fa-calendar"></i> مذكرة المواعيد

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
                                <input type="text" name="date" class="form-control" readonly value="<?php echo date("d/m/Y",strtotime($_GET['date'])) ?>">
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
// Set your timezone
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
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
    $day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
    $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);
// Create Calendar!!
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
        //echo $forLoopDate . "<p>";


        $this_date = date("Y-m-d");
        $query1 = "SELECT * FROM appointment WHERE appointment_date='$date' and charity_id = {$ID}";

        $result1 = mysqli_query($conn, $query1);
        $count = mysqli_num_rows($result1);
        if ($count == 0) {
            $count = 0;
            $msg = '';
        } else {
            $count = $count;
            $msg = '<div class="pull-left">عدد المواعيد : ' . $count . "</div>";
        }


        if ($today == $date) {
            $week .= '<td class="text-center" style="background-color:#CAD3C8;position:relative"><h2 class="text-center;">' . $day . '</h2>';
        } else {
            ///$week .= '<td>' . $date . " ==> ". $day;

            $week .= '<td class="text-center" style="position:relative" ><h2 class="text-center;">' . $day;
            $week .= '</h2>';
        }

        $week .= '<a href="filterDateAppointment.php?date=' . $date . '" title="Appointments">';
        $week .= '<span class="label label-info pull-left">' . $msg . '</span></a>';

        $week .= '<span class="label label-success pull-right">' . $msg2 . '</span></a>';


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