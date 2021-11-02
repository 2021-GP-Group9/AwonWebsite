<!--  see comments in line 26 - 54 - 193  --> 
<?php
session_start();

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

            <!-- <header id="headerPage" style="padding:28px 16px">
                     
                     <img src="logo.jpg" alt="logo" class="pageP"  >
                 </header>-->
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


                                    <!-- heading starts -->
                                    <div class="dtr-styled-heading">
                                        <h2>نموذج طلب انضمام المنظمات الخيرية</h2>
                                    </div>
                                    <!-- heading ends --> 

                                    <!--== row starts ==-->
                                    <div class="row"> 

                                        <!-- column 1 starts -->
                                        <div class="col-12 col-md-12"> 

                                            <!-- form starts -->
                                            <div class="dtr-form">
                                                <form id="contactform" method="post" action="">
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="username">اسم المنظمة الخيرية</label>
                                                                <input type="text" name="name" placeholder="اسم المنظمة الخيرية" id="name" required value= "" >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="name" >اسم المستخدم</label>  
                                                                <input type="text" name="username" id="username" placeholder="اسم المستخدم" required value= "">
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="password">البريد الالكتروني</label>
                                                                <input type="email" name="email" id="email" placeholder="البريد الالكتروني" required value= "" >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="email">كلمةالمرور</label>
                                                                <input type="password" name="pwd" placeholder="كلمةالمرور" class="password" id="password"  required value= "" >
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="phone_number">رقم الجوال</label>
                                                                <input type="tel" name="phone_number" placeholder="" id="phone_number" maxlength="10" required value= "">
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label  for="license_Number">رقم الترخيص</label>
                                                                <input type="text" name="license_Number" placeholder="" id="license_Number" required value= "">
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <p>
                                                            <label  for="location">الموقع</label>
                                                            <input type="text" name="location" id="location" placeholder="الموقع" required value= "">
                                                        </p>
                                                         <p>
                                                            <label  for="location">وصف الجمعية الخيرية</label>
                                                            <input type="text" name="location" id="location" placeholder="وصف الجمعية الخيرية " required value= "">
                                                        </p>
                                                        <p>
                                                            <label  for="">هل تتوفر خدمة التوصيل ؟ </label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optradio">نعم
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optradio">لا
                                                            </label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label  for="">انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value="">ملابس
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value="">اثاث
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value="">الكترونيات
                                                            </label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label>صورة الملف التعريفي</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                        </p>
                                                        <br>
                                                        <p class="text-center">
                                                            <!-- حفظ و لا تسجيل --> 
                                                            <button class="dtr-btn btn-blue" type="submit" onclick="validate();return false;">حفظ</button>
                                                        </p>
                                                    </fieldset>
                                                    <?php
                                                    if (isset($_SESSION['faild'])) {
                                                        echo "<span style='color:red'>" . $_SESSION['faild'] . "</span>";
                                                    }
                                                    $_SESSION['faild'] = null;
                                                    ?>
                                                </form>
                                                <?php
                                                $server = "localhost";
                                                $username = "root";
                                                $password = "root";
                                                $dbname = "awondb";

                                                //define DB
                                                $conn = mysqli_connect("$server", "$username", "$password", "$dbname");

                                                $error = mysqli_connect_error();
                                                if ($error != null) {
                                                    echo "<p>Eror!! could not connect to DB may not connect </p>";
                                                }
                                                //else {    echo 'success connect';}
                                                // else {    echo 'success connect';}

                                                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                                                    $name = $_POST['name'];
                                                    $username = $_POST['username'];
                                                    $descrption = $_POST['descrption'];
                                                    $email = $_POST['email'];
                                                    $passwod = $_POST['passwod'];
                                                    $passwod = PASSWORD_HASH($_POST["passwod"], PASSWORD_DEFAULT);
                                                    $PhoneNumber = $_POST['PhoneNumber'];
                                                    $option = $_POST['service'];
                                                    $type = $_POST['type'];
                                                    $servicetype = "";

                                                    for ($i = 0; $i < sizeof($type); $i++) {
                                                        $servicetype .= $type[$i] . ",";
                                                    }

                                                    $location = $_POST['location'];
                                                    $LicenseNumber = $_POST['LicenseNumber'];
                                                    $picture = $_POST['picture'];


                                                    //cheack from email 
                                                    $sql_chk_email = "select * from charity where email = '$email' ";

                                                    $result = $conn->query($sql_chk_email);

                                                    if ($result->num_rows > 0) {
                                                        $_SESSION['faild'] = 'This email is already exists in our website';
                                                        header('Location:RequestToJoin.php');
                                                    } else {

                                                        $sql_chk_email = "select * from charity where phone = '$PhoneNumber' ";

                                                        $result = $conn->query($sql_chk_email);

                                                        if ($result->num_rows > 0) {
                                                            $_SESSION['faild'] = 'This phone number is already exists in our website';
                                                            header('Location:RequestToJoin.php');
                                                        } else {

                                                            $sql_chk_username = "select * from charity where username = '$username' ";

                                                            $res = $conn->query($sql_chk_username);

                                                            if ($res->num_rows > 0) {
                                                                $_SESSION['faild'] = 'This username is already exists in our website';
                                                                header('Location:RequestToJoin.php');
                                                            } else {
                                                                $query = "INSERT INTO `charity`(name , username, descrption, email , pass , phone, service, donatoionType,location,LicenseNumber,picture,status) VALUES ('$name', '$username', '$descrption' ,'$email', '$passwod', '$PhoneNumber','$option','$servicetype','$location','$LicenseNumber','$picture','null')";
                                                                $run = mysqli_query($conn, $query);


                                                                if ($run) {

                                                                    echo '<script> alert("success Rigester");</script>';
                                                                    echo
                                                                    "<script>window.location ='confirmationPage.php';</script>";
                                                                } else {
                                                                    echo '<script> alert("field Riggester");</script>';
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>


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


             <!--      ----------------------------------------------------------------------------------------
                <div class="auth-content"> 
                    <?php
                    //echo '<h1>نموذج طلب انضمام المنظمات الخيرية</h1>';
                    ?> 

    
                    <form method="POST">
                   design the fieldset  
                        <fieldset class="requestToJoin">

                            <input type="text" name="name" id="name" class="input" placeholder="اسم المنظمة الخيرية" required> <br>
                            <input type="text" name="username" id="username" class="input" placeholder="اسم المستخدم "required> <br>
                            <input type="textarea" name="descrption" id="descrption" class="input"  rows="5" cols="20" placeholder="وصف المنظمة الخيرية"><br>
                            <input type="email" name="email" id="email" class="input" placeholder="البريد الالكتروني "required><br>
                            <input type="password" name="passwod" id="passwod" class="input" placeholder="كلمة المرور" required ><br>
                            <input type="text" name="PhoneNumber" id="PhoneNumber" class="input" placeholder="رقم الجوال"required><br>  <br>

                            <label>هل تتوفر خدمة التوصيل ؟</label>
                            <ol>
                                <il> <input id="yes" type="radio" name="service" id="serviceY" class="input"  value="لا" >نعم </il>
                                <il> <input id="no" type="radio" name="service" id="serviceN" class="input"  value="نعم">لا</il>
                            </ol>
                            <br>
                            <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                            <input type="checkbox" name="type[]" id="clothes" class="input" value ="ملابس"> ملابس 
                            <input type="checkbox" name="type[]" id="furniture" class="input" value="اثاث"> اثاث
                            <input type="checkbox" name="type[]" id="electronic" class="input" value="الكترونيات"> الكترونيات
                            <input type="checkbox" name="type[]" id="books" class="input" value="كتب_ورق"> كتب وورق

                            <br><br> 

                            <input type="text" name="location" id="location" class="input" placeholder="الموقع"required>
                            <br>  <br> 

                            <input type="text" name="LicenseNumber" id="LicenseNumber" class="input" placeholder="رقم الترخيص" required> <br> <br> 


                            <input type="file" name="picture"> صورة الملف التعريفي<br> <br> 

                            <button type="submit" name="submit" class="bu1" onclick="validate();return false;" >تسجيل</button>

                        </fieldset>
                        <?php
//                        if (isset($_SESSION['faild'])) {
//                            echo "<span style='color:red'>" . $_SESSION['faild'] . "</span>";
//                        }
//                        $_SESSION['faild'] = null;
                        ?>
                    </form>-->


                    <?php
//                    $server = "localhost";
//                    $username = "root";
//                    $password = "root";
//                    $dbname = "awondb";
//
//                    //define DB
//                    $conn = mysqli_connect("$server", "$username", "$password", "$dbname");
//
//                    $error = mysqli_connect_error();
//                    if ($error != null) {
//                        echo "<p>Eror!! could not connect to DB may not connect </p>";
//                    }
//                    //else {    echo 'success connect';}
//                    // else {    echo 'success connect';}
//
//                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
//
//                        $name = $_POST['name'];
//                        $username = $_POST['username'];
//                        $descrption = $_POST['descrption'];
//                        $email = $_POST['email'];
//                        $passwod = $_POST['passwod'];
//                        $passwod = PASSWORD_HASH($_POST["passwod"], PASSWORD_DEFAULT);
//                        $PhoneNumber = $_POST['PhoneNumber'];
//                        $option = $_POST['service'];
//                        $type = $_POST['type'];
//                        $servicetype = "";
//
//                        for ($i = 0; $i < sizeof($type); $i++) {
//                            $servicetype .= $type[$i] . ",";
//                        }
//
//                        $location = $_POST['location'];
//                        $LicenseNumber = $_POST['LicenseNumber'];
//                        $picture = $_POST['picture'];
//
//
//                        //cheack from email 
//                        $sql_chk_email = "select * from charity where email = '$email' ";
//
//                        $result = $conn->query($sql_chk_email);
//
//                        if ($result->num_rows > 0) {
//                            $_SESSION['faild'] = 'This email is already exists in our website';
//                            header('Location:RequestToJoin.php');
//                        } else {
//
//                            $sql_chk_email = "select * from charity where phone = '$PhoneNumber' ";
//
//                            $result = $conn->query($sql_chk_email);
//
//                            if ($result->num_rows > 0) {
//                                $_SESSION['faild'] = 'This phone number is already exists in our website';
//                                header('Location:RequestToJoin.php');
//                            } else {
//
//                                $sql_chk_username = "select * from charity where username = '$username' ";
//
//                                $res = $conn->query($sql_chk_username);
//
//                                if ($res->num_rows > 0) {
//                                    $_SESSION['faild'] = 'This username is already exists in our website';
//                                    header('Location:RequestToJoin.php');
//                                } else {
//                                    $query = "INSERT INTO `charity`(name , username, descrption, email , pass , phone, service, donatoionType,location,LicenseNumber,picture,status) VALUES ('$name', '$username', '$descrption' ,'$email', '$passwod', '$PhoneNumber','$option','$servicetype','$location','$LicenseNumber','$picture','null')";
//                                    $run = mysqli_query($conn, $query);
//
//
//                                    if ($run) {
//
//                                        echo '<script> alert("success Rigester");</script>';
//                                        echo
//                                        "<script>
//           window.location ='confirmationPage.php';
//           </script>";
//                                    } else {
//                                        echo '<script> alert("field Riggester");</script>';
//                                    }
//                                }
//                            }
//                        }
//                    }
                    ?>


                </div>



                </body>
                <script src="design.js"></script> 
                <br><br>

                <!-- Footer 
                <footer>
                    <!-- we want footer with  <p>&copy; فريق منصة عون</p> 
                    <p>&copy; فريق منصة عون</p>
                </footer>--> -->

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
        <script>

                                function validate(form) {

                                    var phone = document.getElementById("PhoneNumber");
                                    var digit = /^\d{10}$/; //to ensure the phone# input allow only correct address
                                    //1-validate phone number
                                    var checkPhone = phone.value.match(digit); // must be numbers
                                    if (!checkPhone || phone.value.length < 10 || phone.value.length > 10)
                                    {
                                        alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
                                        phone.focus();
                                        return false;
                                    }


                                    var Password = document.getElementById("passwod");
                                    var passworsChar = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                                    var cheackPass = Password.value.match(passworsChar);
                                    //2-validate password
                                    if (Password.value == "") {
                                        alert("من فضلك ادخل كلمة المرورة");
                                        Password.focus();
                                        return false;
                                    }

                                    if (Password.value.length < 8) {

                                        alert("كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
                                        Password.focus();
                                        return false;
                                    }

                                    if (!cheackPass) {
                                        alert("password should contain atleast one number and one special character");
                                        return false;
                                    }


                                    this.form.submit();
                                }
        </script>
</html>