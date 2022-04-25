<?php
session_start();
$userId = $_SESSION["ID"];
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        require('db_connecting.php');
        ?>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no">
                <link rel='stylesheet' href='design.css'>
                <link rel="stylesheet" href="DesignBootstrap.css">
                <title>محادثات</title>
            </head>  
            <body>
                <div id="dtr-wrapper" class="clearfix"> 

                    <header id="dtr-header-global" class="">
                        <div class="container">
                <div class="row">
                    <div class="col">
                        <form id="signout" action="logout.php" method="POST">
                            <input type="submit" class="logoutbtn" style="font-family: Almarai; float: left;" value="تسجيل خروج">
                        </form>
                    </div>
                     <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="get_paymentlist.php" style="font-family: Almarai;">قائمة التبرعات</a>
                                    </div>
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
                           
                            <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;">طلبات التبرع</a>
                        </div>
                    </div>
                    
             
                    
                    <div class="col" align="right">
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

                                    <div class="col-1 col-md-2">

                                    </div>
                                    <div class="row dtr-styled-">
                                        <div class="col-md-6">
                                            <div class="modal-header">
                                                <h4>
                                                    <?php
                                                    if (isset($_GET["toUser"])) {
                                                        $userName = "SELECT * FROM `users` WHERE userId = '" . $_GET["toUser"] . "'";
                                                        $res = $conn->query($userName);
                                                       // $uName = mysqli_fetch_assoc($res);
                                                        echo '<input type="text" value=' . $_GET["toUser"] . ' id="toUser" hidden/>';
                                                     while ($uName = mysqli_fetch_assoc($res)) {
                                                    if ($uName['role'] == 'charity') {
                                                        $sqli12 = "SELECT * FROM `charity` WHERE charityId='$uName[userId]'";
                                                        $result12 = $conn->query($sqli12);
                                                        $row12 = mysqli_fetch_assoc($result12);
                                                        echo $row12['name'];
                                                        echo "<br>";
                                                        echo $row12['email'];
                                                    } elseif ($uName['role'] == 'donor') {
                                                        $sqli123 = "SELECT * FROM `donor` WHERE donorId='$uName[userId]'";
                                                        $result123 = $conn->query($sqli123);
                                                        $row123 = mysqli_fetch_assoc($result123);
                                                        echo $row123['donorName'];
                                                        echo "<br>";
                                                        echo $row123['donorEmail'];
                                                    } else {
                                                        $sqli1234 = "SELECT * FROM `admin` WHERE id='$uName[userId]'";
                                                        $result1234 = $conn->query($sqli1234);
                                                        $row1234 = mysqli_fetch_assoc($result1234);
                                                        echo "أدمن المنصة";
                                                    }
                                                }
                                                    }
                                                    //                                                    else {
                                                    //                                                        $userName = "SELECT * FROM `users` WHERE userId = '" . $_GET["toUser"] . "'";
                                                    //                                                        $res = $conn->query($userName);
                                                    //                                                        $uName = mysqli_fetch_assoc($res);
                                                    //                                                        $_SESSION["toUser"] = $uName["userId"];
                                                    //                                                        echo '<input type="text" value=' . $_SESSION["toUser"] . ' id="toUser" hidden/>';
                                                    //                                                        echo $uName['role'];
                                                    //                                                    }
                                                    ?>
                                                </h4>

                                            </div>
                                            <div class="modal-body" id="msgBody" style="height: 400px; overflow-y:scroll; overflow-x: hidden;">
                                                <?php
                                                if (isset($_GET["toUser"])) {
                                                    $chats = mysqli_query($conn, "SELECT * from messages where (fromUser = '" . $userId . "' AND toUser='" . $_GET["toUser"] . "') OR (fromUser = '" . $_GET["toUser"] . "' AND toUser='" . $userId . "') ORDER BY id DESC ")  or die("Failed to query");
//                                                }else{
//                                                    $chats = mysqli_query($conn, "SELECT * from messages where (fromUser = '" . $userId . "' AND toUser='" . $_GET["toUser"] . "') OR (fromUser = '" . $_GET["toUser"] . "' AND toUser='" . $userId . "')") or die("Failed to query");
//                                                }
                                                    while ($chat = mysqli_fetch_assoc($chats)) {
                                                        if ($chat["fromUser"] == $userId) {
                                                            echo "<div style='text-align:right;'><p style='background-color: lightblue; word-warp:break-word; display:inline-block; padding:5px; border-radius:10px; max width:70%;'>"  . $chat["message"]   . "</p></div>";
                                                            echo "<div style='text-align:right;'>".$chat['time']. "</div>";
                                                        }else{
                                                            echo "<div style='text-align:left;'><p style='background-color: lightblue; word-warp:break-word; display:inline-block; padding:5px; border-radius:10px; max width:70%;'>"  . $chat["message"]   . "</p></div>";
                                                            echo "<div style='text-align:left;'>".$chat['time']. "</div>";
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="row" align="center">
                                                    <div class="col-10" align="center">
                                                        <textarea id="message" class="from-control" style="height: 70px;"></textarea>

                                                    </div>
                                                    <div class="col-2" align="center">
                                                        <button id="send" class="dtr-btn btn-blue" style="height: 70px;">ارسل</button>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6" align="right" style="height: 400px; overflow-y:scroll; overflow-x: hidden;">
                                            <h2>محادثة</h2>
                                            <h6>ارسل رسالة إلى</h6>

                                            <?php
                                            $users = mysqli_query($conn, "SELECT * FROM users WHERE userId ='" . $userId . "'") or die("failed");
                                            $user = mysqli_fetch_assoc($users);

                                            ?>
                                            <input type="text" id="fromUser" value="<?php echo $user["userId"]; ?>" hidden/>

                                            <?php
                                            $sqli = "SELECT * FROM `users` WHERE userId <> $userId";
                                            $result = $conn->query($sqli);
                                            if ($result->num_rows > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($row['role'] == 'charity') {
                                                        $sqli12 = "SELECT * FROM `charity` WHERE charityId='$row[userId]'";
                                                        $result12 = $conn->query($sqli12);
                                                        $row12 = mysqli_fetch_assoc($result12);
                                                        echo '<a href="?toUser=' . $row['userId'] . '">' . $row12['name'] . '</a>' . '<br>';
                                                    } elseif($row['role'] == 'donor') {
                                                        $sqli123 = "SELECT * FROM `donor` WHERE donorId='$row[userId]'";
                                                        $result123 = $conn->query($sqli123);
                                                        $row123 = mysqli_fetch_assoc($result123);
                                                        echo '<a href="?toUser=' . $row['userId'] . '">' . $row123['donorName'] . '</a>' . '<br>';
                                                    } else {
                                                        $sqli1234 = "SELECT * FROM `admin` WHERE id='$row[userId]'";
                                                        $result1234 = $conn->query($sqli1234);
                                                        $row1234 = mysqli_fetch_assoc($result1234);
                                                    echo '<a href="?toUser=' . $row['userId'] . '">' . $row1234['username'] . '</a>' . '<br>';

                                                    }
                                                }
                                            }
                                            ?>

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
        <script type="text/javascript">
            $(document).ready(function () {
                $("#send").on("click", function () {
                    $.ajax({
                        url: "insertMessage.php",
                        method: "POST",
                        data: {
                            fromUser: $("#fromUser").val(),
                            toUser: $("#toUser").val(),
                            message: $("#message").val()
                        },
                        dataType: "text",
                        success: function (data) {
                            $("#message").val("");
                            location.reload();
                        }
                    });
                });
            });

        </script>
</html>

