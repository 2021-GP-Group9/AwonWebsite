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
    </head> <header id="headerPage" style="padding:128px 16px">
            <img src="logo.jpg" alt="logo" class="pageP"  >
        </header>
    <body>
       
      <div class="auth-content"> 
                    <?php
echo '<h1>Joining Requests</h1>';

                    ?>      
      <table id="manageJoiningRequest">
                        <tr>
                            <th>Charity Photo</th>
                            <th>Charity Name</th>
                            <th>Charity Request</th>
                        <tr>
                            <td><img src="pic_trulli.jpg" alt="Charity Photo"></td>
                            <td><a href="" id="">Charity Name from database</a></td>
                            <td><input type="button" value="Accept" onclick="deleteRow(this)">
                            <input type="button" value="Reject" onclick="deleteRow(this)"></td>
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

