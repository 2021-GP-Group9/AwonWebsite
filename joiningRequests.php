<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        $error = NULL;
        ?>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no">
                <link rel='stylesheet' href='design.css'>
                <link rel="stylesheet" href="DesignBootstrap.css">
                <title>طلبات الإنضمام</title>
            </head>  
            <body>
                <div id="dtr-wrapper" class="clearfix"> 
                    <div class="dtr-responsive-header">
                        <div class="container"> 
                            <div class="dtr-header-left" style="float: left;"> 
                                <form id="signout" action="logout.php" method="POST">
                                    <input type="submit" class="logoutbtn" value="تسجيل خروج">
                                </form>       
                            </div>
                            <a href="index.php"><img src="finalLogo.jpeg" class="m-logo" alt="logo"></a> 
                        </div>
                    </div>
                    <!-- header starts--> 
                    <header id="dtr-header-global" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <form id="signout" action="logout.php" method="POST">
                                        <input type="submit" class="logoutbtn" value="تسجيل خروج">
                                    </form>  
                                </div>
                                <div class="col-sm-4" align="center"><br>

                                </div>
                                <div class="col-sm-4" align="right">
                                    <div class="dtr-header-right"> 
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"  alt="logo" width="108"></a></div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- header ends--> 

                    <!--main content area starts-->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <!-- row 1 starts -->
                                <div class="row d-flex align-items-center"> 
                                    <!-- column 2 starts -->
                                    <div class="col-1 col-md-2"></div> 
                                    <div class="col-12 col-md-8"> 
                                        <!-- heading starts -->
                                        <div class="dtr-styled-" align="center">
                                            <h2>طلبات الإنضمام</h2>
                                            <!-- table starts -->
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "root", "awondb");
                                            $sqli = "SELECT * FROM `charity` WHERE status='بالانتظار'";
                                            $result = $connection->query($sqli);
                                            ?>
                                            <table width="100%" class="tab-requets">
                                                <tr align="right">
                                                    <th>تاريخ الإنضمام</th>
                                                    <th>قبول أو رفض </th>
                                                    <th>الجمعية الخيرية</th>
                                                </tr>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo'<tr align="right">';
                                                        $dt = date("d-m-Y", strtotime($row['registerDate']));
                                                        $image = '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"width="50em"/>';
                                                        echo "<td>" . $dt . "</td>";
                                                        echo "<td>" . "<button id='rej' class='btn btn-danger btn-xs' value={$row['charityId']} onclick='reject({$row["charityId"]})'>رفض</button>" . "<button id='acc' class='btn btn-success btn-xs' onclick='accept({$row["charityId"]})'>قبول</button>" . "</td>";
                                                        // &nbsp; used for spaceing
                                                        echo "<td>" . "<a href='manageRequestPage.php?id={$row["charityId"]}'>{$row["name"]}</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;" . $image . "</td>";
                                                        echo "</tr>";
                                                    }//end while
                                                }//end if 
                                                else {
                                                    echo'<tr align="right">';
                                                    echo "<td>" . "</td>" . "<td>" . "لا يوجد طلبات إنضمام جديدة" . "</td>";
                                                    echo "<td>" . "</td>" . "<td>" . "</td>";
                                                }
                                                ?>

                                            </table>
                                            <!-- form ends --> 
                                        </div>
                                        <!-- heading ends --> 
                                    </div>
                                    <!-- column 2 ends --> 
                                </div>
                                <!--===== row 1 ends =====--> 
                            </div>
                        </section>
                    </div> 
                    <br><br><br><br><br><br>
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
                </div>
                <!--main content area ends--> 
            </div> 

        </body>  </html>
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
