
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
</head>
<body>
	<div id="allLogin">
		<div class="loginTitle">登录...</div>
		<form action="login.php" method="post" id="login">
			<div class="login-name">
				<span>用户名：</span>
				<input name="userid" type="text" id="txtUserID" />
			</div>
			<div class="login-pwd">
				<span>密码：</span>
				<input name="userpwd" type="password" id="txtPwd" />
			</div>
			<input type="submit" value="登录" id="btnLogin" />
		</form>
	</div>
</body>
</html>
<?php 
	require_once "include/dbOperation.php";
 ?>
<?php 
	$userid = isset($_POST['userid'])?$_POST['userid']:"";
	$userpwd = isset($_POST['userpwd'])?$_POST['userpwd']:"";
	if ($userid != "" && $userpwd != "") {
		$dbo = new DB();
		$sql = "select * from userinfo where userid=" .$userid." and userpwd =".$userpwd;
		$res = $dbo->get_one($sql);
		if (!$res) {
			 echo "<script>alert('请输入正确的用户名和密码！');</script>";
		}
		else{
			$lifetime = 10;
			session_set_cookie_params($lifetime); 
			session_start();
			$_SESSION["admin"] = true; 
			$_SESSION['userNickname'] = $res['userNickname'];
			$_SESSION['userid'] = $res['userid'];
			header("location:index.php");
		}
	}
 ?>