<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	
	$day1 = $_REQUEST["day1"] ?? date("Y-m-d", strtotime("-1 month"));
	$day2 = $_REQUEST["day2"] ?? date("Y-m-d");
	
	$sel1 = $_REQUEST["sel1"] ?? 0;
	$sel2 = $_REQUEST["sel2"] ?? 0;
	$text1 = $_REQUEST["text1"] ?? "";
	
	$k = 1;
	$s[$k] = "jumunday between '". $day1 . "' and '" . $day2 . "' ";
	
	if($sel1 == 1) { $s[$k] = "state=" . $sel1; $k++; }
	if($sel1 == 2) { $s[$k] = "state=" . $sel1; $k++; } 
	if($sel1 == 3) { $s[$k] = "state=" . $sel1; $k++; } 
	if($sel1 == 4) { $s[$k] = "state=" . $sel1; $k++; } 
	if($sel1 == 5) { $s[$k] = "state=" . $sel1; $k++; } 
	if($sel1 == 6) { $s[$k] = "state=" . $sel1; $k++; } 
	
	if($text1){
		if($sel2 == 1) { $s[$k] = "id like '%" . $text1 . "%'"; $k++; }
		if($sel2 == 2) { $s[$k] = "r_name like '%" . $text1 . "%'"; $k++; }
		if($sel2 == 3) { $s[$k] = "game_names like '%" . $text1 . "%'"; $k++; }
	}
	
	$tmp = implode(" and ", $s);
	$tmp = " where " . $tmp;
	
	$sql = "select * from jumun " . $tmp . " order by id desc";
	$args = "day1=$day1&day2=$day2&sel1=$sel1&sel2=$sel2&text1=$text1";
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
	function go_update(id, pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?id="+id+"&state="+state+"&page="+form1.page.value+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1="+form1.day1.value+"&day2="+form1.day2.value;
	}
</script>

<div class="row mx-1 justify-content-center">
	<div class="col" align="center">

		<h4 class="m-0 mb-3">주문</h4>

		<form name="form1" method="post" action="jumun.php">
		
		<table class="table table-sm table-borderless m-0 p-0">
			<tr>
				<td width="20%" align="left" style="padding-top:8px">
					주문수 : <font color="red"><?=$count ?></font>
				</td>
				<td align="right">
				
					기간:
					<div class="d-inline-flex">
						<input type="date" name="day1" value="<?=$day1?>" 
							class="form-control form-control-sm"  style="width:120px" >~
						<input type="date" name="day2" value="<?=$day2?>" 
							class="form-control form-control-sm" style="width:120px" >
					</div>
					<div class="d-inline-flex">
						<select name="sel1" class="form-select form-select-sm bg-light myfs12" style="width:100px">	
							<option value="0" <? if ($sel1 == 0) echo "selected"; ?>>전체</option>
							<option value="1" <? if ($sel1 == 1) echo "selected"; ?>>주문신청</option>
							<option value="2" <? if ($sel1 == 2) echo "selected"; ?>>주문확인</option>
							<option value="3" <? if ($sel1 == 3) echo "selected"; ?>>입금확인</option>
							<option value="4" <? if ($sel1 == 4) echo "selected"; ?>>배달중</option>
							<option value="5" <? if ($sel1 == 5) echo "selected"; ?>>주문완료</option>
							<option value="6" <? if ($sel1 == 6) echo "selected"; ?>>주문취소</option>
						</select>&nbsp;
						<select name="sel2" class="form-select bg-light myfs12" style="width:105px">
							<option value="1" <? if ($sel2 == 1) echo "selected"; ?>>주문번호</option>
							<option value="2" <? if ($sel2 == 2) echo "selected"; ?>>고객명</option>
							<option value="3" <? if ($sel2 == 3) echo "selected"; ?>>상품명</option>
						</select>
					</div>
					<div class="d-inline-flex">
						<div class="input-group input-group-sm">
							<input type="text" name="text1" value="" 
								class="form-control myfs12" style="width:100px" 
								onKeydown="if (event.keyCode == 13) { form1.submit(); }"> 
							<button class="btn mycolor1 myfs12" type="button" 
								onClick="form1.submit();">검색</button>
						</div>
					</div>
					
				</td>
			</tr>
		</table>
		
		
		<table class="table table-sm table-bordered table-hover my-1">
			<tr class="bg-light">
				<td>주문번호</td>
				<td>주문일</td>
				<td width="30%">제품명</td>
				<td width="5%">제품수</td>
				<td>금액</td>
				<td>주문자</td>
				<td width="5%">결제</td>
				<td width="20%">주문상태</td>
				<td width="5%">삭제</td>
			</tr>
			
			<?
				foreach( $result as $key => $row ) {
					$id = $row["id"];
					$jumunday = $row["jumunday"];
					$game_names = $row["game_names"];
					$game_nums = $row["game_nums"];
					$totalprice = number_format($row["totalprice"]);
					$r_name = $row["r_name"];
					$pay_kind = ($row["pay_kind"] ? "무통장" : "카드");
					$state = $row["state"];
					
					$color = "black";
					if($state == 5) $color = "blue";
					if($state == 6) $color = "red";
					
			?>
		
			<tr>
				<td class="mywordwrap">
					<a href="jumun_info.php?id=<?=$id ?>" style="color:#0085dd"><?=$id ?></a>
				</td>
				<td><?=$jumunday ?></td>
				<td align="left" class="mywordwrap"><?=$game_names ?></td>	
				<td><?=$game_nums ?></td>	
				<td align="right" class="mywordwrap"><?=$totalprice ?></td>	
				<td><?=$r_name ?></td>	
				<td><?=$pay_kind ?></td>	
				<td>
					<div class="d-sm-inline-flex">
						<select name="state" class="form-select form-select-sm myfs12 me-1" style="color:<?=$color ?>">
							<option value="1" <? if($state == 1) { ?>selected<? } ?>>주문신청</option>
							<option value="2" <? if($state == 2) { ?>selected<? } ?>>주문확인</option>
							<option value="3" <? if($state == 3) { ?>selected<? } ?>>입금확인</option>
							<option value="4" <? if($state == 4) { ?>selected<? } ?>>배송중</option>
							<option value="5" <? if($state == 5) { ?>selected<? } ?>>주문완료</option>
							<option value="6" <? if($state == 6) { ?>selected<? } ?>>주문취소</option>
						</select>
						<a href="javascript:go_update('<?=$id ?>', <?=$key ?>);" 
							class="btn btn-sm mybutton-blue" style="width:50px;">수정</a>
					</div>
				</td>
				<td>
					<a href="jumun_delete.php?id=<?=$id ?>" 
						class="btn btn-sm mybutton-red" 
						onclick="javascript:return confirm('삭제할까요?');">삭제</a>				
				</td>
			</tr>
			<? } ?>
		</table>
		<input type="hidden" name="state">
		<input type="hidden" name="page" value="<?=$page?>">
		<? echo $pagebar; ?>

		</form>
		
	</div>
</div>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
