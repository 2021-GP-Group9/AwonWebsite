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
                <title>طلبات الإنضمام</title>
            </head>  
            <body data-new-gr-c-s-loaded="9.38.0">
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
                                <!--===== row 1 starts =====-->
                                <div class="row d-flex align-items-center"> 
                                    <!-- column 2 starts -->
                                    <div class="col-1 col-md-2"></div> 
                                    <div class="col-12 col-md-8"> 
                                        <!-- heading starts -->
                                        <div class="dtr-styled-" align="center">
                                            <h2>طلبات الإنضمام</h2>
                                            <!-- form starts -->
                                            <?php
                                            $connection = mysqli_connect("localhost", "root", "root", "awondb");
                                            $sqli = "SELECT * FROM `charity` WHERE status='null'";
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
                                                    $dt =date("d-m-Y", strtotime($row['register_date']));
                                                    $image = '<img src="data:image/jpeg;base64,' . base64_encode($row['picture']) . '"width="50em"/>' ;                                                   // &nbsp; used for spaceing
                                                    echo "<td>" .$dt. "</td>";
                                                    echo "<td>"."<button id='rej' class='dtr-btn btn-blue btn-small' value={$row['ID']} onclick='reject({$row["ID"]})'>رفض</button>"."<button id='acc' class='dtr-btn btn-white btn-small' onclick='accept({$row["ID"]})'>قبول</button>" ."</td>";
                                                    // please check the img <img src="img/user.png" class="join-user">
                                                    echo "<td>" . "<a href='manageRequestPage.php?id={$row["ID"]}'>{$row["name"]}</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;" .'<img src="AwonWebsite/user.png" class="join-user">'. "</td>";
                                                    echo "</tr>";
                                                
                                                }//end while
                                                    }//end if
                                                 
                                                 
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
