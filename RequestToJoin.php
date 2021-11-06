
<?php
session_start();
// if the admin loggedin
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location:joiningRequests.php');
    }
}
// if the admin loggedin
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
                            <div class="main-navigation dtr-menu-dark">
                                <a class="nav-link" href="index.php"">الصفحة الرئيسية</a>
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
                                                        <div class="dtr-form-row dtr-form-row-2col"> <!-- [\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z]+[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z-_] -->
                                                            <p class="dtr-form-column">
                                                                <label for="name">اسم الجمعية الخيرية</label> 
                                                                <input type="text" name="name" id="name"  placeholder="اسم الجمعية الخيرية" pattern="^[\p{InArabic}\p{Latin}-,]+(\s?[\p{InArabic}\p{Latin}-, ])*$" title="يجب أن تتكون من أحرف فقط" required >
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
                                                                <input type="password" name="password" id="password" placeholder="كلمةالمرور" class="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="يجب أن تحتوي على رقم واحد على الأقل وحروف صغيرة وكبيرة وأن لا تكون أقل من ثمان خانات" required >
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                   
<!--                                                     <div>
                                                         <h4>كلمة المرور يجب أن تحتوي على</h4>
                                                         <ol style="center">
                                                             <il>أحرف صغيرة وكبيرة</il><br>
                                                             <il>أرقام</il><br>
                                                             <il>أن لا تكون أقل من ثمان خانات</il> <br><br>
                                                         </ol>
                                                        </div>-->
                                                   
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="phone_number">رقم الجوال</label>
                                                                <input type="tel"  name="phone_number" id="phone_number" placeholder="05xxxxxxxx" maxlength="10" pattern="[0-9]{10}" title="يجب أن يحتوي على أرقام فقط" required >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label  for="license_Number">رقم الترخيص</label>
                                                                <input type="text" name="license_Number" id="license_Number" placeholder="xxx" pattern="[0-9]{,10}" title="يجب أن يحتوي على أرقام فقط" required>
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <p>
                                                            <label  for="location">موقع الجمعية </label>
                                                            <input type="text" name="location" id="location" placeholder="المدينة" pattern="[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z]+[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z-_]" title="يجب أن تحتوي على أحرف فقط " required>
                                                        </p>
                                                        <p><label>وصف المنظمة الخيرية</label> <textarea rows="6" name="descrption" id="message" class="required" placeholder="وصف المنظمة الخيرية"></textarea> </p> 
                                                         
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
                                                                
                                                                                                                                                                                                                        
                                                                $query = "INSERT INTO `charity`(name, username, descrption, email, password, phone, service, donatoionType, location, licenseNumber, picture, status) VALUES ('$name', '$username', '$descrption' ,'$email', '$password', '$phone_number','$option','$servicetype','$location','$license_Number','$picture','بالانتظار')";
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

                        
     
</html>