<!--  see comments in line 17 - 26 - 41 - 78 -->
<?php
//var_dump(password_hash("12345", PASSWORD_DEFAULT));
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
                <title>manage joining request</title>
            </head>  
            <body data-new-gr-c-s-loaded="9.38.0">
                <div id="dtr-wrapper" class="clearfix"> 

                    <!-- preloader starts 
                    <div class="dtr-preloader">
                        <div class="dtr-preloader-inner">
                            <div class="dtr-preloader-img"></div>
                        </div>
                    </div>-->
                    <!-- preloader ends --> 

                    <!-- Small Devices Header 
                ============================================= -->
                    <div class="dtr-responsive-header">
                        <div class="container"> 

                            <div class="dtr-header-left" style="float: left;"> 
                                <form id="signout" action="logout.php" method="POST">
                                    <input type="submit" class="logoutbtn" value="تسجيل خروج">
                                </form>       
                            </div>

                            <!-- small devices logo --> 
                            <a href="index.php"><img src="finalLogo.jpeg" class="m-logo" alt="logo"></a> 
                            <!-- small devices logo ends --> 
                        </div>
                    </div>
                    <!-- Small Devices Header ends 
                ============================================= --> 

                    <!-- Header 
                ============================================= -->
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
                    <!-- header ends
                ================================================== --> 

                    <!-- == main content area starts == -->
                    <div id="dtr-main-content"> 

                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 

                                <!--===== row 1 starts =====-->
                                <div class="row d-flex align-items-center"> 
                                    <!-- column 2 starts -->
                                    <div class="col-1 col-md-2"></div> 
                                    <div class="col-12 col-md-8"> 

                                        <!-- heading starts -->
                                        <div class="dtr-styled-" align="center">
                                            <h2>طلبات الاضافة</h2>
                                            <!-- form starts -->
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "root", "awondb");
                                            $sqli = "SELECT * FROM `charity` WHERE status='null' ORDER BY 'register_date' ASC";
                                            $result = $connection->query($sqli);
                                            //echo '<table id="manageJoiningRequest">';
//                    echo '<tbody><tr>';
//                    echo '<th>تاريخ الإنضمام</th>';
//                    echo'<th>قبول / رفض</th>';
//                    echo '<th>الجمعية الخيرية</th>';
//                    echo '</tr>';
                                            // $status = $_GET['status'];
                                            //  if ($status == 'null') {
                                            ?>
                                            <table width="100%" class="tab-requets">
                                                <tr align="right">
                                                    <th>تاريخ الإنضمام</th>
                                                    <th>قبول / رفض</th>
                                                    <th>الجمعية الخيرية</th>
                                                </tr>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
                                                    echo'<tr align="right">';
                                                    // &nbsp; used for spaceing
                                                    echo "<td>" . $row['register_date'] . "</td>";

                                                    echo "<td><button id='acc' class='dtr-btn btn-blue btn-small' onclick='accept({$row["ID"]})'>قبول</button>" . "<button id='rej' class='dtr-btn btn-white btn-small' value={$row['ID']}   onclick='reject({$row["ID"]})'>رفض</button>";
                                                    // please check the img <td>
//                                                    <img src="img/user.png" class="join-user">
//                                                    </td>
                                                    echo "<td>" . "<a href='manageRequestPage.php?id={$row["ID"]}'>{$row["name"]}</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;" . $image = '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"width="50em"/>' . "</td>";
                                                    echo "</tr>";
                                                }
                                                //} else {
                                                //    echo 'There is no requests';
                                                // }
                                                //echo "</tbody></table>";
                                                //TEST
                                                ?>
                                           <!--     <table width="100%" class="tab-requets">
                                                    <tr align="right">
                                                        <th>تاريخ الإنضمام</th>
                                                        <th>قبول / رفض</th>
                                                        <th>الجمعية الخيرية</th>
                                                    </tr>
                                                <tr align="right">
                                                    <td>21-10-2021</td>
                                                    <td>
                                                        <div class="" align=""> 
                                                            <a href="#" class="dtr-btn btn-blue btn-small">قبول</a>
                                                            <a href="#" class="dtr-btn btn-white btn-small">رفض</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="img/user.png" class="join-user">
                                                    </td>
                                                </tr>
                                                <tr align="right">
                                                    <td>21-10-2021</td>
                                                    <td>
                                                        <div class="" align=""> 
                                                            <a href="#" class="dtr-btn btn-blue btn-small">قبول</a>
                                                            <a href="#" class="dtr-btn btn-white btn-small">رفض</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="img/user.png" class="join-user">
                                                    </td>
                                                </tr> --> 
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
 
                        <!--  <header> 
                               logo in the right 
                              <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">
                        -->
                        <!-- 
                        <nav class="topnav">
                            <ul>
                                <li><a href=".php"></a> </li>
                            </ul>
                        </nav> --> 
                        <!-- log out  as button in the left
                        <form id="signout" action="logout.php" method="POST">
                            <input type="submit" value="تسجيل خروج">

                        </form>
                    </header>
                        -->
                        <!-- <header id="headerPage" style="padding:15px 8px">
                             <form id="signout" action="logout.php" method="POST">
                                 <input type="submit" value="تسجيل خروج">
                             </form> 
                             <img src="logo.jpg" alt="logo" class="pageP">
                         </header> 

                        <div class="auth-content"> --> 
                        <!-- design 
                        <h1>طلبات الاضافة</h1>      --> 
                        <?php
//                            $connection = mysqli_connect("localhost", "root", "root", "awondb");
//                            $sqli = "SELECT * FROM `charity` WHERE status='null' ORDER BY 'register_date' ASC";
//                            $result = $connection->query($sqli);
//                            echo '<table id="manageJoiningRequest">';
//                            echo '<tbody><tr>';
//                            echo '<th>تاريخ الإنضمام</th>';
//                            echo'<th>قبول / رفض</th>';
//                            echo '<th>الجمعية الخيرية</th>';
//                            echo '</tr>';--> 
//                            // $status = $_GET['status'];
//                            //  if ($status == 'null') {
//                            while ($row = $result->fetch_assoc()) {
//                                echo'<tr>';
//                                // &nbsp; used for spaceing
//                                echo "<td>" . $row['register_date'] . "</td>";
//
//                                echo "<td><button id='acc' class='bu1' style='width: 100px;height:60px;' onclick='accept({$row["ID"]})'>قبول</button>" . "<button id='rej' class='bu1' value={$row['ID']}  style='width: 100px;height:60px;' onclick='reject({$row["ID"]})'>رفض</button>";
//                                echo "<td>" . "<a href='manageRequestPage.php?id={$row["ID"]}'>{$row["name"]}</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;" . $image = '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"width="50em"/>' . "</td>";
//                                echo "</tr>";
//                            }
//                            //} else {
//                            //    echo 'There is no requests';
//                            // }
//                            echo "</tbody></table>";
//                            //TEST
                        ?>
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
    <!-- == main content area ends == --> 
    
</div> 
                    <!-- footer section ends
            
                    <!--INSERT INTO charity_orgnization(`ID`,`name`,`username`,`email`,`phone_number`,`license_Number`,`location`,`pickup_servise`,`type_of_donation`,`photo`,`password`,`description`) VALUES ('1234','سحر','sand','itsaharcs@gmail.com','555555555','12345','Riyadh','1','clothes','','1212','سحر هي منظمة') -->   
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
<script src="design.js"></script> 