<!--  see comments in line 26 - 29 - 35 - 77 - 201 
TEST --> 
<?php
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
        <meta name="format-detection" content="telephone=no">
        <link rel='stylesheet' href='design.css'>
        <link rel="stylesheet" href="DesignBootstrap.css">
    </head>
    <body>
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
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="charityHome.php" style="float: right;">الصفحة الرئيسية</a>
                                <a class="nav-link" href="CharityPage.php?">المواعيد</a>
                            </div>
                        </div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
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

                                    <?php
                                    $option = "";

                                    $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";
////echo $sqli;
                                    $result = $conn->query($sqli);

                                    $row = $result->fetch_assoc();
//define DB
                                    $name = $row['name'];
                                    $username = $row['username'];
                                    $pass = $row['password'];
                                    $email = $row['email'];
                                    $PhoneNumber = $row['phone'];
                                    $LicenseNumber = $row['licenseNumber'];
                                    $location = $row['location'];
                                    $descrption = $row['descrption'];
                                    $option = $row['service'];
                                    $type = $row['donatoionType'];
                                    $picture = $row['picture'];
                                    ?>

                                    <!-- heading starts -->
                                    <div class="dtr-styled-heading">
                                        <h2>إدارة الملف الشخصي</h2>
                                    </div>
                                    <!-- heading ends --> 

                                    <!--== row starts ==-->
                                    <div class="row"> 

                                        <!-- column 1 starts -->
                                        <div class="col-12 col-md-12"> 

                                            <!-- form starts -->

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
                                                $description = $_POST['descrption'];
                                                $option = $_POST['pickup_servise'];
                                                $type = $_POST['types'];

                                                $servicetype = implode(",", $type);

                                                $picture = $_FILES['img']['name'];

                                                $sql = "select * from charity where (username='$username' or email='$email' or phone='$PhoneNumber') AND charityId<>$ID";

                                                $res = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($res) > 0) {


                                                    $row = mysqli_fetch_assoc($res);
                                                    if ($email == isset($row['email'])) {
                                                        echo "<h3 style='color:red; text-align:center'>الايميل موجود بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="10; URL=ProfilePage.php">';
                                                    }

                                                    if ($username == isset($row['username'])) {
                                                        echo "<h3 style='color:red; text-align:center'>اسم المستخدم موجود بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="10; URL=ProfilePage.php">';
                                                    }

                                                    if ($PhoneNumber == isset($row['PhoneNumber'])) {
                                                        echo "<h3 style='color:red; text-align:center'>رقم الجوال مستخدم بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="10; URL=ProfilePage.php">';
                                                    }
                                                } else {

                                                    ///die("Update query");
                                                    $query = "UPDATE charity SET name='" . $name . "', username='" . $username . "', password='" . $passwod . "', email='" . $email . "',
                     phone='" . $PhoneNumber . "', licenseNumber='" . $LicenseNumber . "', service='" . $option . "', donatoionType='" . $servicetype . "', location='" . $location . "', descrption='" . $description . "' WHERE charityId='" . $ID . "'";
                                                    ///echo $query;

                                                    if ($conn->query($query) === TRUE) {
                                                        echo '<h1 style="color:green; text-align:center">تم الحفظ</h1>';
                                                        ?>
                                                        <META HTTP-EQUIV="Refresh" Content="3; URL=charityHome.php">
                                                        <?php
                                                    } else {
                                                        echo "الرجاء اعادة المحاولة: ";
                                                    }
                                                }
                                            }
                                            ?> 
                                            <div class="dtr-form">
                                                <form method="post" id="ManageTheProfile" enctype="multipart/form-data" ">
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="username">اسم المستخدم</label>
                                                                <input type="text" name="name" placeholder="اسم المستخدم" id="name" value= "<?php echo $name ?>" >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="name" >اسم المنظمة الخيرية</label>  
                                                                <input type="text" name="username" id="username" placeholder="اسم المنظمة الخيرية" required value= "<?php echo $username ?>">
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="password">البريد الالكتروني</label>
                                                                <input type="email" name="email" id="email" placeholder="البريد الالكتروني" required value= "<?php echo $email ?>"  >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="email">كلمةالمرور</label>
                                                                <input type="password" name="pwd" placeholder="كلمةالمرور" class="password" id="password"  required value= "<?php echo $pass ?>">
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="phone_number">رقم الجوال</label>
                                                                <input type="tel" name="phone_number" placeholder="" id="phone_number" maxlength="10" required value= "<?php echo $PhoneNumber ?>">
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label  for="license_Number">رقم الترخيص</label>
                                                                <input type="text" name="license_Number" placeholder="" id="license_Number" required value= "<?php echo $LicenseNumber ?>">
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <p>
                                                            <label  for="location">الموقع</label>
                                                            <input type="text" name="location" id="location" placeholder="الموقع" required  value= "<?php echo $location ?>">
                                                        </p>
                                                        <p>
                                                            <label  for="">هل تتوفر خدمة التوصيل ؟ </label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="نعم" name="pickup_servise" <?php if ($option == 'نعم') echo " checked" ?> >نعم
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="لا" name="pickup_servise" <?php if ($option == 'لا') echo " checked" ?>>لا
                                                            </label>
                                                        </div>
                                                        </p>
                                                        <p>
<?php
//echo  $type;
$headers = explode(',', $type);
?>                                                             
                                                            <label  for="">انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="types[]" id="type_of_donation"  value="ملابس" <?php
if (in_array('ملابس', $headers)) {
    echo "checked ";
}
?>
                                                                       >ملابس
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="types[]" id="type_of_donation"  value="اثاث"
<?php
if (in_array('اثاث', $headers)) {
    echo "checked ";
}
?>

                                                                       >اثاث
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="types[]" id="type_of_donation" value="الكترونيات" <?php
                                                                if (in_array('الكترونيات', $headers)) {
                                                                    echo " checked ";
                                                                }
?>  >الكترونيات

                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" name="types[]" id="type_of_donation" class="form-check-input"value="كتب_ورق"

<?php
if (in_array('كتب_ورق', $headers)) {
    echo " checked ";
}
?>

                                                                       >   كتب ورق </label>


                                                        </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label>صورة الملف التعريفي</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"  name="img" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label>وصف المنظمة الخيرية</label>
                                                            <textarea rows="6" name="description" id="message" class="required"  placeholder="وصف المنظمة الخيرية"> <?php echo $descrption ?></textarea>
                                                        </p><br>
                                                        <p class="text-center">
                                                            <button class="dtr-btn btn-blue" id="Edit" name="Edit"  type="submit"  onclick="return validate();">حفظ</button>
                                                        </p>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <!-- form ends --> 

                                        </div>
                                        <!-- column 1 ends --> 

                                    </div>
                                    <!--== row ends ==--> 
                                    <!-- form ends --> 
                                </div>
                                <!-- heading ends --> 
                            </div>
                            <!-- column 2 ends --> 
                        </div>
                        <!--===== row 1 ends =====--> 
                    </div>
                </section>



                <!--           -----------------------------------------------------------------------------------------------------------------------------------------------------------
                <header> 
                            logo in the right 
                           <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">-->

                <!-- navbar for charity should include 'الصفحة الرئيسية' which is call CharityPage.php 
                    <ul>
                        <li><a href=".php"></a> </li>
                    </ul>
                </nav>
                <!-- log out  as button in the left
                <form id="signout" action="logout.php" method="POST">
                    <input type="submit" value="تسجيل خروج">
    
                </form        </header>  >
    
                <nav class="topnav">-->
                <!-- <header id="headerPage" style="padding:28px 16px">
                        <form id="signout" action="logout.php" method="POST">
                     <input type="submit" value="تسجيل خروج">
                             </form> 
                         </form> 
                         <img src="logo.jpg" alt="logo" class="pageP"  >
                     </header>-->


<?php
//                $option = "";
//
//                $sqli = "SELECT * FROM `charity` WHERE ID = '$ID'";
//////echo $sqli;
//                $result = $conn->query($sqli);
//
//                $row = $result->fetch_assoc();
////define DB
//                $name = $row['name'];
//                $username = $row['username'];
//                $pass = $row['pass'];
//                $email = $row['email'];
//                $PhoneNumber = $row['phone'];
//                $LicenseNumber = $row['LicenseNumber'];
//                $location = $row['location'];
//                $descrption = $row['descrption'];
//                $option = $row['service'];
//                $type = $row['donatoionType'];
//                $picture = $row['picture'];
?>


                <!--     <div class="auth-content"> 
                <?php
                //echo '<h1>إدارة الملف الشخصي</h1>';
                ?>    
                <!--  design the form  
                <form method="post" id="ManageTheProfile" enctype="multipart/form-data" action="UpdateProfilePage.php">



                    <input type="text" name="name" id="name" required value= "<?php // echo $name      ?>" >
                    <label for="username">اسم المستخدم</label>



                    <input type="text" name="username" id="username" required value= "<?php // echo $username      ?>">
                    <label for="name" >اسم المنظمة الخيرية</label>  



                    <br


                    <input type="email" name="email" id="email" required value= "<?php // echo $email      ?>" >
                    <label for="password">كلمةالمرور</label>


                    <input type="password" name="pwd" class="password" id="password"  required value= "<?php // echo $pass      ?>" >
                    <label for="email">البريد الالكتروني</label>


                    <br>
                -->
                                   <!--      <input type="tel" name="phone_number" id="phone_number" maxlength="10" required value= "<?php //echo $PhoneNumber      ?>">tel or number? 
                                        <label  for="license_Number">رقم الترخيص</label> 
                
                
                                        <input type="int" name="license_Number" id="license_Number" required value= "<?php //echo $LicenseNumber      ?>">
                                        <label for="phone_number">رقم الجوال</label>
                
                
                                        <br>
                -->

             <!--           <input type="text" name="location" id="location" required value= "<?php //echo $location      ?>"> not sure if it is url maybe it is select 
                        <label  for="location">الموقع</label>

                        <br>


                        <label>هل تتوفر خدمة التوصيل ؟ </label>
<?php ///echo " option : ", $option . "<br>";  ?>
                          <input type="radio" name="pickup_servise" id="pickup_servise" value="yes"  <?php //if ($option == 'yes') echo " checked"      ?>>
                          <label for="نعم">نعم</label>
                          <input type="radio" name="pickup_servise" id="pickup_servise"  value="no"  <?php // if ($option == 'no') echo " checked"      ?>>
                          <label for="لا">لا</label>    

                        <br>

<?php
///echo  $type;
//$headers = explode(',', $type);
?>

                        <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                        <input type="checkbox" name="types[]" id="type_of_donation"  value="ملابس"
                <?php
//                        if (in_array('ملابس', $headers)) {
//                            echo " checked ";
//                        }
                ?>
                               >
                        <label for="ملابس">ملابس</label>

                        <input type="checkbox" name="types[]" id="type_of_donation"   value="اثاث"
<?php
//                        if (in_array('اثاث', $headers)) {
//                            echo " checked ";
//                        }
?>

                               >
                        <label for="اثاث">اثاث</label>
                        <input type="checkbox" name="types[]" id="type_of_donation"  value="الكترونيات"
<?php
//                        if (in_array('الكترونيات', $headers)) {
//                            echo " checked ";
//                        }
?>

                               >

                        <label for="الكترونيات">الكترونيات</label>

                        <input type="checkbox" name="type[]" id="books" class="name-input" value="كتب_ورق"


<?php
//                               if (in_array('كتب_ورق', $headers)) {
//                                   echo " checked ";
//                               }
?>

                               >
                        <label for="كتب_ورق">كتب_ورق</label>

                        <br>
                        <br>
                        <input type="file" id="img" name="img" accept="image/*"  >
                        <label for="img">صورة الملف التعريفي</label>

                        <br>

                        <textarea rows="4" type="text" name="description" id="description" required > <?php //echo $descrption      ?> </textarea>
                        <label for="description">وصف المنظمة الخيرية</label> 

                        <br>

                        <button class="bu1" id="Edit" type="submit" name="Edit" onclick="return validate();">حفظ</button>

                    </form>
                </div>-->




                <!-- Footer -->
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
                <!-- footer section ends
        ================================================== --> 

            </div>
            <!-- == main content area ends == --> 

        </div>
        <!-- #dtr-wrapper ends --> 
    </body>
    <script src="design.js"></script> 
    <script>


                                                                function validate(form) {
                                                                    ///alert("validate edit form");
                                                                    var phone = document.getElementById("phone_number");
                                                                    var digit = /^\d{10}$/; //to ensure the phone# input allow only correct address
                                                                    //1-validate phone number
                                                                    var checkPhone = phone.value.match(digit); // must be numbers
                                                                    if (!checkPhone || phone.value.length < 10 || phone.value.length > 10)
                                                                    {
                                                                        alert("من فضلك ادخل رقم جوال الجمعية بشكل صحيح");
                                                                        phone.focus();
                                                                        return false;
                                                                    }

                                                                    ///alert("phone done");
                                                                    var myPassword = document.getElementById("password");
                                                                    var newPass = document.getElementById("password").value;
                                                                    ///alert("New Password : " + newPass);
                                                                    var passworsChar = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                                                                    var cheackPass = document.getElementById("password").value.match(passworsChar);



                                                                    //2-validate password
                                                                    if (newPass == "") {
                                                                        alert("من فضلك ادخل كلمةالمرور");
                                                                        myPassword.focus();
                                                                        return false;
                                                                    }

                                                                    if (newPass.length < 8) {

                                                                        alert("كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
                                                                        myPassword.focus();
                                                                        return false;
                                                                    }

                                                                    if (!cheackPass) {
                                                                        alert("password should contain at least one number and one special character");
                                                                        return false;
                                                                    }
                                                                    ///alert("Password done");

                                                                    this.form.submit();
                                                                }


    </script>
</html>


<!-- VALIDATE -->



<!-- UPDATE -->

