<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        $error = NULL;
        ?> 
<?php 
 require('db_connecting.php');
// charity ID
$ID = $_SESSION['ID'];

$descrption = null;
    $name = null;
    $type = null;
    $size = null;
    $quant = null;
    $color = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //declere form input                                   
    $descrption = $_POST['descrption'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $quant = $_POST['quantity'];
    $color = $_POST['color'];

}
?>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no">
                <link rel='stylesheet' href='design.css'>
                <link rel="stylesheet" href="DesignBootstrap.css">
                <title>طلبات التبرع</title>
            </head>  
            <body>
                <div id="dtr-wrapper" class="clearfix"> 

                    <header id="dtr-header-global" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <form id="signout" action="logout.php" method="POST">
                                        <input type="submit" class="logoutbtn" value="تسجيل خروج">
                                    </form>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="ProfilePage.php">الملف الشخصي</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="donationRequests.php">طلبات التبرع</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="CharityPage.php?">المواعيد</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="charityHome.php">الرئيسية</a>
                                    </div>
                                </div>
                                <div class="col-sm-2" align="right">
                                    <div class="dtr-header-right">
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                                                                                      alt="logo" width="108"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
                    <!--main content -->
                    <div id="dtr-main-content"> 
                        <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                            <div class="container mt-100 mb-100"> 
                                <div class="row d-flex align-items-center"> 
                                    <div class="col-1 col-md-3"> 
                                        <div class="col-10 col-md-6" > </div>
                                        <div class="dtr-styled-" align="center" style="width: 1100px;">
                                            <div class="dtr-styled-heading">
                                                <h2>نموذج طلب تبرع جديد  </h2>
                                                <?php
   //insert data from form to DB                                                                                                                                                      
    $query = "INSERT INTO `donation`(`donationId`, `charity_id`, `donationDescription`, `itemName`, `itemType`, `itemSize`, `itemColor`, `itemCount`) VALUES (NULL,'$ID','$descrption','$name','$type','$size','$color','$quant')";
                $run = mysqli_query($conn, $query);
                if ($run) {
                     echo "<h2 style='text-align:center; color:green'>تم حفظ الطلب بنجاح </h2>";
                      echo '<META HTTP-EQUIV="Refresh" Content="2;donationRequests.php">';
                }                             
                                                ?>
                                            </div>
                                            <hr>
                                            <?php
                                            $new_array = array();
                                            $sqli = "SELECT * FROM `charity` WHERE charityId = '$ID'";
                                            $result = $conn->query($sqli);
                                            while ($row = $result->fetch_assoc()) {
                                                $new_array[] = $row['donationType'];
                                                $headers = explode(',', $row['donationType']);
                                            }
                                            //print_r($headers);
                                            //to show colors in dropdown list
                                            $options = array(
                                                'أبيض',
                                                'أحمر',
                                                'أخضر',
                                                'أصفر',
                                                'أزرق',
                                                'أسود',
                                                'برتقالي',
                                                'بنفسجي',
                                                'بني',
                                                'ذهبي',
                                                'رمادي',
                                                'فضي',
                                                'كحلي',
                                                'وردي','غير محدد');
                                            ?>
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="dtr-form">
                                                        <form id="contactform" method="POST" enctype="multipart/form-data" style="direction:rtl;" >
                                                            <fieldset>
                                                               
                                                                <p><label>وصف طلب التبرع</label>
                                                                    <textarea rows="4"
                                                                              name="descrption" id="message" class="required"
                                                                              placeholder="عائلة متعففة مكونة من ست أشخاص تحتاج إلى ..." maxlength="255" 
                                                                              title="يجب تعبئة هذا الحقل" required></textarea>
                                                                <div id="count" style="float: left;">
                                                                    <span id="current">0</span>
                                                                    <span id="maximum">/ 255</span>
                                                                </div>         
                                                                </p>
                                                                <br>  
                                                                <div class="dtr-form-row dtr-form-row-3col"> 
                                                                    <p class="dtr-form-column">
                                                                        <label for="size">المقاس</label>
                                                                        <input type="text" name="size" id="size"
                                                                               placeholder="S,38,مفرد,مزدوج"
                                                                               title="يجب تعبئة هذا الحقل"
                                                                               required>
                                                                    </p>
                                                                    <p class="dtr-form-column">
                                                                        <label for="name">الصنف</label>
                                                                        <input type="text" name="name" id="name"
                                                                               placeholder="سرير" title="يجب تعبئة هذا الحقل" required>
                                                                    </p>
                                                                    <p class="dtr-form-column">
                                                                        <label for="type">النوع</label>
                                                                        <select name="type" title="يجب اختيار النوع" required>  
                                                                             
                                                                            <?php
                                                                            for ($i = 0; $i < sizeof($headers); $i++) {
                                                                                ?>  
                                                                                <option selected='selected' value="<?php echo $headers[$i]; ?>"> 
                                                                                    <?php echo $headers[$i]; ?>  
                                                                                </option>  
                                                                               
                                                                                <?php
                                                                            }
                                                                            ?> 
                                                                                 <option value="" selected='selected'>اختر</option> 
                                                                        </select>  
                                                                    </p>  
                                                                </div>
                                                                <div class="dtr-form-row dtr-form-row-2col">
                                                                    <p class="dtr-form-column">
                                                                        <label for=" quant">الكمية</label>
                                                                        <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" title="يجب إدخال الكمية" required>
                                                                    </p>  
                                                                    <p class="dtr-form-column">
                                                                        <label for="color">اللون</label>
                                                                        <?php
                                                                        echo "<select name='color' title='يجب اختيار لون''required>";
                                                                        foreach ($options as $option) {
                                                                            echo "<option selected='selected' value='$option'>$option</option>";
                                                                        }
                                                                        echo "</select>";
                                                                        ?>  
                                                                </div>  
                                                                </div>
                                                            </fieldset>
                                                            <br>
                                                            <br>
                                                            <p class="text-center">
                                                                <button class="dtr-btn btn-blue" type="submit" name="submit"
                                                                        >حفظ</button>
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

                        <?php
                    }
                }
                ?>
            </div>

        </div>

    </div>

</div>
</section>   
</body>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $('textarea').keyup(function () {
        var characterCount = $(this).val().length,
                current_count = $('#current'),
                maximum_count = $('#maximum'),
                count = $('#count');
        current_count.text(characterCount);
    });
</script>
</html>