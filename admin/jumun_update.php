<?
	include "../common.php";
	
	$id = $_REQUEST["id"];
	$state = $_REQUEST["state"];
	$page = $_REQUEST["page"];
	
	$sql="update jumun set state = $state where id = '$id'";
	$result=mysqli_query($db, $sql);
	if (!$result) exit("에러: $sql");
	
	echo("<script>location.href='jumun.php?page=$page'</script>");
?>