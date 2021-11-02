<?php session_start(); $ID = $_SESSION['ID'];
//test21
if (!isset($_SESSION['role'])) {
    header('Location:login.php');
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css'>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="DesignPages.css">
		<script src="jquery.min.js"></script>
    <header> 
        <!-- logo in the right -->
        <img src="finalLogo.jpeg" alt="logo" class="logo" style="length:100px; width:100px; float: left;">

        <!-- navbar for charity should include 'تعديل الملف الشخصي' which is call ProfilePage.php --> 
        <nav class="topnav">
            <ul>
                <li><a href="CharityPage.php">رجوع</a> </li>
            </ul>
        </nav>
       <!-- log out  as button in the left-->
        <form id="signout" action="logout.php" method="POST">
            <input type="submit" value="تسجيل خروج" class="btn btn-default btn-sm">

        </form>
    </header>
</head>
<body>
    <!-- <form id="signout" action="logout.php" method="POST">
         <input type="submit" value="تسجيل خروج">
 
     </form> 
      <form id="profile" action="ProfilePage.php" method="POST">
          <input type="submit" value="ملف التعريف الشخصي">
      </form> -->
  <!-- <img src="logo.jpg" alt="logo" class="pageP"  >
  </header> -->
    <div class="auth-content" style="width: 90%; height: 400px; display: block;"> 
        <?php
        require('db_connecting.php');

        $ID = $_SESSION['ID'];

        $sqli = "SELECT * FROM `charity` WHERE ID = '$ID'";

        $result = $conn->query($sqli);

        while ($row = $result->fetch_assoc()) {
            // &nbsp; used for spaceing

            echo '<h1>مرحبا </h1>';
            echo "<p> <a style='font-size:30px;'>{$row["name"]}</a></p>";
        }
        ?> 
        <hr>  
<?php 
	if(isset($_GET['q']) AND $_GET['q'] == "edit") {
		$appointment_id = $_GET['appointment_id'];
		$current_date = $_GET['date'];
		$current_time = $_GET['time'];
?>
<div class="row">
	<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="well">
				<form method="post">
					<div class="form-group">
						<label>التاريخ</label>
						<input type="date" name="date" class="form-control" value="<?php echo $_GET['date'] ?>" value="<?php echo $current_time ?>">
					</div>
					<div class="form-group">
						<label>حدد الوقت</label>
						<input type="time" class="form-control" name="time" required value="<?php echo $current_time ?>">
					</div>
					<div class="form-group">
						<button type="submit" name="edit_submit" class="btn btn-primary">حفظ الموعد</button>
						
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<?php } ?>
<?php
if(isset($_POST['edit_submit'])) {
	$appointment_id = $_GET['appointment_id'];
    $ID = $_SESSION['ID'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	
	$sqli = "SELECT * FROM appointment WHERE charity_id = '$ID' AND appointment_date='$date' AND appointment_time='$time'";
	////echo $sqli;
	$result = $conn->query($sqli);
	$no = $result->num_rows;

	if($no == 0) {
		$sqli2 = "UPDATE appointment SET appointment_date='$date', appointment_time='$time' WHERE id=$appointment_id"; 

		$result2 = $conn->query($sqli2);
		if($result2) {
			echo '<META HTTP-EQUIV="Refresh" Content="0;CharityPage.php">';
			exit();
		}
	} else {
		echo "<h2 style='text-align:center; color:red'>يوجد موعد في نفس هذا التاريخ $date ونفس الوقت $time</h2>";
	}
	 
	
}
?>
        <hr>
        <h3 align="center">عرض المواعيد</h3>
        <table dir="rtl" class="table table-bordered" style="max-width: 600px;margin: 10px auto; background: #FFF">
        	<tr class="active">
				<th align="center">
					<center>تاريخ الموعد</center>
				</th>
				<th align="center">
					<center>الوقت</center>
				</th>
				<th align="center">
					<center>اسم المستخدم</center>
				</th>
				<th align="center">
					<center>حالة الموعد</center>
				</th>
				<th align="center">
					<center>خيارات</center>
				</th>
			</tr>
        <?php
			$ID = $_SESSION['ID'];
			$date = $_GET['date'];
			$sqli = "SELECT * FROM appointment WHERE charity_id = '$ID' AND appointment_date='$date'";
			////echo $sqli;
			$result = $conn->query($sqli);
			$no = $result->num_rows;
			while($row = mysqli_fetch_assoc($result)){			
		?>
   				<tr>
   					<td>
   						<?php echo $row['appointment_date'] ?>
   					</td>
   					<td>
   						<?php echo $row['appointment_time'] ?>
   					</td>
   					<td>
   						<?php echo $row['user_id'] ?>
   					</td>
   					<td>
   						<?php if($row['status'] == 0) echo "متاح"; else echo "محجوز"; ?>
   					</td>
   					<td>
   						<a href="?q=edit&appointment_id=<?php echo $row['id'] ?>&date=<?php echo $row['appointment_date'] ?>&time=<?php echo $row['appointment_time'] ?>" class="btn btn-success btn-xs">تعديل</a>
   						<a href="#" onClick="RemoveAppoiment(<?php echo $row['id'] ?>)" class="btn btn-danger btn-xs">حذف</a>
   					</td>
   				</tr>
   		<?php
			}
		?>
   		</table>
    </div>

<script>
function RemoveAppoiment(appointment_id){
	
	var appointment_id = appointment_id;
	if(confirm("هل تريد حذف هذا الموعد؟"))
	{
		$.ajax({
			url:"RemoveAppoiment.php",
			method:"GET",
			data:{appointment_id:appointment_id},
			success:function(data)
			{
				alert(data);
				window.location.replace("CharityPage.php");
			}
		 });
	} else {
		return false;
	}
}
</script>


</body>


</html>

