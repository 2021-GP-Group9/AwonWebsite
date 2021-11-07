<!--  see comments in line 11 - 37 - 55  --> <!-- this is a home page we want special design here --><!-- also we want sweetalerts for all the project -->
<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel='stylesheet' href='DesignBootstrap.css'>
        <link rel="stylesheet" href="design.css">

    </head> 
    <body>
        <div id="dtr-wrapper" class="clearfix"> 
            <header>
                <header id="dtr-header-global" class="">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4" align="right">
                                <div class="dtr-header-right"> 
                                    <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg" alt="logo" width="108"></a></div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- == main content area starts == -->
                <div id="dtr-main-content"> 

                    <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                        <div class="container mt-100 mb-100"> 

                            <!--===== row 1 starts =====-->
                            <div class="row d-flex align-items-center"> 

                                <!-- column 1 starts -->
                                <div class="col-12 col-md-6 small-device-space">
                                    <div class="dtr-pr-30" align="center"> 
                                        <a href="login.php" class="dtr-btn btn-blue dtr-mt-30 f25">تسجيل دخول</a>
                                        <a href="RequestToJoin.php" class="dtr-btn btn-white dtr-mt-30 f25">طلب الإنضمام</a>
                                    </div>
                                </div>
                                <!-- column 1 ends --> 

                                <!-- column 2 starts -->
                                <div class="col-12 col-md-6"> 

                                    <!-- heading starts -->
                                    <div class="dtr-styled-heading">
                                        <h2>من نحن</h2>
                                        <p>عون هي منصة خيرية تهدف لجمع الجمعيات الخيرية في مكان واحد من خلال نظام يسهل عملية التبرع والتواصل مع المتبرعين واستقبال تبرعاتهم</p>

                                    </div>
                                    <!-- heading ends --> 
                                </div>
                                <!-- column 2 ends --> 
                            </div>
                            <!--===== row 1 ends =====--> 
                        </div>
                    </section>


                    <br><br>

                    </body>


                    <!-- Footer -->
                    <footer id="dtr-footer"> 

                        <!--== copyright starts ==-->
                        <div class="dtr-copyright">
                            <div class="container"> 
                                <!--== row starts ==-->
                                <div class="row"> 
                                    <!-- column 1 starts -->
                                    <div class="col-12 col-md-12" align="center">
                                        <p>&copy; فريق منصة عون</p>
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
        <script src="design.js"></script> 
        <script>

            function login() {
                window.location = "login.php";
            }
            function signUp() {
                window.location = "RequestToJoin.php";
            }

        </script>
    </body>
</html>

