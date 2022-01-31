<?php
session_start();
$ID = $_SESSION['ID'];
$server = "localhost";
$username = "id17983305_awon";
$password = "4S7r%KQ6O6(uC|+&";
$dbname = "id17983305_awomdb";

$conn = mysqli_connect("$server", "$username", "$password", "$dbname");

$error = mysqli_connect_error();
if ($error != null) {
    echo "<p>Eror!! could not connect to DB may not connect </p>";
}
$options = array(
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
    </head>
    <body>
        <div id="dtr-wrapper" class="clearfix"> 
            
            <!-- Header -->
           
<header id="dtr-header-global" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <form id="signout" action="logout.php" method="POST">
                                        <input type="submit" class="logoutbtn" style="font-family: Almarai;" value="تسجيل خروج">
                                    </form>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;" >طلبات التبرع</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="CharityPage.php?" style="font-family: Almarai;">المواعيد</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="charityHome.php" style="font-family: Almarai;">الرئيسية</a>
                                    </div>
                                </div>
                                <div class="col-sm-3" align="right">
                                    <div class="dtr-header-right">
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                                                                                      alt="logo" width="108"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
            <!-- main content -->
            <div id="dtr-main-content"> 

                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 
                        <div class="row d-flex align-items-center"> 
                            <div class="col-1 col-md-2"></div> 
                            <div class="col-12 col-md-8"> 
                                <div class="dtr-styled-" align="center">
                                    <?php
                                    $option = "";

                                    $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";
                                    $result = $conn->query($sqli);
                                    $row = $result->fetch_assoc();
                                    $name = $row['name'];
                                    $username = $row['username'];
                                    $pass = $row['password'];
                                    $email = $row['email'];
                                    $PhoneNumber = $row['phone'];
                                    $location = $row['location'];
                                    $descrption = $row['descrption'];
                                    $option = $row['service'];
                                    $type = $row['donationType'];
                                    $picture = $row['picture'];
                                     $city = $row['city'];
                                    ?>
                                    <div class="dtr-styled-heading">
                                        <h2>إدارة الملف الشخصي</h2>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-12 col-md-12"> 
                                            <!-- Form entered data -->
                                            <?php
                                            if (isset($_POST["Edit"])) {
                                                echo "<h1>تعديل بيانات الحساب</h1>";
                                                $name = $_POST['name'];
                                                $username = $_POST['username'];
                                                $email = $_POST['email'];
                                                $PhoneNumber = $_POST['phone_number'];
                                                $location = $_POST['location'];
                                                $description = $_POST['description'];
                                                $option = $_POST['pickup_servise'];
                                                $type = $_POST['types'];
                                                $city = $_POST['city'];
                                                $servicetype = implode(",", $type);

                                                $picture = $_FILES['img']['name'];

                                                $sql = "select * from charity where (username='$username' or email='$email' or phone='$PhoneNumber') AND charityId<>$ID";
                                                // To retrive charity info
                                                $sql1 = "Select * from charity WHERE charityId='$ID'";
                                                $res1 = mysqli_query($conn, $sql1);
                                                $row1 = mysqli_fetch_assoc($res1);

                                                $res = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($res) > 0) {
                                                    $row = mysqli_fetch_assoc($res);
                                                    // To compare charity info with entered info
                                                    if ($email == isset($row['email']) && $email != $row1['email']) {
                                                        echo "<h3 style='color:red; text-align:center'>الايميل موجود بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                                                    }

                                                    if ($username == isset($row['username']) && $username != $row1['username']) {
                                                        echo "<h3 style='color:red; text-align:center'>اسم المستخدم موجود بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                                                    }

                                                    if ($PhoneNumber == isset($row['phone']) && $PhoneNumber != $row1['phone']) {
                                                        echo "<h3 style='color:red; text-align:center'>رقم الجوال مستخدم بالفعل</h3>";
                                                        echo '<META HTTP-EQUIV="Refresh" Content="2; URL=ProfilePage.php">';
                                                    }
                                                } else {

                                                    // Update query *

                                                    $query = "UPDATE charity SET name='" . $name . "', username='" . $username . "', email='" . $email . "',
                     phone='" . $PhoneNumber . "', service='" . $option . "', donationType='" . $servicetype . "', location='" . $location . "', descrption='" . $description . "',city='" . $city . "' WHERE charityId='" . $ID . "'";

                                                    if ($conn->query($query) === TRUE) {
                                                        echo '<h1 style="color:green; text-align:center">تم الحفظ</h1>';
                                                        ?>
                                                        <META HTTP-EQUIV="Refresh" Content="3; URL=charityHome.php">
                                                        <?php
                                                    } else {
                                                        echo "الرجاء اعادة المحاولة ";
                                                    }
                                                }
                                            }
                                            ?> 
                                            <!-- Profile form -->

                                            <div class="dtr-form">

                                                <form method="post" id="ManageTheProfile" enctype="multipart/form-data" ">
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-4col">
                                                            <p class="dtr-form-column">
                                                                <label for="name" style="font-family: Almarai;direction: rtl;">اسم المنظمة الخيرية</label> 
                                                                <input type="text" size="10" name="name" placeholder="اسم المستخدم" id="name" pattern="^[\p{InArabic}\p{Latin}-,]+(\s?[\p{InArabic}\p{Latin}-, ])*$" title="يجب أن تتكون من أحرف فقط"  value= "<?php echo $name ?>" >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="username" style="font-family: Almarai;direction: rtl;">اسم المستخدم</label>
                                                                <input type="text" name="username" id="username" placeholder="اسم المنظمة الخيرية" required value= "<?php echo $username ?>">
                                                            </p>
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>	
                                                        <div class="dtr-form-row dtr-form-row-2col">
                                                            <p class="dtr-form-column">
                                                                <label for="password" style="font-family: Almarai;direction: rtl;">البريد الالكتروني</label>
                                                                <input type="email" name="email" id="email" placeholder="البريد الالكتروني" required value= "<?php echo $email ?>"  >
                                                            </p>
                                                            <p class="dtr-form-column">
                                                                <label for="phone_number" style="font-family: Almarai;direction: rtl;">رقم الجوال</label>
                                                                <input type="tel" name="phone_number" placeholder="" id="phone_number" maxlength="10" pattern="[0-9]{,15}" title="يجب أن يحتوي على أرقام فقط" required value= "0<?php echo $PhoneNumber ?>">
                                                            </p>
                                                            
                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="dtr-form-row dtr-form-row-4col">
                                                          <p class="dtr-form-column">
                                                            <label for="phone_number"style="font-family: Almarai;direction: rtl;">المنطقة الإدارية</label>
                                                            <?php echo "<select name='city'>";
                                                             echo "<option selected='selected' value='$city'>اختر المنطقة</option>";
                                                                        foreach ($options as $optionq) {
                                                                            echo "<option value='$optionq'>$optionq</option>";
                                                                        }
                                                                        echo "</select>"; 
                                                        ?>                                                            </p>
                                                           <p class="dtr-form-column">
                                                                <label  for="location" style="font-family: Almarai;direction: rtl;">عنوان الجمعية</label>
                                                                <input type="text" name="location" id="location" placeholder="الموقع"  required  value= "<?php echo $location ?>">
                                                            </p>
                                                        </div>
                                                        
                                                    </fieldset>
                                                    <fieldset>	

                                                        <p>
                                                            <label  for=""style="font-family: Almarai;">هل تتوفر خدمة التوصيل ؟ </label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="نعم" name="pickup_servise" <?php if ($option == 'نعم') echo " checked" ?> ><h6>نعم</h6>
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" value="لا" name="pickup_servise" <?php if ($option == 'لا') echo " checked" ?>><h6>لا</h6>
                                                            </label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <?php
                                                            $headers = explode(',', $type);
                                                            ?>                                                             
                                                            <label  for="" style="font-family: Almarai;">انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="types[]" id="type_of_donation"  value="ملابس" <?php
                                                                if (in_array('ملابس', $headers)) {
                                                                    echo "checked ";
                                                                }
                                                                ?>
                                                                       ><h6>ملابس</h6>
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

                                                                       ><h6>اثاث</h6>
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="types[]" id="type_of_donation" value="الكترونيات" <?php
                                                                if (in_array('الكترونيات', $headers)) {
                                                                    echo " checked ";
                                                                }
                                                                ?>  ><h6>الكترونيات</h6>

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

                                                                       ><h6>كتب ورق </h6>   </label>


                                                        </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label style="font-family: Almarai;">صورة الملف التعريفي</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"  name="img" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <label style="font-family: Almarai;">وصف المنظمة الخيرية</label>
                                                            <textarea rows="6" name="description" id="message" class="required"  placeholder="وصف المنظمة الخيرية" value="" style="direction: rtl;"><?php echo $descrption ?></textarea>
                                                        </p><br>
                                                        <p class="text-center">
                                                            <button class="dtr-btn btn-blue" id="Edit" name="Edit"  type="submit"  onclick="return validate();" style="font-family: Almarai;">حفظ</button>
                                                        </p>
                                                    </fieldset>
                                                </form>
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

        <script>


            function validate(form) {
                // validate entered phone number
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

                var myPassword = document.getElementById("password");
                var newPass = document.getElementById("password").value;
                var passworsChar = /^[a-zA-Z0-9!@#$%^&*]{8,}$/;
                var cheackPass = document.getElementById("password").value.match(passworsChar);

                this.form.submit();
            }


        </script>
</html>
