<!--  see comments in line 24 - 27 - 33 - 114 --> <?php
session_start();
$ID = $_SESSION['ID'];
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "awondb";

$conn = mysqli_connect("$server", "$username", "$password", "$dbname");

$error = mysqli_connect_error();
if ($error != null) {
    echo "<p>Eror!! could not connect to DB may not connect </p>";
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
        <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

        <!-- navbar for charity should include 'الصفحة الرئيسية' which is call CharityPage.php  --> 
        <nav class="topnav">
            <ul>
                <li><a href=".php"></a> </li>
            </ul>
        </nav>
       <!-- log out  as button in the left-->
        <form id="signout" action="logout.php" method="POST">
            <input type="submit" value="تسجيل خروج">

        </form>
    </header>
    <!-- <header id="headerPage" style="padding:28px 16px">
             <form id="signout" action="logout.php" method="POST">
                 <button type="submit" onclick="index();return false;">تسجيل الخروج</button>
             </form> 
             <img src="logo.jpg" alt="logo" class="pageP"  >
         </header> -->
</head>
<body>
    <div class="auth-content">

        <?php
        if (isset($_POST["Edit"])) {
            echo "<h1>تعديل بيانات الحساب</h1>";
            $name = $_POST['name'];
            $username = $_POST['username'];
            $passwod = PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT);
            $email = $_POST['email'];
            $PhoneNumber = $_POST['phone_number'];
            $LicenseNumber = $_POST['license_Number'];
            $location = $_POST['location'];
            $description = $_POST['description'];
            $option = $_POST['pickup_servise'];
            $type = $_POST['types'];

            $servicetype = implode(",", $type);
            ;



            $picture = $_FILES['img']['name'];

            $sql = "select * from charity where (username='$username' or email='$email' or phone='$PhoneNumber') AND ID<>$ID";

            $res = mysqli_query($conn, $sql);

            if (mysqli_num_rows($res) > 0) {


                $row = mysqli_fetch_assoc($res);
                if ($email == isset($row['email'])) {
                    echo "<h3 style='color:red; text-align:center'>email already exists</h3>";
                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                }

                if ($username == isset($row['username'])) {
                    echo "<h3 style='color:red; text-align:center'>username already exists</h3>";
                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                }

                if ($PhoneNumber == isset($row['PhoneNumber'])) {
                    echo "<h3 style='color:red; text-align:center'>phone number already exists</h3>";
                    echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                }
            } else {

                ///die("Update query");
                $query = "UPDATE charity SET name='" . $name . "', username='" . $username . "', pass='" . $passwod . "', email='" . $email . "',
                     phone='" . $PhoneNumber . "', LicenseNumber='" . $LicenseNumber . "', service='" . $option . "', donatoionType='" . $servicetype . "', location='" . $location . "', descrption='" . $description . "' WHERE ID='" . $ID . "'";
                ///echo $query;

                if ($conn->query($query) === TRUE) {
                    echo '<h1 style="color:green; text-align:center">تم الحفظ</h1>';
                    ?>
                    <META HTTP-EQUIV="Refresh" Content="3; URL=CharityPage.php">
                    <?php
                } else {
                    echo "الرجاء اعادة المحاولة: ";
                }
            }
        }
        ?> 
    </div>

    <!-- Footer -->
    <footer>
        <!-- we want footer with  <p>&copy; فريق منصة عون</p>  -->
       
        <p>&copy; فريق منصة عون</p>
    </footer>
</body>