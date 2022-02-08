<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                <div class="col-sm-2">
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
                                
                                   <div class="col" ><br>
                        <div class="main-navigation dtr-menu-dark">
                           
                            <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;">طلبات التبرع</a>
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
                    <!--main content -->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <div class="row d-flex align-items-center"> 
                                    <div class="col-1 col-md-3"> 
                                        <div class="col-10 col-md-6" > </div>

                                        <div class="dtr-styled-" align="center" style="width: 1100px;">
                                           
                                             
<hr>
                                            <h2>طلبات التبرع</h2>
<hr>
                                            <?php


                                            require('db_connecting.php');
                                            // Get the Unaccepted charities
                                            $ID = $_SESSION['ID'];
                                            //$donationId="";
                                            $donationId=  $_GET['id'];
                                            $sqli = "SELECT * FROM `respond` WHERE  `DonationId` = $donationId  AND `size` = '1' AND `type` = '1'  LIMIT 1";
                                           $result = $conn->query($sqli);
                                            ?>

                                                <?php
                                                if ($result->num_rows > 0) {
                                                 while ($row = mysqli_fetch_assoc($result)) {


                                                       $donor_name_fetch =   "SELECT * FROM `donor` WHERE DonorId =". $row['DonorId'];
                                                         $donor_name = $conn->query($donor_name_fetch);
                                                         $row1 = mysqli_fetch_assoc($donor_name);
$email = $row1["donorEmail"];


echo "<p dir='rtl'>تم العثور على المتبرع باسم  <span style='color: green'>$row1[donorName]<span></span> <button   style='float: left' class='btn btn-success' onclick=send_email('$email')>   
     
     ارسل بريد الكتروني</button></p> ";
                                                    
                                                    }//end while
                                                }//end if 
                                                else {
                                                    // If there is no request, the system will display appropraite message
                                                   
                                                    echo "<h2>"."لم يتم العثور على متبرع حتى الآن"."</h2>";
                                                }//end else
                                                ?>
                                        <?php
                                         require('db_connecting.php');
                                            $sqli2 = "SELECT * FROM `respond` WHERE DonationId = '$donationId'";
                                            $result2 = $conn->query($sqli2);
                                        ?>
                                          <?php
                                                if ($result2 ->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                       $DonationId = $row['DonationId'];
                                                       $respondId = $row['respondId'];
                                                       $DonorId = $row['DonorId'];
                                                       $type = $row['type'];
                                                       $size = $row['size'];
                                                       $color = $row['color'];
                                                       $count = $row['count'];
                                                       
                                                    }//end while
                                                }//end if 
                                                ?>
                                            
  
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
<script>
    function send_email(donor_email, ID) {
        $.ajax({
            url: "Send_donor_email.php",
            type: "POST",
            // dataType: "json",
            // contentType: "application/json; charset=utf-8",
            data: {ID: ID},
            data: {donor_email: donor_email},
            success: function (result) {
                alert("تم إرسال البريد الإلكتروني إلى المتبرع بنجاح");
            },
            error: function (err) {
                // check the err for error details
            }
        });
    }
</script>
</html> 
