
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
            <!-- main content  -->
            <div id="dtr-main-content"> 
                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 
                        <div class="row d-flex align-items-center"> 
                            <div class="col-1 col-md-2"></div> 
                            <div class="col-12 col-md-8"> 
                                <div class="dtr-styled-" align="center">

                                    <div class="dtr-styled-heading">
                                        <h2>نموذج طلب انضمام المنظمات الخيرية</h2>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-12 col-md-12"> 
                                            <div class="dtr-form">
                                                <?php
                                                if (isset($_SESSION['faild'])) {
                                                    echo "<span style='color:red'>" . $_SESSION['faild'] . "</span>";
                                                }
                                                $_SESSION['faild'] = null;
                                                ?>
                                                <form id="contactform" method="POST"> 
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="name">اسم الجمعية الخيرية</label> 
                                                                <input type="text" name="name" id="name"  placeholder="اسم الجمعية الخيرية" pattern="^[\p{InArabic}\p{Latin}-,]+(\s?[\p{InArabic}\p{Latin}-, ])*$" title="يجب أن تتكون من أحرف فقط" required > <!-- use pattren to ensure the name contain just arabic litters or english litters -->
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
                                                                <input type="password" name="password" id="password" placeholder="كلمة المرور" class="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="يجب أن تحتوي على رقم واحد على الأقل وحروف صغيرة وكبيرة وأن لا تكون أقل من ثمان خانات" required > <!-- use some constrain to ensure the user enter strong password -->
                                                            </p>
                                                        </div>
                                                    </fieldset>

                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="phone_number">رقم الجوال</label>
                                                                <input type="tel"  name="phone_number" id="phone_number" placeholder="xxxxxxxxxx" pattern="[0-9]{,15}" title="يجب أن يحتوي على أرقام فقط" required >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label  for="license_Number">رقم الترخيص</label>
                                                                <input type="text" name="license_Number" id="license_Number" placeholder="xxx" pattern="[0-9]{,10}" title="يجب أن يحتوي على أرقام فقط" required>
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                       
                                                        <p class="dtr-form-column">
                                                            <label  for="location">عنوان المنظمة الخيرية</label>
                                                            <input type="text" name="location" id="location" placeholder="الحي الشارع رقم المبنى" required>
                                                        </p>
                                                         <p class="dtr-form-column">
                                                            <label  for="location">المدينة</label>
                                                            <input type="text" name="city" id="city" placeholder="المدينة" pattern="[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z]+[\u0600-\u065F\u066A-\u06EF\u06FA-\u06FFa-zA-Z-_]" title="يجب أن تحتوي على أحرف فقط " required>
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
                                                </form>
                                                <?php
                                                $server = "localhost";
                                                $username1 = "root";
                                                $password = "root";
                                                $dbname = "awondb";
                                                //define DB
                                                $conn = mysqli_connect("$server", "$username1", "$password", "$dbname");
                                                // handele eroor conection
                                                $error = mysqli_connect_error();
                                                if ($error != null) {
                                                    echo "<p>Eror!! could not connect to DB may not connect </p>";
                                                }
                                                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                                    //declere form input                                   
                                                    $name = $_POST['name'];
                                                    $username = $_POST['username'];
                                                    $email = $_POST['email'];
                                                    $password = $_POST['password'];
                                                    $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);
                                                    $phone_number = $_POST['phone_number'];
                                                    $license_Number = $_POST['license_Number'];
                                                    $city = $_POST['city'];
                                                    $location = $_POST['location'];
                                                    $option = $_POST['service'];
                                                    $type = $_POST['type'];
                                                    $servicetype = "";

                                                    for ($i = 0; $i < sizeof($type); $i++) {
                                                        $servicetype .= $type[$i] . ",";
                                                    }
                                                    $picture = $_POST['picture'];
                                                    $descrption = $_POST['descrption'];

                                                    //cheack the email if existen befor or not
                                                    $sql_chk_email = "select * from charity where email = '$email' ";

                                                    $result = $conn->query($sql_chk_email);

                                                    if ($result->num_rows > 0) {
                                                        $_SESSION['faild'] = "<h3 style='color:red; text-align:center'>البريد الألكتروني موجود بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=RequestToJoin.php">';
                                                    } else {
                                                        //cheack the phone# if existen befor or not
                                                        $sql_chk_email = "select * from charity where phone = '$phone_number' ";

                                                        $result = $conn->query($sql_chk_email);

                                                        if ($result->num_rows > 0) {
                                                            $_SESSION['faild'] = "<h3 style='color:red; text-align:center'>رقم الجوال مستخدم بالفعل</h3>";
                                                            echo '<META HTTP-EQUIV="Refresh" Content="2; URL=RequestToJoin.php">';
                                                        } else {
                                                            //cheack the username if existen befor or not
                                                            $sql_chk_username = "select * from charity where username = '$username' ";

                                                            $res = $conn->query($sql_chk_username);

                                                            if ($res->num_rows > 0) {
                                                                $_SESSION['faild'] = "<h3 style='color:red; text-align:center'>اسم المستخدم موجود بالفعل</h3>";
                                                                echo '<META HTTP-EQUIV="Refresh" Content="2; URL=RequestToJoin.php">';
                                                            } else {

                                                                //insert data from form to DB                                                                                                                                                      
                                                                $query = "INSERT INTO `charity`(name, username, descrption, email, password, phone,city, service, donationType, location, licenseNumber, picture, status) VALUES "
                                                                        . "('$name', '$username', '$descrption' ,'$email', '$password', '$phone_number','$city','$option','$servicetype','$location','$license_Number','$picture','بالانتظار')";
                                                                $run = mysqli_query($conn, $query);

                                                                if ($run) {

                                                                    echo "<script>window.location ='confirmationPage.php';</script>";
                                                                } else {
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                </body>
                <!-- Footer -->
                <footer id="dtr-footer"> 
                    <div class="dtr-copyright">
                        <div class="container"> 
                            <div class="row"> 
                                <div class="col-12 col-md-12" align="center">
                                    <p>&copy; فريق منصة عون</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
</html>
