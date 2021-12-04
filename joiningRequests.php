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
                    <!--main content -->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <div class="row d-flex align-items-center"> 

                                    <div class="col-1 col-md-2"></div> 
                                    <div class="col-12 col-md-8"> 

                                        <div class="dtr-styled-" align="center">
                                            <h2>طلبات الإنضمام</h2>

                                            <?php
                                            require('db_connecting.php');
                                            // Get the Unaccepted charities
                                            $sqli = "SELECT * FROM `charity` WHERE status='بالانتظار'";
                                            $result = $conn->query($sqli);
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
                                                        // Bring the date with specific format
                                                        $dt = date("d-m-Y", strtotime($row['registerDate']));
                                                        // Retrive the image from database
                                                        $image = '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"width="50em"/>';
                                                        echo "<td>" . $dt . "</td>";
                                                        echo "<td>" . "<button id='rej' class='btn btn-danger btn-xs' value={$row['charityId']} onclick='reject({$row["charityId"]})'>رفض</button>" . "<button id='acc' class='btn btn-success btn-xs' onclick='accept({$row["charityId"]})'>قبول</button>" . "</td>";
                                                        // &nbsp; used for spaceing
                                                        echo "<td>" . "<a href='manageRequestPage.php?id={$row["charityId"]}'>{$row["name"]}</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;" . $image . "</td>";
                                                        echo "</tr>";
                                                    }//end while
                                                }//end if 
                                                else {
                                                    // If there is no request, the system will display appropraite message
                                                    echo'<tr align="right">';
                                                    echo "<td>" . "</td>" . "<td>" . "لا يوجد طلبات إنضمام جديدة" . "</td>";
                                                    echo "<td>" . "</td>" . "<td>" . "</td>";
                                                }
                                                ?>

                                            </table>

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
                                            <p>&copy; فريق منصة عون</p>
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