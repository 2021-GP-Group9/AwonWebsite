<!--  see comments in line 10 - 13 - 19  --> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel='stylesheet' href='design.css'>
        <link rel="stylesheet" href="DesignBootstrap.css">
        <script src="webPro.js"></script>
    </head> 
    <body>
        <div id="dtr-wrapper" class="clearfix"> 
       
            <!-- Header 
        ============================================= -->
            <header id="dtr-header-global" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <form id="signout" action="logout.php" method="POST">
                                <input type="submit" class="logoutbtn" style="font-family: Almarai;" value="تسجيل خروج">
                            </form>  
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4" align="right">
                            <div class="dtr-header-right"> 
                                <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header ends
        ================================================== --> 

            <!-- == main content area starts == -->
            <div id="dtr-main-content"> 

                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 

                        <!--===== row 1 starts =====-->
                        <div class="row d-flex align-items-center"> 
                            <!-- column 2 starts -->
                            <div class="col-1 col-md-3"></div> 
                            <div class="col-10 col-md-6"> 

                                <!-- heading starts -->
                                <div class="dtr-styled-" align="center">
                                    <h2>شكرا لإنضمامك لنا</h2>
                                    <!-- form starts -->
                                    <p>تم تسجيل طلبك بنجاح وسيتم التواصل معك خلال الإيميل المسجل لإعلامك بإمكانية الدخول</p>
                                    <h4>فريق منصة عون</h4>
                                    <br>
                                    <p class="text-center">
                                        <a class="dtr-btn btn-blue" href="index.php" style="font-family: Almarai;" >عودة للصفحة الرئسية</a>
                                    </p>
                                    <!-- form ends --> 
                                </div>
                                <!-- heading ends --> 
                            </div>
                            <!-- column 2 ends --> 
                        </div>
                        <!--===== row 1 ends =====--> 
                    </div>
                </section>

                
                <footer id="dtr-footer"> 

                    <!--== copyright starts ==-->
                    <div class="dtr-copyright">
                        <div class="container"> 
                            <!--== row starts ==-->
                            <div class="row"> 
                                <!-- column 1 starts -->
                                <div class="col-12 col-md-12" align="center">
                                    <p style="font-family: Almarai;">&copy; فريق منصة عون</p>
                                </div>
                            </div>
                            <!--== row ends ==--> 

                        </div>
                    </div>
                    <!--== copyright ends ==--> 

                </footer>
                <!-- footer section ends
        ================================================== --> 

            </div>
            <!-- == main content area ends == --> 

        </div>
        <!-- #dtr-wrapper ends --> 

        <!-- JS FILES --> 
        <script src="design.js"></script> 
    </body>
</html>