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
// donation id
$id = $_GET['id'];
$typeo = $_GET['type'];
$color = $_GET['color'];

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
                                        <input type="submit" class="logoutbtn" value="تسجيل خروج" style="font-family: Almarai;">
                                    </form>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="ProfilePage.php" style="font-family: Almarai;">الملف الشخصي</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="donationRequests.php" style="font-family: Almarai;">طلبات التبرع</a>
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
                                                <h2>نموذج تعديل طلب التبرع </h2>
                                                <?php
  
//insert data from form to DB                                                                                                                                                      
    $query = "SELECT * FROM `donation` WHERE donationId='$id'";
                $result = $conn->query($query);
                 while ($row = $result->fetch_assoc()) {
                $descrption = $row['donationDescription'];
                $name = $row['itemName'];
                //$type = $row['itemType'];
                $size = $row['itemSize'];
                $quant = $row['itemCount'];
               // $color = $row['itemColor'];
                }
                if (isset($_POST["Edit"])) { 
                 $descrption = $_POST['descrption'];
                 $name = $_POST['name'];
                 $type = $_POST['type'];
                 $size = $_POST['size'];
                 $quant = $_POST['quantity'];
                 $color = $_POST['color'];   
                    
                $query = "UPDATE `donation` SET `donationDescription`='" . $descrption . "',`itemName`='" . $name . "',`itemType`='" . $type . "',`itemSize`='" . $size . "',`itemColor`='" . $color . "',`itemCount`='" . $quant . "' WHERE donationId='" . $id . "'";
                if ($conn->query($query) === TRUE) {
                    echo '<h1 style="color:green; text-align:center">تم الحفظ</h1>';
                    ?>
                     <META HTTP-EQUIV="Refresh" Content="2; URL=donationRequests.php">
                    <?php
                    } else {
                    echo "الرجاء اعادة المحاولة ";
                 }
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
                                                                <p><label style="font-family: Almarai;">وصف طلب التبرع</label>
                                                                    <textarea rows="4"
                                                                              name="descrption" id="message" class="required"
                                                                              placeholder="عائلة متعففة مكونة من ست أشخاص تحتاج إلى ..." maxlength="255" required><?php echo $descrption ?></textarea>
                                                                <div id="count" style="float: left;">
                                                                    <span id="current">0</span>
                                                                    <span id="maximum">/ 255</span>
                                                                </div>         
                                                                </p>
                                                                <br>  
                                                                <div class="dtr-form-row dtr-form-row-3col"> 
                                                                    <p class="dtr-form-column">
                                                                        <label for="size" style="font-family: Almarai;">المقاس</label>
                                                                        <input type="text" name="size" id="size"
                                                                               placeholder="S,38,مفرد,مزدوج" value="<?php echo $size ?>"required>
                                                                    </p>
                                                                    <p class="dtr-form-column">
                                                                        <label for="name" style="font-family: Almarai;">الصنف</label>
                                                                        <input type="text" name="name" id="name"
                                                                               placeholder="سرير" value="<?php echo $name ?>" required>
                                                                    </p>
                                                                    <p class="dtr-form-column">
                                                                        <label for="type" style="font-family: Almarai;">النوع</label>
                                                                        <select name="type">  
                                                                            <option selected='selected' value="<?php echo $typeo ?>">اختر</option>  
                                                                           <?php for ($i = 0; $i < sizeof($headers); $i++) {
                                                                                ?>  
                                                                                <option value="<?php echo $headers[$i]; ?>"> 
                                                                                    <?php echo $headers[$i]; ?>  
                                                                                </option>
                                                                               
                                                                                <?php
                                                                           }
                                                                                ?>  
                                                                        </select>  
                                                                    </p>  
                                                                </div>
                                                                <div class="dtr-form-row dtr-form-row-2col">
                                                                    <p class="dtr-form-column">
                                                                        <label for=" quant" style="font-family: Almarai;">الكمية</label>
                                                                        <input type="number" id="quantity" name="quantity" min="1" max="100" value="<?php echo $quant ?>">
                                                                    </p>  
                                                                    <p class="dtr-form-column">
                                                                        <label for="color" style="font-family: Almarai;">اللون</label>
                                                                       <select name='color'>
                                                                         <option selected='selected' value="<?php echo $color ?>">اختر</option>  
 <?php
                                                                        foreach ($options as $option) {
                                                                            echo "<option if($option == $color ){echo 'selected='selected''
                                                                                    } value='$option'>$option</option>";
                                                                        }
                                                                        ?>
                                                                       </select>
                                                                </div>  
                                                                </div>
                                                            </fieldset>
                                                            <br>
                                                            <br>
                                                            <p class="text-center">
                                                                <button class="dtr-btn btn-blue" type="submit" id="Edit" name="Edit" style="font-family: Almarai;">حفظ</button>
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
                    <p style="font-family: Almarai;">&copy; فريق منصة عون</p>
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