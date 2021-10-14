<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='style.css'>
    <!-- Header -->

    <header id="headerPage" style="padding:128px 16px">
        <img src="logo.jpg" alt="logo" class="pageP"  >

    </header>
    <body>
        <div class="auth-content"> 
            <?php
            // put your code here
            ?>
            <!-- we will bring it from the database -->
            <table id="manageJoiningRequest">
                <tr>
                    <th><img src="src" alt="صورة المنظمة الخيرية"/> 
                    </th>

                </tr>

                <tr>
                    <!-- bring charity name from database  -->
                    <th><p> اسم المنظمة الخيرية </p>
                    </th>

                </tr>

                <tr>
                    <!-- bring charity username from database  -->
                    <th><p> اسم المستخدم </p>
                    </th>

                </tr>

                <tr>
                    <!-- bring charity liceane number from database  -->
                    <th><p>رقم الترخيص</p>
                    </th>

                </tr>

                <tr>
                    <!-- bring charity email from database  -->
                    <th><p>البريد الالكتروني </p>
                    </th>

                </tr>

                <tr>
                    <!-- bring charity type of donation number from database  -->
                    <th><p>الموقع</p>
                    </th> 

                </tr>

                <tr>
                    <!-- bring charity phone number from database  -->
                    <th><p>رقم الجوال </p>
                    </th>

                </tr>

                <tr>
                    <!-- bring charity description from database  -->
                    <th><p>وصف المنظمة الخيرية</p>
                    </th>

                </tr>



                <tr>
                    <!-- bring charity PICKUP number from database  -->
                    <th><p>توافر خدمة التوصيل</p>
                    </th> 

                </tr>

                <tr>
                    <!-- bring charity type of donation number from database  -->
                    <th><p>انواع التبرع التي تقبل به المنظمة الخيرية</p>
                    </th> 

                </tr>


                <br><br>
                <tr>
                    <td> <br><br><input type="button" value="قبول" onclick="">
                        <input type="button" value="رفض" onclick=""></td>

                </tr>

            </table>
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
