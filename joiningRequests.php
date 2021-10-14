<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
    <body>
        <header id="headerPage" style="padding:128px 16px">
            <form id="signout" action="logout.php" method="POST">
                <input type="submit" value="تسجيل خروج">
            </form> 
            <img src="logo.jpg" alt="logo" class="pageP"  >
        </header>
        <div class="auth-content"> 
            <?php
            echo '<h1>نموذج تقديم المنظمات الخيرية</h1>';
            ?>      
            <form method="post" id="JoiningRequestForm" >


                <h2> <br>التسجيل</h2>
                <br>
                <br>

                <input type="text" name="username" id="username" class="name-input" placeholder="اسم المنظمة الخيرية" required>
                <input type="text" name="username" id="username" class="name-input" placeholder="اسمالمستهجم الخيرية"required>
                <br>



                <label class="name"><h3><input type="password" name="pwd" class="password" id="password">كلمة المرور: </label></h3>
                    <br>


                    <input type="submit" class="bu1" value="تسجيل الدخول"/>

                    <br><br>

                    <p>جمعية جديدة? <a href ="signup.php" > تسجيل جديد </a></p> 


                    </div>


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



                    </body>


                    </html>

