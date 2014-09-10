<?php 
	require_once "../include/dbOperation.php"; 
 ?>
<?php 
	$flag = isset($_POST['flag'])?$_POST['flag']:"";
	$name = isset($_POST['name'])?$_POST['name']:"";
	$title = isset($_POST['title'])?$_POST['title']:"";
	$content = isset($_POST['content'])?$_POST['content']:"";
	if ( $flag == "") {
		die();
	}
	if ( $flag == "test" && $name != "" && $title != "" && $content != ""){
		$mydb = new DB();
		$dataArray = array();
		$dataArray['name'] = $name;
		$dataArray['title'] = $title;
		$dataArray['content'] = $content;
		if ($mydb->insert("sendinfo",$dataArray)) {
			echo "true";
		}
		else{
			echo "false";
		}
	}

 ?>