<?php
	require_once "include/dbOperation.php"; 
 ?>
<?php 
	$ope = isset($_GET["ope"])?$_GET["ope"]:"";
	$blogId = isset($_GET["userid"])?$_GET["userid"]:"";
	if ($blogId != "" && $ope == "del") {
		$mydb = new DB();
		$mydb->delete("sendinfo","userid=".$blogId."");	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>phpDemo</title>
	<meta charset="utf-8"/>
	<meta name="keywords" content="super" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<div class="add">
			<a href="add.php">继续添加</a>
	</div>
	<div id="all">
		<?php
			$dbo = new DB();
			$sql = "select * from sendinfo";
			$res = $dbo->query($sql);
			while ($row = mysql_fetch_array($res)) {
				echo "<div class='header'>";
				echo "	<div class='container'>";
				echo "		<div class='title'>";
				echo "			<span>标题：</span>",$row['title'];
				echo "		</div>";
				echo "		<div class='name'>";
				echo "			<span>用户：</span>",$row['name'];
				echo "		</div>";
				echo "	</div>";
				echo "	<div class='operation'>";
				echo "		<a href='edit.php' target='_blankket'>编辑</a>";
				echo "		<a href='index.php?userid=".$row['userid']."&ope=del'>删除</a>";
				echo "	</div>";
				echo "</div>";
				echo "<div class='content'>";
				echo "	<div class='content-detail'>";
				echo "		<span>内容：</span>",$row['content'];
				echo "	</div>";
				echo "</div>";
				echo "<div class='send-time'>";
				echo "	<div class='time-container'>";
				echo "		<span>发表日期：" . $row['sendtime']."</span>";
				echo "	</div>";
				echo "</div>";
			}
		?>
		
	</div> 
</body>
</html>