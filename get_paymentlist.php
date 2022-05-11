<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'charity') {
        $error = NULL;
        


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.moyasar.com/v1/payments?metadata[charity_id]='.$_SESSION['ID'] ,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic c2tfdGVzdF9pc2Y0TEtCZ2R1Z3NhY284SGRTazdQbTYzUXh2ZEZHbW5DUGV4NjNwOg=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
 $myObj = json_decode($response, true);
//echo $myObj["payments"][0]['id'];

//echo sizeof($myObj["payments"]);

?>

        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="format-detection" content="telephone=no">
                <link rel='stylesheet' href='design.css'>
                <link rel="stylesheet" href="DesignBootstrap.css">
                <title>قائمة التبرعات</title>
            </head>  
            <body>
                <div id="dtr-wrapper" class="clearfix"> 

                    <header id="dtr-header-global" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form id="signout" action="logout.php" method="POST">
                                        <input type="submit" class="logoutbtn" style="font-family: Almarai;" value="تسجيل خروج">
                                    </form>
                                </div>
                                
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="charityChat.php" style="font-family: Almarai;" >محادثات</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="get_paymentlist.php" style="font-family: Almarai;">قوائم التبرعات</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="CharityPage.php?" style="font-family: Almarai;">المواعيد</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">
                                        <a class="nav-link" href="ProfilePage.php" style="font-family: Almarai;">الملف الشخصي</a>
                                    </div>
                                </div>
                                <div class="col" ><br>
                                    <div class="main-navigation dtr-menu-dark">

                                        <a class="nav-link" href="charityHome.php" style="font-family: Almarai;">الرئيسية</a>
                                    </div>
                                </div>

                                <div class="col" align="right">
                                    <div class="dtr-header-right">
                                        <a class="logo-default dtr-scroll-link" href="index.php"><img src="finalLogo.jpeg"
                                                                                                      alt="logo" width="108"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </header>
					
					
					
					
					
					 </div> 
            <div id="dtr-main-content"> 
                <section id="about" class="dtr-section dtr-py-100 bg-light-blue">
                    <div class="container mt-100 mb-100"> 
                        <div class="row d-flex align-items-center"> 
                            <div class="col-1 col-md-3"> 
                                <div class="col-10 col-md-6" > </div>
                                <div class="dtr-styled-" align="center" style="width: 1200px;">
                                      <hr>
                             
                                     <hr>
                                        <h3 align="center">عرض قوائم التبرعات  </h3>
                                        
                
                <?php
                echo'<table dir="rtl" class="table table-bordered" style="width: 1000px; margin: 10px auto; background: #FFF">
                                    <tr class="active">
                                    
                					<th align="center"><center><h6> اسم المتبرع</h6></center></th>
                					<th align="center"><center><h6>مبلغ التبرع</h6></center></th>
                					<th align="center"><center><h6>التاريخ و الوقت</h6></center></th>
                				  </tr>
                ';
                
                for($i=0;$i<sizeof($myObj["payments"]);$i++){
                    
                    $date = new DateTime($myObj["payments"][$i]['created_at']);
                 
                                  echo" <trclass='active'  style='font-family: Almarai;'>
                					
                						<td align='center'>" . $myObj["payments"][$i]['source']['name']."</td>
                						<td align='center'>" . ((int)($myObj["payments"][$i]['amount'])/100). "</td>
                						<td align='center'>" . $date->format('d-m-Y H:i:s'). "</td>
                					    </tr>";

                }?>
                                <?php
                            }
                        }
                        ?>
                        
                        
                        </script>
</html>