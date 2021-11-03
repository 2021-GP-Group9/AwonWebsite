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
         <script src="alert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="alert/dist/sweetalert.css">
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
                                                <form id="contactform" method="POST">
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="name">اسم الجمعية الخيرية</label>
                                                                <input type="text" name="name" id="name"  placeholder="اسم الجمعية الخيرية"  required >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="username" >اسم المستخدم</label>  
                                                                <input type="text" name="username" id="username" placeholder="اسم المستخدم" required>
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for=" email">البريد الالكتروني</label>
                                                                <input type="email" name="email" id="email" placeholder="البريد الالكتروني" required >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for=" password">كلمةالمرور</label>
                                                                <input type="password" name="password" id="password" placeholder="كلمةالمرور" class="password" required >
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="phone_number">رقم الجوال</label>
                                                                <input type="tel"  name="phone_number" id="phone_number" placeholder="05xxxxxxxx" maxlength="10" required >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label  for="license_Number">رقم الترخيص</label>
                                                                <input type="text" name="license_Number" id="license_Number" placeholder="xxx" required>
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <p>
                                                            <label  for="location">موقع الجمعية </label>
                                                            <input type="text" name="location" id="location" placeholder="المدينة" required>
                                                        </p>
                                                        <p>
                                                            <label>هل تتوفر خدمة استلام للتبرعات ؟ </label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" id="yes" name="service" value="نعم">نعم
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input"id="no"  name="service"value="لا">لا
                                                            </label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label>انواع التبرعات التي تقبل به المنظمة الخيرية؟</label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="type[]" id="clothes" value="">ملابس
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"  name="type[]" id="furniture" value="اثاث">اثاث
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="type[]" id="electronic"  value="الكترونيات">الكترونيات
                                                            </label>
                                                        </div>
                                                        
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"  name="type[]" id="books" value="كتب_ورق">كتب وورق
                                                            </label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label>صورة الملف التعريفي</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" name="picture">
                                                            <label class="custom-file-label" for="customFile">اختر ملف </label>
                                                        </div>
                                                        </p>
                                                        <br>
                                                        
                                                         <p>
                                                       <label>وصف المنظمة الخيرية</label>
                                             <textarea rows="6" name="descrption" id="descrption" class="required"  placeholder="وصف المنظمة الخيرية"></textarea>
                                                        </p><br>
                                   	
                                                
                                                         <br>
                                                        <p class="text-center">
                  
                                                            <button class="dtr-btn btn-blue" type="submit" name="submit" onclick="validate(); return false;">تسجيل</button>
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
                                                $username1 = "root";
                                                $password = "root";
                                                $dbname = "awondb";

                                                //define DB
                                                $conn = mysqli_connect("$server", "$username1", "$password", "$dbname");

                                                $error = mysqli_connect_error();
                                                if ($error != null) {
                                                echo "<p>Eror!! could not connect to DB may not connect </p>";}
                                               
                                                else { echo 'success connect';}
                                                

                                                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                                                        
                                                    $name = $_POST['name'];
                                                    $username = $_POST['username'];
                                                    $email = $_POST['email'];
                                                    $password = $_POST['password'];
                                                    $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);
                                                    $phone_number = $_POST['phone_number'];
                                                    $license_Number = $_POST['license_Number'];
                                                    $location = $_POST['location'];
                                                    $option = $_POST['service'];
                                                    $type = $_POST['type'];
                                                    $servicetype = "";

                                                    for ($i = 0; $i < sizeof($type); $i++) {
                                                        $servicetype .= $type[$i] . ",";
                                                    }
                                                    $picture = $_POST['picture'];
                                                    $descrption = $_POST['descrption'];

                                                    //cheack from email 
                                                    $sql_chk_email = "select * from charity where email = '$email' ";

                                                    $result = $conn->query($sql_chk_email);

                                                    if ($result->num_rows > 0) {
                                                        $_SESSION['faild'] = 'This email is already exists in our website';
                                                         echo '<META HTTP-EQUIV="Refresh" Content="2; URL=RequestToJoin.php">';
                                                    } else {

                                                        $sql_chk_email = "select * from charity where phone = '$phone_number' ";

                                                        $result = $conn->query($sql_chk_email);

                                                        if ($result->num_rows > 0) {
                                                            $_SESSION['faild'] = 'This phone number is already exists in our website';
                                                               echo '<META HTTP-EQUIV="Refresh" Content="2; URL=RequestToJoin.php">';
                                                        } else {

                                                            $sql_chk_username = "select * from charity where username = '$username' ";

                                                            $res = $conn->query($sql_chk_username);

                                                            if ($res->num_rows > 0) {
                                                                $_SESSION['faild'] = 'This username is already exists in our website';
                                                                 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=RequestToJoin.php">';
                                                            } else {
                                                                
                                                                                                                                                                                                                        
                                                                $query = "INSERT INTO `charity`(name, username, descrption, email, pass, phone, service, donatoionType, location, LicenseNumber, picture, status) VALUES ('$name', '$username', '$descrption' ,'$email', '$password', '$phone_number','$option','$servicetype','$location','$license_Number','$picture','بالانتظار')";
                                                                $run = mysqli_query($conn, $query);


                                                                if ($run) {

                                                                   echo '<script> alert("success Rigester");</script>';
                                                                
                                                                    echo "<script>window.location ='confirmationPage.php';</script>";
                                                                } 
                                                                
                                                                else {
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
                                        function validate() {

                                    var phone = document.getElementById("phone_number").value;
                                    var digit = /^\d{10}$/; //to ensure the phone# input allow only correct address
                                    //1-validate phone number
                                    var checkPhone = phone.match(digit); // must be numbers
                                    if (!checkPhone || phone.length < 10 || phone.length > 10)
                                    {
                                        alert("من فضلك ادخل رقم الجمعية بشكل صحيح");
                                        phone.focus();
                                        return false;
                                    }


                                    var Password = document.getElementById("password").value;
                                    var passworsChar = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                                    var cheackPass = Password.match(passworsChar);
                                    //2-validate password

                                    if (Password.value.length < 8) {

                                        alert("كلمة المرور يجب ان تتكون من ثمان خانات فأكثر ");
                                        Password.focus();
                                        return false;
                                    }

                                if (!cheackPass) {
                                    alert("password should contain atleast one number and one special character");
                                    return false;
                                }
                                
                         if(! swal("Congrats!", ", هل انت متأكد من معلوماتك؟", "success")) {
                                                    return false;}
                        </script>
                        
     
</html>
