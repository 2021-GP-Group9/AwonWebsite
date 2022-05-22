<?php
session_start();
$userId = $_SESSION["ID"];
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        require('db_connecting.php');
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
                                        <input type="submit" class="logoutbtn" style="font-family: Almarai;" value="تسجيل خروج">
                                    </form>  
                                </div>
                                <div class="col" align="center"><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="manageAccounts.php" style="font-family: Almarai;">إدارة الحسابات</a>
                                    </div>
                                </div>
                                <div class="col" align="center"><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="joiningRequests.php" style="font-family: Almarai;">طلبات الانضمام</a>
                                    </div>
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

                                    <div class="col-1 col-md-2">

                                    </div>
                                    <div class="row dtr-styled-">
                                        <div class="col-md-6">
                                            <META HTTP-EQUIV="Refresh" Content="30; URL=adminChat.php">

                                            <div class="modal-header">
                                                <h4>
                                                    <?php
                                                    if (isset($_GET["toUser"])) {
                                                        $userName = "SELECT * FROM `users` WHERE userId = '" . $_GET["toUser"] . "'";
                                                        $res = $conn->query($userName);
                                                        echo '<input type="text" value=' . $_GET["toUser"] . ' id="toUser" hidden/>';
                                                        while ($uName = mysqli_fetch_assoc($res)) {
                                                            if ($uName['role'] == 'charity') {
                                                                $sqli12 = "SELECT * FROM `charity` WHERE charityId='$uName[userId]'";
                                                                $result12 = $conn->query($sqli12);
                                                                $row12 = mysqli_fetch_assoc($result12);
                                                                echo $row12['name'];
                                                                echo "<br>";
                                                                echo $row12['email'];
                                                            } else {
                                                                $sqli123 = "SELECT * FROM `donor` WHERE donorId='$uName[userId]'";
                                                                $result123 = $conn->query($sqli123);
                                                                $row123 = mysqli_fetch_assoc($result123);
                                                                echo $row123['donorName'];
                                                                echo "<br>";

                                                                echo "<p>" . $row123['donorEmail'] . "</p>";
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </h4>

                                        </div>
                                        <div class="modal-body" id="msgBody" style="height: 400px; overflow-y:scroll; overflow-x: hidden;">
                                            <?php
                                            if (isset($_GET["toUser"])) {
                                                $chats = mysqli_query($conn, "SELECT * from messages where (fromUser = '" . $userId . "' AND toUser='" . $_GET["toUser"] . "') OR (fromUser = '" . $_GET["toUser"] . "' AND toUser='" . $userId . "') ORDER BY id DESC ") or die("Failed to query");
                                                while ($chat = mysqli_fetch_assoc($chats)) {
                                                    if ($chat["fromUser"] == $userId) {
                                                        echo "<div style='text-align:right;'><p style='background-color: lightblue; word-warp:break-word; display:inline-block; padding:5px; border-radius:10px; max width:70%; font-family: Almarai;'>" . $chat["message"] . "</p></div>";
                                                        echo "<div style='text-align:right;'>" . $chat['time'] . "</div>";
                                                    } else {
                                                        echo "<div style='text-align:left;'><p style='background-color: lightgrey; word-warp:break-word; display:inline-block; padding:5px; border-radius:10px; max width:70%; font-family: Almarai;'>" . $chat["message"] . "</p></div>";
                                                        echo "<div style='text-align:left;'>" . $chat['time'] . "</div>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row" align="center">
                                                <div class="col-10" align="center">
                                                    <textarea id="message" class="from-control" style="height: 70px; font-family: Almarai;"></textarea>

                                                </div>
                                                <div class="col-2" align="center">
                                                    <button id="send" class="dtr-btn btn-blue" style="height: 70px; font-family: Almarai;">ارسل</button>

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
                                        $sqli = "SELECT * FROM `users` WHERE userId <> 1111";
                                        $result = $conn->query($sqli);
                                        if ($result->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if ($row['role'] == 'charity') {
                                                    $sqli12 = "SELECT * FROM `charity` WHERE charityId='$row[userId]'";
                                                    $result12 = $conn->query($sqli12);
                                                    $row12 = mysqli_fetch_assoc($result12);
                                                    $sqlmess = "SELECT * FROM messages where (fromUser = {$row['userId']} OR toUser={$row['userId']}) AND (toUser={$userId} OR fromUser={$userId}) ORDER BY id DESC LIMIT 1";
                                                    $query3 = mysqli_query($conn, $sqlmess);
                                                    $row4 = mysqli_fetch_assoc($query3);
                                                    if ($query3->num_rows > 0) {
                                                        $ress = $row4["message"];
                                                    } else {
                                                        $ress = "لاتوجد رسائل";
                                                    }
                                                    (strlen($ress) > 28) ? $msg = substr($ress, 0, 28) : $msg = $ress;
                                                    ?>
                                                    <div class="row" >
                                                        <div class="col-6" align="right">
                                                            <?php
                                                            if($msg != "لاتوجد رسائل"){
                                                             
                                                            }
                                                            echo $msg . '<br>';
                                                            ?>
                                                        </div>
                                                        <div class="col-6" >
                                                            <?php echo '<a href="?toUser=' . $row['userId'] . '">' . $row12['name'] . '</a>&nbsp;'; ?>
                                                        </div>
                                                    </div> 
                                                    <?php
                                                } else {
                                                    $sqli123 = "SELECT * FROM `donor` WHERE donorId='$row[userId]'";
                                                    $result123 = $conn->query($sqli123);
                                                    $row123 = mysqli_fetch_assoc($result123);
                                                    $sqlmess = "SELECT * FROM messages where (fromUser = {$row['userId']} OR toUser={$row['userId']}) AND (toUser={$userId} OR fromUser={$userId}) ORDER BY id DESC LIMIT 1";
                                                    $query3 = mysqli_query($conn, $sqlmess);
                                                    $row4 = mysqli_fetch_assoc($query3);
                                                    if ($query3->num_rows > 0) {
                                                        $ress = $row4["message"];
                                                    } else {
                                                        $ress = "لاتوجد رسائل";
                                                    }
                                                    (strlen($ress) > 28) ? $msg = substr($ress, 0, 28) : $msg = $ress;
                                                    ?> 
                                        <div class="row" >
                                                        <div class="col-6" align="right">
                                                           
                                                            <?php
                                                            if($msg != "لاتوجد رسائل"){
                                                         
                                                            }
                                                            echo $msg . '<br>';
                                                            ?>
                                                        </div>
                                                    <div class="col-6" >
                                                        <?php echo '<a href="?toUser=' . $row['userId'] . '">' . $row123['donorName'] . '</a>&nbsp;'; ?>
                                                    </div>
                                                </div> 
                                                <?php
                                            }
                                        }
                                    }
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

