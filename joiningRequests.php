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
                <link rel="stylesheet" href="style.css">
                <link rel="stylesheet" href="DesignPages.css">
                <title>manage joining request</title>
                <header> 
        <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">
        <div style="float: right;">
            <nav class="topnav">
                <ul>
                    <li><a href="">الصفحة الرئيسية</a> </li>
                    <li><a href="">test</a></li>
                    <li><a href="">test</a></li>
                    <li><a href="index.php">تسجيل خروج</a></li>
                </ul> </nav></div>

    </header>
            </head> 
           <!-- <header id="headerPage" style="padding:15px 8px">
                <form id="signout" action="logout.php" method="POST">
                    <input type="submit" value="تسجيل خروج">
                </form> 
                <img src="logo.jpg" alt="logo" class="pageP">
            </header> --> 
            <body data-new-gr-c-s-loaded="9.38.0">
                <div class="auth-content"> 
                    <h1>طلبات الاضافة</h1>      
                    <?php
                    $connection = mysqli_connect("localhost", "root", "root", "awondb");
                    $sqli = "SELECT * FROM `charity` WHERE status='null' ORDER BY 'register_date' ASC";
                    $result = $connection->query($sqli);
                    echo '<table id="manageJoiningRequest">';
                    echo '<tbody><tr>';
                    echo '<th>تاريخ الإنضمام</th>';
                    echo'<th>قبول / رفض</th>';
                    echo '<th>الجمعية الخيرية</th>';
                    echo '</tr>';
                   // $status = $_GET['status'];
                  //  if ($status == 'null') {
                        while ($row = $result->fetch_assoc()) {
                            echo'<tr>';
                            // &nbsp; used for spaceing
                            echo "<td>".$row['register_date']."</td>";

                            echo "<td><button id='acc' class='bu1' style='width: 100px;height:60px;' onclick='accept({$row["ID"]})'>قبول</button>" . "<button id='rej' class='bu1' value={$row['ID']}  style='width: 100px;height:60px;' onclick='reject({$row["ID"]})'>رفض</button>";
                            echo "<td>"."<a href='manageRequestPage.php?id={$row["ID"]}'>{$row["name"]}</a>"."&nbsp;&nbsp;&nbsp;&nbsp;".$image = '<img src="data:image/jpeg;base64,'. base64_encode($row['picture']).'"width="50em"/>'. "</td>";
                            echo "</tr>";
                        }
                    //} else {
                    //    echo 'There is no requests';
                   // }
                    echo "</tbody></table>";
                    //TEST
                    ?>
                </div> 
                
               
            </body>

            <!-- Footer -->
            <footer class="footer">  
                <div class="SOCIAL">
                    <br>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
                <p>&copy; KSU|Desigend by Aljawharah, Lamya, Rahaf, Sahar and Leen</p>
            </footer>


            <!--INSERT INTO charity_orgnization(`ID`,`name`,`username`,`email`,`phone_number`,`license_Number`,`location`,`pickup_servise`,`type_of_donation`,`photo`,`password`,`description`) VALUES ('1234','سحر','sand','itsaharcs@gmail.com','555555555','12345','Riyadh','1','clothes','','1212','سحر هي منظمة') -->   
        </html>
        <?php
    }
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function accept(id) {
    var charityID = $('#acc').val();
    var data = "ID="+charityID;
    if(confirm('هل أنت متأكد من قبولك للجمعية؟')){
      $.ajax({
          type:'POST',
          url:'accept.php',
          data:{ID:id},
          success: function (data){
              alert("تم قبول الجمعية الخيرية");
              window.location ='joiningRequests.php';
          }
          ,error:function (data){
                      alert("حدث خطأ أعد المحاولة");
                     window.location ='joiningRequests.php';
          }
      });
    }
}

</script>
<script>
function reject(id) {
    if(confirm('هل أنت متأكد من رفضك للجمعية؟')){
      $.ajax({
          type:'POST',
          url:'reject.php',
          data:{ID:id},
          success: function (data){
              alert("تم رفض الجمعية الخيرية");
              window.location ='joiningRequests.php';
          }
          ,error:function (data){
                      alert("حدث خطأ أعد المحاولة");
                     window.location ='joiningRequests.php';
          }
      });
    }
}

</script>
