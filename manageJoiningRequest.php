<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css'>
        <title>manage joining request</title>
    </head> 
    <header id="headerPage" style="padding:128px 16px">
        <img src="logo.jpg" alt="logo" class="pageP"  >
    </header>
    <body>

        <div class="auth-content"> 
            <?php
            echo '<h1>طلبات الاضافة</h1>';
            ?>      
            <table id="manageJoiningRequest">
                <tr>
                    <th>قبول /رفض</th>
                    <th>اسم المنظمة الخيرية </th>
                    <th>صورة المنظمة الخيرية</th>
                <tr>  
                    <td><input type="button" value="قبول" onclick="">
                        <input type="button" value="رفض" onclick=""></td>
                    <td><a href="" id="">اسم المنظمة الخيرية</a></td>
                    <td><img src="pic_trulli.jpg" alt="صورة المنظمة الخيرية"></td>

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

