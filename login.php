 <!-- see comments in line 26 - 30 - 47 - 144 -->

<?php
session_start();
////var_dump(password_hash("12345A", PASSWORD_DEFAULT));

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location:joiningRequests.php');
    }
}

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        header('Location:CharityPage.php');
    }
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css'>
        <link rel="stylesheet" href="DesignPages.css">
    <header> 
              <!-- logo in the right -->
                <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

                
               <!-- log out  as button in the left-->
                <form id="signout" action="logout.php" method="POST">
                    <input type="submit" value="تسجيل خروج">

                </form>
    </header>
    <!-- Header
    
    <header id="headerPage" style="padding:28px 16px">
       <img src="logo.jpg" alt="logo" class="pageP"  >

    </header>
    -->
</head>

<body>
    <div class="auth-content"> 
        <!-- design --> 
        <form id="loginForm" method="post" > 
            <h2> <br>تسجيل الدخول</h2>
            <br>
            <br>
            <label class="name"><h3>   <input type="text" name="username" id="username" class="name-input" required>اسم المستخدم </label> </h3><br><br>
                <br>
                <label class="name"><h3>   <input type="password" name="pwd" class="password" id="password">كلمة المرور </label></h3>
                    <br>
                    <input type="submit" class="bu1" value="تسجيل الدخول"/>
                    <br><br>
                    <p>جمعية جديدة? <a href ="RequestToJoin.php" > تسجيل جديد </a></p> 
                    <br><br><Br>
                    <?php
                    if (isset($_SESSION['errorC'])) {
                        echo "<span style='color:red'>" . $_SESSION['errorC'] . "</span>";
                    }
                    $_SESSION['errorC'] = null;
                    ?>
                    <?php
                    // put your code here
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require('db_connecting.php');
                        $username = $_POST['username'];
                        $password = $_POST['pwd'];
                        $sql = "select * from admin where username = '$username' ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";
                            //if(password_verify($password, $row['password'])){
                            if (password_verify($password, $row['password'])) {
                                $_SESSION['ID'] = $row['ID'];
                                $_SESSION['role'] = 'admin';

                                echo '<META HTTP-EQUIV="Refresh" Content="1; URL=joiningRequests.php">';
                            } else {
                                $_SESSION['errorC'] = 'UserName or password is not correct';
                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                            }
                        } else {
                            $_SESSION['errorC'] = 'UserName or password is not correct';
                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                        }
                    }
                    ?>
                    <!-- charity page code -->
                    <?php
                    // put your code here
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require('db_connecting.php');
                        $username = $_POST['username'];
                        $password = $_POST['pwd'];

//        $sqli = "SELECT * FROM `charity` WHERE ID='$id' ";
//       $result = $connection->query($sqli);
// while ($row = $result->fetch_assoc()) {
//
//                         if($id=$row['id'] and $status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
//        
// }

                        $sql_charity = "select * from charity where username = '$username' and `status`='Accepted'";
                        $result = $conn->query($sql_charity);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);

                            /// echo "<h1>"."useeeeer is".$row["username"]."</h1>";
//		if ($status !='Accepted'){
//                             $_SESSION['errorC'] = 'the charity not Accepted yet';
//			header('Location:login.php');
//                         }
                            //if(password_verify($password, $row['password'])){
                            if (password_verify($password, $row['pass'])) {

                                $_SESSION['ID'] = $row['ID'];
                                $_SESSION['role'] = 'charity';
                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=CharityPage.php">';
//                        
                            } else {
                                $_SESSION['errorC'] = 'UserName or password is not correct';
                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                            }
                        } else {
                            $_SESSION['errorC'] = 'Username not currect or the charity not accepted yet';
                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=login.php">';
                        }
                    }
                    ?>
                    </div>
    <br> <br> <br> 
                    </body>
       
    <!-- Footer -->
    <footer>
        <!-- we want footer with  <p>&copy; فريق منصة عون</p>  -->
       
        <p>&copy; فريق منصة عون</p>
    </footer>
                    </html>

