<?
	include "../common.php";
	
	$genre = $_REQUEST["genre"];
	$code = $_REQUEST["code"];
	$name = $_REQUEST["name"];
	$coname = $_REQUEST["coname"];
	$price = $_REQUEST["price"];
	$opt1 = $_REQUEST["opt1"];
	$opt2 = $_REQUEST["opt2"];
	$status = $_REQUEST["status"];
	$icon_new = ($_REQUEST["icon_new"]) ? 1 : 0;
	$icon_hit = ($_REQUEST["icon_hit"]) ? 1 : 0;
	$icon_sale = ($_REQUEST["icon_sale"]) ? 1 : 0;
	$discount = ($_REQUEST["discount"] !== "") ? $_REQUEST["discount"] : 0;
	$regday = $_REQUEST["regday"];
	
	// 장르를 선택하지 않았을 경우
	if($genre == 0) {
		echo "<script>alert('장르를 선택하지 않았습니다!');</script>";
		echo "<script>location.href='product_new.php'</script>";
		exit;
	}
	// 세일을 선택했지만 할인율이 입력되지 않았을 경우
	if($icon_sale && !$discount) {
		echo "<script>alert('할인율을 입력하지 않았습니다!');</script>";
		echo "<script>location.href='product_new.php'</script>";
		exit;
	}
	
	$fname1 = "";
	$fname2 = "";
	$fname3 = "";
	$fname4 = "";
	$fname5 = "";
	$fname6 = "";
	
	if ($_FILES["image1"]["error"] == 0) {
		$fname1_a = $_FILES["image1"]["name"];
		$ext = pathinfo($fname1_a, PATHINFO_EXTENSION);
		$id = uniqid();
		$base = pathinfo($fname1_a, PATHINFO_FILENAME);
		$fname1 = $base . "_" . $id . "." . $ext;

		if (!move_uploaded_file($_FILES["image1"]["tmp_name"], "../product/" . $fname1)) {
			exit("업로드 실패");
		}
	}
	if ($_FILES["image2"]["error"] == 0) {
		$fname2_a = $_FILES["image2"]["name"];
		$ext = pathinfo($fname2_a, PATHINFO_EXTENSION);
		$id = uniqid();
		$base = pathinfo($fname2_a, PATHINFO_FILENAME);
		$fname2 = $base . "_" . $id . "." . $ext;

		if (!move_uploaded_file($_FILES["image2"]["tmp_name"], "../product/" . $fname2)) {
			exit("업로드 실패");
		}
	}
	if ($_FILES["image3"]["error"] == 0) {
		$fname3_a = $_FILES["image3"]["name"];
		$ext = pathinfo($fname3_a, PATHINFO_EXTENSION);
		$id = uniqid();
		$base = pathinfo($fname3_a, PATHINFO_FILENAME);
		$fname3 = $base . "_" . $id . "." . $ext;

		if (!move_uploaded_file($_FILES["image3"]["tmp_name"], "../product/" . $fname3)) {
			exit("업로드 실패");
		}
	}
	if ($_FILES["image4"]["error"] == 0) {
		$fname4_a = $_FILES["image4"]["name"];
		$ext = pathinfo($fname4_a, PATHINFO_EXTENSION);
		$id = uniqid();
		$base = pathinfo($fname4_a, PATHINFO_FILENAME);
		$fname4 = $base . "_" . $id . "." . $ext;

		if (!move_uploaded_file($_FILES["image4"]["tmp_name"], "../product/" . $fname4)) {
			exit("업로드 실패");
		}
	}
	if ($_FILES["image5"]["error"] == 0) {
		$fname5_a = $_FILES["image5"]["name"];
		$ext = pathinfo($fname5_a, PATHINFO_EXTENSION);
		$id = uniqid();
		$base = pathinfo($fname5_a, PATHINFO_FILENAME);
		$fname5 = $base . "_" . $id . "." . $ext;

		if (!move_uploaded_file($_FILES["image5"]["tmp_name"], "../product/" . $fname5)) {
			exit("업로드 실패");
		}
	}
	if ($_FILES["image6"]["error"] == 0) {
		$fname6_a = $_FILES["image6"]["name"];
		$ext = pathinfo($fname6_a, PATHINFO_EXTENSION);
		$id = uniqid();
		$base = pathinfo($fname6_a, PATHINFO_FILENAME);
		$fname6 = $base . "_" . $id . "." . $ext;

		if (!move_uploaded_file($_FILES["image6"]["tmp_name"], "../product/" . $fname6)) {
			exit("업로드 실패");
		}
	}
	
	
	$captbig1 = $_REQUEST["captbig1"] ?? "";
	$captbig2 = $_REQUEST["captbig2"] ?? "";
	$captbig3 = $_REQUEST["captbig3"] ?? "";
	$captbig4 = $_REQUEST["captbig4"] ?? "";
	
	$captsmall1 = $_REQUEST["captsmall1"] ?? "";
	$captsmall2 = $_REQUEST["captsmall2"] ?? "";
	$captsmall3 = $_REQUEST["captsmall3"] ?? "";
	$captsmall4 = $_REQUEST["captsmall4"] ?? "";
	
	$name = addslashes($name ?? "");
	$code = addslashes($code ?? "");
	$coname = addslashes($coname ?? "");
	
	$captbig1 = addslashes($captbig1 ?? "");
	$captbig2 = addslashes($captbig2 ?? "");
	$captbig3 = addslashes($captbig3 ?? "");
	$captbig4 = addslashes($captbig4 ?? "");
	
	$captsmall1 = addslashes($captsmall1 ?? "");
	$captsmall2 = addslashes($captsmall2 ?? "");
	$captsmall3 = addslashes($captsmall3 ?? "");
	$captsmall4 = addslashes($captsmall4 ?? "");
	
	$sql = "insert into game (genre, code, name, coname, price, opt1, opt2, status, regday, icon_new, icon_hit, icon_sale, discount,image1, image2, image3, image4, image5, image6, captbig1, captbig2, captbig3, captbig4, captsmall1, captsmall2, captsmall3, captsmall4)
		values ($genre, '$code', '$name', '$coname', $price, $opt1, $opt2, $status, '$regday', $icon_new, $icon_hit, $icon_sale, $discount, '$fname1', '$fname2', '$fname3', '$fname4', '$fname5', '$fname6', '$captbig1', '$captbig2', '$captbig3', '$captbig4', '$captsmall1', '$captsmall2', '$captsmall3', '$captsmall4')";
	$result = mysqli_query($db, $sql);
	if (!$result) exit("에러: $sql");
	
	echo("<script>location.href='product.php'</script>");
?>