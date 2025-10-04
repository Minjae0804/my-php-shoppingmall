<?
	include "common.php";
	$uid = $_REQUEST["uid"];
	$pwd = $_REQUEST["pwd"];
	
	$sql = "select id from member where uid='$uid' and pwd='$pwd'";
	$result = mysqli_query($db, $sql);
	
	$row = mysqli_fetch_assoc($result); //aaa
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		setcookie("cookie_id",$row["id"]);
		echo "<script>location.href=\"index.html\"</script>";
	} else {
		echo "<script>location.href=\"member_login.php\"</script>";
	}
?>