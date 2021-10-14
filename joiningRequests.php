<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
    <header id="headerPage" style="padding:128px 16px">
            <form id="signout" action="logout.php" method="POST">
                <input type="submit" value="تسجيل خروج">
            </form> 
            <img src="logo.jpg" alt="logo" class="pageP"  >
        </header>
    <body>
        
        <div class="auth-content"> 
            <?php
            echo '<h1>نموذج تقديم المنظمات الخيرية</h1>';
            ?>      
            <form method="post" id="JoiningRequestForm" >


                <h2> <br>التسجيل</h2>
                <br>
                <br>

                <input type="text" name="username" id="username" class="name-input" placeholder="اسم المنظمة الخيرية" required>
                <input type="text" name="username" id="username" class="name-input" placeholder="اسم المستخدم "required>
                <input type="text" name="username" id="username" class="name-input" placeholder="" required>
                <br><br>
                <input type="email" name="username" id="username" class="name-input" placeholder="البريد الالكتروني "required>
                <input type="password" name="pwd" class="password" id="password" placeholder="كلمة المرور" required >
                <br><br>

                <input type="number" name="username" id="username" class="name-input" placeholder="رقم الجوال"required><!-- tel or number?  -->
                <input type="number" name="username" id="username" class="name-input" placeholder="رقم الترخيص"required>
                <input type="image" name="username" id="username" class="name-input" placeholder="صورة الملف التعريفي"required><!-- it is uploade not sure -->
                <br><br>
                <input type="url" name="username" id="username" class="name-input" placeholder="الموقع"required><!-- not sure if it is url maybe it is select -->
               <label>هل تتوفر خدمة التوصيل ؟ </label>
                  <input type="radio" name="username" id="username" class="name-input">
                  <label for="نعم">نعم</label>
                  <input type="radio" name="username" id="username" class="name-input">
                  <label for="لا">لا</label>
                <br><br>
                <label>انواع التبرع التي تقبل به المنظمة الخيرية؟</label>
                <input type="checkbox" name="username" id="username" class="name-input">
                <label for="ملابس">ملابس</label>
                <input type="checkbox" name="username" id="username" class="name-input">
                <label for="اثاث">اثاث</label>
                <input type="checkbox" name="username" id="username" class="name-input">
                <label for="الكترونيات">الكترونيات</label>
                <br>


                <input type="submit" class="bu1" value="تسجيل"/>

                <br><br>



                </div>


            


                </body>
    <!-- Footer -->
                <footer class="footer">  
                    <div class="SOCIAL">
                        <br>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                    <p>&copy; KSU|Desigend by Aljawharah, Lamya, Rahaf, Sahar and Leen</p>
                </footer>


                </html>

