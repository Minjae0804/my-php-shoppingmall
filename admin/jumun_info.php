<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	$id = $_REQUEST["id"];
	
	$sql = "select * from jumun where id = '$id'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	
	$statenum = $row["state"];
	$state = $a_state[$statenum];
	
	$jumunday = $row["jumunday"];
	
	$o_name = $row["o_name"];
	$gubun = $row["member_id"] ? "회원" : "비회원";
	
	$o_tel1 = trim(substr($row["o_tel"],0,3));
	$o_tel2 = trim(substr($row["o_tel"],3,4));
	$o_tel3 = trim(substr($row["o_tel"],7,4));
	$o_tel = $o_tel1 . "-" . $o_tel2 . "-" . $o_tel3;
	
	$o_email = $row["o_email"];
	$o_zip = $row["o_zip"];
	$o_juso = $row["o_juso"];
	
	$r_name = $row["r_name"];
	
	$r_tel1 = trim(substr($row["r_tel"],0,3));
	$r_tel2 = trim(substr($row["r_tel"],3,4));
	$r_tel3 = trim(substr($row["r_tel"],7,4));
	$r_tel = $r_tel1 . "-" . $r_tel2 . "-" . $r_tel3;
	
	$r_email = $row["r_email"];
	$r_zip = $row["r_zip"];
	$r_juso = $row["r_juso"];
	$memo = $row["memo"];
	
	if($row["card_kind"]) {
		$card_kind = $a_card[$row["card_kind"]];
	} else {
		$card_kind = "";
	}
	$card_okno = $row["card_okno"] ?? "";
	$card_halbu = $row["card_halbu"] ? $row["card_halbu"] . "개월" : "일시불";
	
	if($row["bank_kind"]) {
		$bank_kind = $a_bank_kind[$row["bank_kind"]];
	} else {
		$bank_kind = "";
	}
	$bank_sender = $row["bank_sender"];
	
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

<div class="row mx-1 justify-content-center">
	<div class="col-sm-10" align="center">

	<h4 class="m-0 mb-3">주문 ( <b><?=$id ?></b> )</h4>

	<table class="table table-sm table-bordered mb-3">
		<tr>
			<td width="15%" class="bg-light">상태</td>
			<td width="35%"><?=$state ?></td>
			<td width="15%" class="bg-light">주문일</td>
			<td width="35%"><?=$jumunday ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-2">
		<tr>
			<td width="15%" class="bg-light"><b>주문자</b></td>
			<td width="35%"><?=$o_name ?></td>
			<td width="15%" class="bg-light">구분</td>
			<td width="35%"><?=$gubun ?></td>
		</tr>
		<tr>
			<td class="bg-light">전화</td><td><?=$o_tel ?></td>
			<td class="bg-light">E-Mail</td><td><?=$o_email ?></td>
		</tr>
		<tr>
			<td class="bg-light">주소</td>
			<td align="left" colspan="3">&nbsp;(<?=$o_zip ?>) <?=$o_juso ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-3">
		<tr>
			<td width="15%" class="bg-light"><b>수신자</b></td><td width="35%"><?=$r_name ?></td>
			<td width="15%" class="bg-light"></td><td></td>
		</tr>
		<tr>
			<td class="bg-light">전화</td><td><?=$r_tel ?></td>
			<td class="bg-light">E-Mail</td><td><?=$r_email ?></td>
		</tr>
		<tr>
			<td class="bg-light">주소</td>
			<td align="left" colspan="3">&nbsp;(<?=$r_zip ?>) <?=$r_juso ?></td>
		</tr>
		<tr height="50">
			<td class="bg-light">메모</td>
			<td align="left" valign="top" colspan="3">&nbsp;<?=$memo ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-3">
		<tr>
			<td width="15%" class="bg-light"><b>카드</b></td>
			<td width="35%"><?=$card_kind ?></td>
			<td width="15%" class="bg-light">승인</td>
			<td width="35%"><?=$card_okno ?></td>
		</tr>
		<tr>
			<td class="bg-light">할부</td><td><?=$card_halbu ?></td>
			<td class="bg-light"></td><td></td>
		</tr>
		<tr>
			<td class="bg-light"><b>무통장</b></td><td><?=$bank_kind ?></td>
			<td class="bg-light">입금자</td><td><?=$bank_sender ?></td>
		</tr>
	</table>

	<table class="table table-sm table-bordered mb-3">
		<tr class="bg-light">
			<td>제품명</td>
			<td width="10%">수량</td>
			<td width="10%">단가</td>
			<td width="10%">금액</td>
			<td width="10%">할인</td>
			<td width="20%">옵션</td>
		</tr>
		<?
			$jumunssql = "select *, game.name as game_name, jumuns.num as gamenum, jumuns.price as jumuns_price, jumuns.discount as jumunsdiscount, opts1.name as opts1name, opts2.name as opts2name from (
					(jumuns left join game on jumuns.game_id = game.id) 
					left join opts as opts1 on jumuns.opts_id1 = opts1.id
				) left join opts as opts2 on jumuns.opts_id2 = opts2.id 
				where jumuns.jumun_id = '$id'";
			$jumunsresult = mysqli_query($db, $jumunssql);
			$jumunsrow = mysqli_fetch_array($jumunsresult);
			$totalprice = 0;
			
			foreach($jumunsresult as $jumunsrow ) {
				if($jumunsrow["game_id"]) {
					$game_name = $jumunsrow["game_name"];
				} else {
					$game_name = "배송비";
				}
				
				$num = $jumunsrow["gamenum"];
				$jumunsprice = $jumunsrow["jumuns_price"];
				$prices = $num * $jumunsprice;
				
				$discount = $jumunsrow["jumunsdiscount"] ? $jumunsrow["jumunsdiscount"] . "%": "";
				
				$opt1 = $jumunsrow["opts1name"];
				$opt2 = $jumunsrow["opts2name"];
				
				if($opt1 && $opt2) {
					$opts = $opt1 . " / " . $opt2;
				} else if($opt1 || $opt2) {
					$opts = $opt1 . $opt2;
				} else {
					$opts = "";
				}
				
				$totalprice += $prices;
		?>
		
		<tr>
			<td align="left"><?=$game_name ?></td>
			<td><?=$num ?></td>
			<td align="right"><?=number_format($jumunsprice) ?></td>
			<td align="right"><?=number_format($prices) ?></td>
			<td><?=$discount ?></td>
			<td><?=$opts ?></td>
		</tr>
		<? } ?>
	</table>

	<table class="table table-sm table-bordered mb-3 p-2">
		<tr>
			<td width="15%" class="bg-light">총금액</td>
			<td width="85%" align="right" style="font-size:18px"><b><?=number_format($totalprice) ?>원</b>&nbsp;</td>
		</tr>
	</table>

	<a href="javascript:print();"  class="btn btn-sm btn-dark text-white my-2">&nbsp;프린트&nbsp;</a>&nbsp;
	<a href="javascript:history.back();"  class="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>

	</div>
</div>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>
