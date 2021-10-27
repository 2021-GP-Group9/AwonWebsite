<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css'>
        <link rel="stylesheet" href="DesignPages.css">
        <!-- Header Sahar & Aljawharah is heeeereeee -->
    <header> 
        <img src="log1.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">
        <div style="float: right;">
            <nav class="topnav">
                <ul>
                    <li><a href="">الصفحة الرئيسية</a> </li>
                    <li><a href="">test</a></li>
                    <li><a href="">test</a></li>
                    <li><a href="index.php">تسجيل خروج</a></li>
                </ul> </nav></div>

    </header>
    <!-- <header id="headerHome"  style="padding:128px 16px">
       <img src="logo.jpg" alt="logo" class="homeP"  >
       
    <br>
    <br>
    
       <i id="bu"> <button class="bu1" onclick="login();return false;">تسجيل دخول </button>
           <button class="bu1"  onclick="signUp();return false;">طلب الإنضمام</button></i>
      
        
    </header> --> 
</head> 
<body>

    <i id="bu"> <button class="bu1" onclick="login();return false;">تسجيل دخول </button>
        <button class="bu1"  onclick="signUp();return false;">طلب الإنضمام</button></i>
    <!-- First Grid -->
    <div class="who">
        <h1>من نحن</h1>
        <br
            <h5 class="who">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>
        <br>




    </div>








</body>

<!-- Footer -->
<footer>
    <!-- الفوتر فيه الكوبي رايت ويتغير شكله ولونه يصير أخضر عشبي 
ويصير بالعربي وخليه فريق منصة عون بدل اسماءنا -->
    <!--<div class="SOCIAL">
        <br>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
    </div>-->
    <p>&copy; فريق منصة عون</p>
</footer>

<script>

    function login() {
        window.location = "login.php";
    }
    function signUp() {
        window.location = "RequestToJoin.php";
    }

</script>
</html>

