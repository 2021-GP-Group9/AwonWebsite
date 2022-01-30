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
<?php
require('db_connecting.php');
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
   if($type != null){
    for ($i = 0; $i < sizeof($type); $i++) {
        $servicetype .= $type[$i] . ",";
    }}
    //$picture = $_POST['picture'];
    $descrption = $_POST['descrption'];

    $filename = time() . '_' . $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;


    //cheack the email if existen befor or not
    $sql_chk_email = "select * from charity where email = '$email' ";

    $result = $conn->query($sql_chk_email);

    if ($result->num_rows > 0) {
        $_SESSION['faild'] = "<h3 style='color:red; text-align:center'>البريد الألكتروني موجود بالفعل</h3>";
        echo '<META HTTP-EQUIV="Refresh" Content="10; URL=RequestToJoin.php">';
    } else {
        //cheack the phone# if existen befor or not
        $sql_chk_email = "select * from charity where phone = '$phone_number' ";

        $result = $conn->query($sql_chk_email);

        if ($result->num_rows > 0) {
            $_SESSION['faild'] = "<h3 style='color:red; text-align:center'>رقم الجوال مستخدم بالفعل</h3>";
            echo '<META HTTP-EQUIV="Refresh" Content="10; URL=RequestToJoin.php">';
        } else {
            //cheack the username if existen befor or not
            $sql_chk_username = "select * from charity where username = '$username' ";

            $res = $conn->query($sql_chk_username);

            if ($res->num_rows > 0) {
                $_SESSION['faild'] = "<h3 style='color:red; text-align:center'>اسم المستخدم موجود بالفعل</h3>";
                echo '<META HTTP-EQUIV="Refresh" Content="10; URL=RequestToJoin.php">';
            } else {

                //insert data from form to DB                                                                                                                                                      
                $query = "INSERT INTO `charity`(name, username, descrption, email, password, phone,city, service, donationType, location, licenseNumber, picture, status) VALUES "
                    . "('$name', '$username', '$descrption' ,'$email', '$password', '$phone_number','$city','$option','$servicetype','$location','$license_Number','$filename','بالانتظار')";
                $run = mysqli_query($conn, $query);

                move_uploaded_file($_FILES['uploadfile']['tmp_name'], $folder);



                if ($run) {

                    echo "<script>window.location ='confirmationPage.php';</script>";
                } else {
                }
            }
        }
    }
}$options = array(
                                                'منطقة الرياض',
                                                'منطقة مكة المكرمة',
                                                'منطقة المدينة المنورة',
                                                'منطقة القصيم',
                                                'المنطقة الشرقية',
                                                'منطقة عسير',
                                                'منطقة تبوك',
                                                'منطقة حائل',
                                                'منطقة الحدود الشمالية',
                                                'منطقة جازان',
                                                'منطقة نجران',
                                                'منطقة الباحة',
                                                'منطقة الجوف',
                                               );
                                            
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
                            <a class="nav-link" href="index.php" style="font-family: Almarai;">الصفحة الرئيسية</a>
                            </div>
                        </div>
                        <div class=" col-sm-4" align="right">
                                <div class="dtr-header-right">
                                    <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                            alt="logo" width="108"></a>
                                </div>
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
                                <?php
if (isset($_SESSION['faild'])) {
    echo "<span style='color:red'>" . $_SESSION['faild'] . "</span>";
}
$_SESSION['faild'] = null;
?>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="dtr-form">

                                            <form id="contactform" method="POST" enctype="multipart/form-data" style="direction:rtl;">
                                                <fieldset>
                                                    <div class="dtr-form-row dtr-form-row-2col">
                                                        <p class="dtr-form-column">
                                                            <label for="name" style="font-family: Almarai;">اسم الجمعية الخيرية</label>
                                                            <input type="text" name="name" id="name"
                                                                placeholder="اسم الجمعية الخيرية"
                                                                pattern="^[\p{InArabic}\p{Latin}-,]+(\s?[\p{InArabic}\p{Latin}-, ])*$"
                                                                title="يجب أن تتكون من أحرف فقط" required>
                                                            <!-- use pattren to ensure the name contain just arabic litters or english litters -->
                                                        </p>
                                                        <p class="dtr-form-column">
                                                            <label for="username" style="font-family: Almarai;">اسم المستخدم</label>
                                                            <input type="text" name="username" id="username"
                                                                placeholder="اسم المستخدم" required>
                                                        </p>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="dtr-form-row dtr-form-row-2col">
                                                        <p class="dtr-form-column">
                                                            <label for=" email" style="font-family: Almarai;">البريد الالكتروني</label>
                                                            <input type="email" name="email" id="email"
                                                                placeholder="البريد الالكتروني" required>
                                                        </p>
                                                        <p class="dtr-form-column">
                                                            <label for=" password" style="font-family: Almarai;">كلمةالمرور</label>
                                                            <input type="password" name="password" id="password"
                                                                placeholder="كلمة المرور" class="password"
                                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                                title="يجب أن تحتوي على رقم واحد على الأقل وحروف صغيرة وكبيرة وأن لا تكون أقل من ثمان خانات"
                                                                required>
                                                            <!-- use some constrain to ensure the user enter strong password -->
                                                        </p>
                                                    </div>
                                                </fieldset>

                                                <fieldset>
                                                    <div class="dtr-form-row dtr-form-row-2col">
                                                        <p class="dtr-form-column">
                                                            <label for="phone_number" style="font-family: Almarai;">رقم الجوال</label>
                                                            <input type="tel" name="phone_number" id="phone_number"
                                                                placeholder="xxxxxxxxxx" pattern="[0-9]{,15}"
                                                                title="يجب أن يحتوي على أرقام فقط" required>
                                                        </p>
                                                        <p class="dtr-form-column">
                                                            <label for="license_Number" style="font-family: Almarai;">رقم الترخيص</label>
                                                            <input type="text" name="license_Number" id="license_Number"
                                                                placeholder="xxx" pattern="[0-9]{,10}"
                                                                title="يجب أن يحتوي على أرقام فقط" required>
                                                        </p>
                                                    </div>
                                                </fieldset>
                                                <fieldset>

                                                    <p class="dtr-form-column">
                                                        <label for="location" style="font-family: Almarai;">عنوان المنظمة الخيرية</label>
                                                        <input type="text" name="location" id="location"
                                                            placeholder="المدينة الحي الشارع رقم المبنى" required>
                                                    </p>
                                                    <p class="dtr-form-column">
                                                        <label for="location" style="font-family: Almarai;">المنطقة الإدارية</label>
                                                       <?php echo "<select name='city'>";
                                                             echo "<option selected='selected' value=''>اختر المنطقة</option>";

                                                                        foreach ($options as $option) {
                                                                            echo "<option selected='' value='$option'>$option</option>";
                                                                        }
                                                                        echo "</select>"; 
                                                        ?>
                                                    </p>
                                                    <p><label style="font-family: Almarai;">وصف المنظمة الخيرية</label> <textarea rows="6"
                                                            name="descrption" id="message" class="required"
                                                            placeholder="وصف المنظمة الخيرية" required></textarea> </p>

                                                    <p>
                                                        <label style="font-family: Almarai;">هل تتوفر خدمة استلام للتبرعات ؟ </label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" id="yes"
                                                                   name="service" value="نعم" required><h6>نعم</h6>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" id="no"
                                                                name="service" value="لا"><h6>لا</h6>
                                                        </label>
                                                    </div>
                                                    </p>
                                                    <p>
                                                        <label style="font-family: Almarai;">انواع التبرعات التي تقبل به المنظمة الخيرية؟</label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="type[]" id="clothes" value="ملابس" ><h6>ملابس</h6>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="type[]" id="furniture" value="اثاث"><h6>اثاث</h6>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="type[]" id="electronic"
                                                                value="الكترونيات"><h6>الكترونيات</h6>
                                                        </label>
                                                    </div>

                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="type[]" id="books" value="كتب_ورق"><h6>كتب ورق </h6>
                                                        </label>
                                                    </div>
                                                    </p>
                                                    <p>
                                                        <label style="font-family: Almarai;">صورة الملف التعريفي</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="uploadfile"
                                                            name="uploadfile">
                                                        <label class="custom-file-label" for="uploadfile" style="font-family: Almarai;">إرفاق الصورة
                                                        </label>
                                                    </div>
                                                    </p>
                                                    <br>
                                                    <br>
                                                    <p class="text-center">
                                                        <button class="dtr-btn btn-blue" type="submit" name="submit" style="font-family: Almarai;"
                                                            >تسجيل</button>
                                                    </p>
                                                </fieldset>
                                            </form>

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
                    <p style="font-family: Almarai;">&copy; فريق منصة عون</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

</html>