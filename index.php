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

            <!-- main content -->
            <div id="dtr-main-content"> 
                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 
                        <div class="row d-flex align-items-center"> 
                            <div class="col-12 col-md-6 small-device-space">

                                <div class="dtr-pr-30" align="center"> 
                                    <a href="login.php" class="dtr-btn btn-blue dtr-mt-30 f25">تسجيل دخول</a>
                                    <a href="RequestToJoin.php" class="dtr-btn btn-white dtr-mt-30 f25">طلب الإنضمام</a>

                                </div>
                            </div>

                            <div class="col-12 col-md-6"> 

                                <div class="dtr-styled-heading">
                                    <h2>من نحن</h2>
                                    <p>عون هي منصة خيرية تهدف لجمع الجمعيات الخيرية في مكان واحد من خلال نظام يسهل عملية التبرع والتواصل مع المتبرعين واستقبال تبرعاتهم</p>

                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <br><br>
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
        <script>

            function login() {
                window.location = "login.php";
            }
            function signUp() {
                window.location = "RequestToJoin.php";
            }

        </script>
</html>

