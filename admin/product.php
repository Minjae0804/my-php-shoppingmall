<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	
	$asql = "select count(*) from game";
	$aresult=mysqli_query($db, $asql);
	$arow=mysqli_fetch_array($aresult);
	$acount = $arow[0];
	
	$sel1 = $_REQUEST["sel1"] ?? 0;
	$sel2 = $_REQUEST["sel2"] ?? 0;
	$sel3 = $_REQUEST["sel3"] ?? 0;
	$sel4 = $_REQUEST["sel4"] ?? 0;
	$text1 = $_REQUEST["text1"] ?? "";
	
	$k = 0;
	if($sel1 != 0) { $s[$k] = "status=" . $sel1; $k++; } 
	if($sel2 == 1) { $s[$k] = "icon_new=1"; $k++; } 
	if($sel2 == 2) { $s[$k] = "icon_hit=1"; $k++; } 
	if($sel2 == 3) { $s[$k] = "icon_sale=1"; $k++; } 
	if($sel3 != 0) { $s[$k] = "genre=" . $sel3; $k++; } 
	
	if($text1){
		if($sel4 == 1) { $s[$k] = "name like '%" . $text1 . "%'"; $k++; }
		if($sel4 == 2) { $s[$k] = "code like '%" . $text1 . "%'"; $k++; }
	} 
	
	if ($k > 0) {
		$tmp = implode(" and ", $s);
		$tmp = " where " . $tmp;
	}
	
	$sql = "select * from game " . $tmp . " order by name";
	$args = "sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1";
	$result = mypagination($sql, $args, $count, $pagebar);
?>
<!doctype html>
<html lang="kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DABA 관리자 페이지</title>
	<link  href="../css/bootstrap.min.css" rel="stylesheet">
	<link  href="../css/my.css" rel="stylesheet">
	<script src="../js/jquery-3.7.1.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/my.js"></script>
</head>
<body>

<div class="container">
<!-------------------------------------------------------------------------------------------->	
<script> document.write(admin_menu());</script>
<!-------------------------------------------------------------------------------------------->	
<script>
	function  search_clear()
	{
		form1.sel1.value="0";
		form1.sel2.value="0";
		form1.sel3.value="0";
		form1.sel4.value="1";
		form1.text1.value="";
	}
</script>

<div class="row mx-1  justify-content-center">
	<div class="col" align="center">

	<h4 class="m-0 mb-3">제품</h4>
	
	<form name="form1" method="post" action="product.php">
	
	<table class="table table-sm table-borderless m-0 p-0">
		<tr>
			<td width="20%" align="left" style="padding-top:8px">
				총 제품수 : <font color="red"><?=$acount; ?></font>
				<? if (strpos($sql, 'where')) { // sql 쿼리에 where이 포함된 경우(즉, 사용자가 무언가를 검색하는 경우) 실행 ?>	
				&nbsp; 조회 제품수 : <font color="red"><?=$count; ?></font>
				<? } ?>
			</td>
			<td align="right">
				<div class="d-inline-flex">
					<select name="sel1" class="form-select form-select-sm bg-light myfs12" style="width:100px">
						<option value="0" <? if ($sel1 == 0) echo "selected"; ?>>상품상태</option>
						<option value="1" <? if ($sel1 == 1) echo "selected"; ?>>판매중</option>
						<option value="2" <? if ($sel1 == 2) echo "selected"; ?>>판매중지</option>
						<option value="3" <? if ($sel1 == 3) echo "selected"; ?>>품절</option>
					</select>&nbsp;
					<select name="sel2" class="form-select form-select-sm bg-light myfs12" style="width:120px">
						<option value="0" <? if ($sel2 == 0) echo "selected"; ?>>아이콘선택</option>
						<option value="1" <? if ($sel2 == 1) echo "selected"; ?>>New</option>
						<option value="2" <? if ($sel2 == 2) echo "selected"; ?>>Hit</option>
						<option value="3" <? if ($sel2 == 3) echo "selected"; ?>>Sale</option>
					</select>&nbsp;
				</div>
				<div class="d-inline-flex">
					<select name="sel3" class="form-select form-select-sm bg-light myfs12" style="width:100px">
					
						<? foreach($a_genre as $key => $ele) { ?>
						<option value="<?=$key ?>" <? if ($sel3 == $key) echo "selected"; ?>><?=$ele ?></option>
						<? } ?>
						
					</select>&nbsp;
					<select name="sel4" class="form-select form-select-sm bg-light myfs12" style="width:100px">
						<option value="1" <? if ($sel4 == 1) echo "selected"; ?>>제품이름</option>
						<option value="2" <? if ($sel4 == 2) echo "selected"; ?>>제품코드</option>
					</select>
				</div>
				<div class="d-inline-flex">
					<div class="input-group input-group-sm">
						<input type="text" name="text1" value="<?=$text1; ?>" size="10" 
							class="form-control myfs12" 
							onKeydown="if (event.keyCode == 13) { form1.submit(); }"> 
						<button class="btn mycolor1 myfs12" type="button" 
							onClick="form1.submit();">검색</button>
					</div>
				</div>
				<div class="d-inline-flex">
					<a href="javascript:search_clear()" class="btn btn-sm mycolor1 myfs12">초기화</a>&nbsp;&nbsp;&nbsp;
					<a href="product_new.php" class="btn btn-sm mycolor1 myfs12">추가</a>&nbsp;
				</div>
				
			</td>
		</tr>
	</table>
	
	</form>
	

	<table class="table table-sm table-bordered table-hover mb-1">
		<tr class="bg-light">
			<td width="10%">장르</td>
			<td width="10%">제품코드</td>
			<td width="35%">제품명</td>
			<td width="10%">판매가</td>
			<td width="10%">상태</td>
			<td width="15%">이벤트</td>
			<td width="10%">수정/삭제</td>
		</tr>
		
		<?
			foreach( $result as $row ) {
				$id = $row["id"];
				$genre = $a_genre[$row["genre"]];
				$code = $row["code"];
				$name = $row["name"];
				$price = number_format($row["price"]);
				
				if ($row["status"] == 1) $status = "판매중";
				else if ($row["status"] == 2) $status = "판매중지";
				else $status = "품절";
				
				if ($row["icon_new"]  == 1) $icon1 = "New ";  else $icon1 = "";
				if ($row["icon_hit"]  == 1) $icon2 = "Hit ";  else $icon2 = "";
				
				if ($row["icon_sale"] == 1) { 
					$icon3 = "Sale";
					if ($row["discount"]) $icon3 = $icon3 . "(" . $row["discount"] . "%)";
				} else $icon3 = "";
				
				$icons = $icon1 . $icon2 . $icon3;
		?>
		
		<tr>
			<td><?=$genre; ?></td>
			<td><?=$code; ?></td>
			<td align="left"><?=$name; ?></td>
			<td align="right" class="px-2"><?=$price; ?></td>
			<td><?=$status; ?></td>
			<td><?=$icons; ?></td>
			<td>
				<a href="product_edit.php?id=<?=$id; ?>&sel1=<?=$sel1; ?>&sel2=<?=$sel2; ?>&sel3=<?=$sel3; ?>&sel4=<?=$sel4; ?>&text1=<?=$text1; ?>&page=<?=$page; ?>" class="btn btn-sm btn-outline-info mybutton-blue">수정</a>
				<a href="product_delete.php?id=<?=$id; ?>&sel1=<?=$sel1; ?>&sel2=<?=$sel2; ?>&sel3=<?=$sel3; ?>&sel4=<?=$sel4; ?>&text1=<?=$text1; ?>&page=<?=$page; ?>" class="btn btn-sm btn-outline-danger mybutton-red" onclick="javascript:return confirm('삭제할까요 ?');">삭제</a>				
			</td>
		</tr>
		
		<?
			}
		?>
		
	</table>

	<?
		echo $pagebar;
	?>

	</div>
</div>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
