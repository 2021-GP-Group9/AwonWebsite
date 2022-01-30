<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        $error = NULL;
        ?>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no">
                <link rel='stylesheet' href='design.css'>
                <link rel="stylesheet" href="DesignBootstrap.css">
                <title>طلبات التبرع</title>
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
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="ProfilePage.php" style="font-family: Almarai;">الملف الشخصي</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">

                                        <a class="nav-link" href="CharityPage.php?" style="font-family: Almarai;">المواعيد</a>

                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">

                                        <a class="nav-link" href="charityHome.php" style="font-family: Almarai;">الرئيسية</a>
                                    </div>
                                </div>

                                <div class="col-sm-3" align="right">
                                    <div class="dtr-header-right">
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                                                                                      alt="logo" width="108"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
                    <!--main content -->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <div class="row d-flex align-items-center"> 
                                    <div class="col-1 col-md-3"> 
                                        <div class="col-10 col-md-6" > </div>

                                        <div class="dtr-styled-" align="center" style="width: 1100px;">
                                           
                                              <a href="newDonation.php" style="font-family: Almarai;">إضافة طلب تبرع جديد</a>
<hr>
                                            <h2>طلبات التبرع</h2>
<hr>
                                            <?php
                                            require('db_connecting.php');
                                            // Get the Unaccepted charities
                                            $ID = $_SESSION['ID'];

                                            $sqli = "SELECT * FROM `donation` WHERE charity_id = '$ID'";
                                            $result = $conn->query($sqli);
                                            ?>
                                            <table table dir="rtl" class="tab-requets" style="width: 1000px; margin: 10px auto; background: #FFF">
                                                <tr align="right" style="text-align: center;font-family: Almarai;">
                                                    <th align="center" >تسلسل</th>
                                                    <th align="center">وصف الطلب</th>
                                                    <th align="center" style="width:5%">الصنف</th>
                                                    <th align="center" style="width:10%">النوع</th>
                                                    <th align="center" style="width:5%">المقاس</th>   
                                                    <th align="center" style="width:5%">اللون</th>
                                                    <th align="center" style="width:5%">الكمية</th>
                                                    <th align="center" style="width:20%">تعديل أو حذف</th>
                                                </tr>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr style='font-family: Almarai;'>";
                                                        echo "<td align='center' >" . $row['donationId'] . "</td>";
                                                        echo "<td align='center'>" . $row['donationDescription'] . "</td>";
                                                        echo "<td align='center'>" . $row['itemName'] . "</td>";
                                                        echo "<td align='center'>" . $row['itemType'] . "</td>";
                                                        echo "<td align='center'>" . $row['itemSize'] . "</td>";
                                                        echo "<td align='center'>" . $row['itemColor'] . "</td>";
                                                        echo "<td align='center'>" . $row['itemCount'] . "</td>";
                                                    echo "<td align='center'>" .
                                                            "<a href='editDonation.php?id={$row["donationId"]}&type={$row['itemType']}&color={$row['itemColor']}' class='btn btn-success btn-xs' style='font-family: Almarai;'>تعديل"."</a>"."&nbsp;&nbsp;&nbsp;"."<button id='rej' class='btn btn-danger btn-xs' value={$row['donationId']} onclick='reject({$row["donationId"]})' style='font-family: Almarai;'>حذف</button>"  . "</td>";
                                                        // &nbsp; used for spaceing
                                                        echo "</tr>";
                                                    }//end while
                                                }//end if 
                                                else {
                                                    // If there is no request, the system will display appropraite message
                                                    echo'<tr align="right">';
                                                    echo "<td>" . "</td>" . "<td>" . "لا يوجد طلبات تبرع جديدة" . "</td>";
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
            function reject(id) {
                var charityID = $('#rej').val();
                var data = "donationId=" + id;

                if (confirm('هل أنت متأكد من حذف طلب التبرع؟')) {
                    $.ajax({
                        type: 'POST',
                        url: 'removeDonation.php',
                        data: {donationid: id},
                        success: function (data) {
                            alert("تم حذف طلب التبرع");
                            window.location = 'donationRequests.php';
                        }
                        , error: function (data) {
                            alert("حدث خطأ أعد المحاولة");
                            window.location = 'donationRequests.php';
                        }
                    });
                }
            }
        </script>
</html>