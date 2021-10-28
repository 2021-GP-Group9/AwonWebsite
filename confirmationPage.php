<!--  see comments in line 10 - 13 - 19  --> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css'>
        <link rel="stylesheet" href="DesignPages.css">
        <script src="webPro.js"></script>
    <header> 
         <!-- logo in the right -->
        <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

      <!-- navbar for charity should include 'الصفحة الرئيسية' which is call CharityPage.php  --> 
        <nav class="topnav">
            <ul>
                <li><a href=".php"></a> </li>
            </ul>
        </nav>
        <!-- log out  as button in the left-->
        <form id="signout" action="logout.php" method="POST">
            <input type="submit" value="تسجيل خروج">

        </form>
    </header>
    <!-- <header id="headerPage" style="padding:28px 16px">
             
             <img src="logo.jpg" alt="logo" class="pageP"  >
         </header>
 </head> --> 
    <body>

        <div class="auth-content"> 
            <hr><br><br>

            <h1>شكرا لإنضمامك لنا</h1>  
            <h2>تم تسجيل طلبك بنجاح وسيتم التواصل معك خلال الإيميل المسجل لإعلامك بإمكانية الدخول</h2>  
            <h4>فريق منصة عون</h4> 
            <br><br> 
            <form id="signout" action="logout.php" method="POST" style="float: none;">
                <input type="submit" class="conf" value="عودة للصفحة الرئسية">
            </form> 
        </div>



    </body>
    <br><br>

    <!-- Footer -->
    <footer>
        <!-- we want footer with  <p>&copy; فريق منصة عون</p>  -->
       
        <p>&copy; فريق منصة عون</p>
    </footer>