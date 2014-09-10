<?php 
	require_once "include/dbOperation.php";
 ?>
<?php
	session_start();
	if ($_SESSION['userNickname'] != "") {
		echo "welcome    " .$_SESSION['userNickname'];
	}
	else{
		header("location:login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome!</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/friendlist.css">
</head>
<body>
	<div id="allPanel">
		<div id="myInfo"></div>
		<div id="friendList">
			<?php 
				$dbo = new DB();
				$sql = "select * from friendsinfo where userid=" .$_SESSION['userid'];
				$res = $dbo->query($sql);
				while ($row = mysql_fetch_array($res)) {
					echo "<div class='friendInfo'>";
					echo " 	<div class='headImage'>";
					echo " 		<img src='images/".$row['id'].".png' width='80px' height='80px'>";
					echo " 	</div>";
					echo " 	<div class='notename'>" .$row['friendNoteName'];
					echo " 	</div>";
					echo "</div>";
				}
			 ?>	
		</div>
		<div id="panelBottom"></div>
	</div>
</body>
</html>