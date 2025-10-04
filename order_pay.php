<?
	include "main_top.php";
	
	$o_tel1=$_REQUEST["o_tel1"];
	$o_tel2=$_REQUEST["o_tel2"];
	$o_tel3=$_REQUEST["o_tel3"];
	$o_tel = sprintf("%-3s%-4s%-4s", $o_tel1, $o_tel2, $o_tel3);
	
	$r_tel1=$_REQUEST["r_tel1"];
	$r_tel2=$_REQUEST["r_tel2"];
	$r_tel3=$_REQUEST["r_tel3"];
	$r_tel = sprintf("%-3s%-4s%-4s", $r_tel1, $r_tel2, $r_tel3);
?>
<script>
	function Check_Value() 
	{
		if (form2.pay_kind[0].checked)
		{
			if (form2.card_kind.value==0) {
				alert("카드종류를 선택하세요.");	form2.card_kind.focus();	return;
			}
			if (!form2.card_no1.value) {
				alert("카드번호를 입력하세요.");	form2.card_no1.focus();	return;
			}
			if (!form2.card_no2.value) {
				alert("카드번호를 입력하세요.");	form2.card_no2.focus();	return;
			}
			if (!form2.card_no3.value) {
				alert("카드번호를 입력하세요.");	form2.card_no3.focus();	return;
			}
			if (!form2.card_no4.value) {
				alert("카드번호를 입력하세요.");	form2.card_no4.focus();	return;
			}
			if (!form2.card_month.value) {
				alert("카드기간 월을 입력하세요.");	form2.card_month.focus();	return;
			}
			if (!form2.card_year.value) {
				alert("카드기간 년도를 입력하세요.");	form2.card_year.focus();	return;
			}
			if (!form2.card_pw.value) {
				alert("카드 비밀번호 뒷의 2자리를 입력하세요.");	form2.card_pw.focus();	return;
			}
		}
		else
		{
			if (form2.bank_kind.value==0) {
				alert("입금할 은행을 선택하세요.");	form2.bank_kind.focus();	return;
			}
			if (!form2.bank_sender.value) {
				alert("입금자 이름을 입력하세요.");	form2.bank_sender.focus();	return;
			}
		}
		form2.card_kind.disabled = false;
		form2.card_no1.disabled = false;
		form2.card_no2.disabled = false;
		form2.card_no3.disabled = false;
		form2.card_no4.disabled = false;
		form2.card_year.disabled = false;
		form2.card_month.disabled = false;
		form2.card_pw.disabled = false;
		form2.card_halbu.disabled = false;
		form2.bank_kind.disabled = false;
		form2.bank_sender.disabled = false;
		
		form2.submit();
	}

	function PaySel(n) 
	{
		if (n == 0) {
			form2.card_kind.disabled = false;
			form2.card_no1.disabled = false;
			form2.card_no2.disabled = false;
			form2.card_no3.disabled = false;
			form2.card_no4.disabled = false;
			form2.card_year.disabled = false;
			form2.card_month.disabled = false;
			form2.card_halbu.disabled = false;
			form2.card_pw.disabled = false;
			form2.bank_kind.disabled = true;
			form2.bank_sender.disabled = true;
		}
		else {
			form2.card_kind.disabled = true;
			form2.card_no1.disabled = true;
			form2.card_no2.disabled = true;
			form2.card_no3.disabled = true;
			form2.card_no4.disabled = true;
			form2.card_year.disabled = true;
			form2.card_month.disabled = true;
			form2.card_halbu.disabled = true;
			form2.card_pw.disabled = true;
			form2.bank_kind.disabled = false;
			form2.bank_sender.disabled = false;
		}
	}
</script>
<br><br>
<div class="row m-3 mb-0">
	<div class="col" align="center">
		<div class="col" align="left">
			<h2><font color='#AF2031'>&nbsp;&nbsp;&nbsp;주문 및 결제정보 입력</font></h2>
		</div>
		<hr class="m-0">
		<table class="table table-sm mb-5">
			<tr height="40" class="bg-light">
				<td width="10%">이미지</td>
				<td width="35%">상품정보</td>
				<td width="10%">판매가</td>
				<td width="20%">수량</td>
				<td width="10%">금액</td>
			</tr>
			
			<?
				$cart = $_COOKIE["cart"] ?? [];
				$n_cart = $_COOKIE["n_cart"] ?? 0;
				$total = 0;
				
				for($i = 1; $i <= $n_cart; $i++){
					$cart_item = $cart[$i] ?? "";
					if(!$cart_item) continue;
					
					list($id, $num, $opts_id1, $opts_id2) = explode("^", $cart[$i]);
					if ($opts_id1) {
						$sql = "select * from opts where id = $opts_id1";
						$result = mysqli_query($db, $sql);
						$row_opt1 = mysqli_fetch_array($result);
					}
					if ($opts_id2) {
						$sql = "select * from opts where id = $opts_id2";
						$result = mysqli_query($db, $sql);
						$row_opt2 = mysqli_fetch_array($result);
					}
					
					$sql = "select * from game where id=$id";
					$result=mysqli_query($db, $sql);
					$row = mysqli_fetch_array($result);
					
					$price = round($row["price"] * ((100 - $row["discount"])/100), -2);
					$total += $price * $num;
			?>
			<tr height="85" style="font-size:14px;">
				<td>
					<a href="product.php?id=<?=$id ?>"><img src="product/<?=$row["image1"] ?>" width="60" height="70"></a>
				</td>
				<td align="left" valign="middle">
					<a href="product.php?id=<?=$id?>" style="font-size:16px; color:#0066CC; font-family:'SCDream5';"><?=$row["name"]?></a><br>
					<? if (($opts_id1 && isset($row_opt1["name"])) || ($opts_id2 && isset($row_opt2["name"]))) { ?>
						<small><b>[옵션]</b> <? if ($opts_id1 && isset($row_opt1["name"])) { echo $row_opt1["name"]; } ?><? if ($opts_id2 && isset($row_opt2["name"])) { echo ", " . $row_opt2["name"]; } ?></small>
				<? } else { ?><br><? } ?>
				</td>
				<td><?=number_format($price); ?></td>
				<td>
					<div class="d-inline-flex">
						<?=$num ?>
					</div>
				</td>
				<td><?=number_format($price * $num); ?></td>
			</tr>
			<?
				}
			?>
			<tr height="40" align="right" class="bg-light" style="font-size:14px;">
				<td width="10%" align="center"></td>
				<td width="90%" colspan="5" class="pe-4">
					<font color="#0066CC">총 합계금액</font> : 상품구매금액( <b><?=number_format($total) ?></b> ) + <? if($total < $max_baesongbi) { ?>배송비( <b><?=number_format($baesongbi) ?></b> ) <? } else { ?>배송비( <b>무료</b> ) <? } ?>   = <font style="font-size:16px"><b><? if($total < $max_baesongbi) $total += $baesongbi; ?><?=number_format($total)?></b></font>
				</td>
			</tr>
		</table>
	</div>
</div>

<!-- form2 시작 -->
<form name="form2" method="post" action="order_insert.php">

	<input type="hidden" name="o_name"		value="<?=$_REQUEST["o_name"]?>">
	<input type="hidden" name="o_tel"		value="<?=$o_tel?>">
	<input type="hidden" name="o_email"		value="<?=$_REQUEST["o_email"]?>">
	<input type="hidden" name="o_zip"		value="<?=$_REQUEST["o_zip"]?>">
	<input type="hidden" name="o_juso"		value="<?=$_REQUEST["o_juso"]?>">

	<input type="hidden" name="r_name"		value="<?=$_REQUEST["r_name"]?>">
	<input type="hidden" name="r_tel"		value="<?=$r_tel?>">
	<input type="hidden" name="r_email"		value="<?=$_REQUEST["r_email"]?>">
	<input type="hidden" name="r_zip"		value="<?=$_REQUEST["r_zip"]?>">
	<input type="hidden" name="r_juso"		value="<?=$_REQUEST["r_juso"]?>">

	<input type="hidden" name="memo"		value="<?=$_REQUEST["memo"]?>">

<div class="row mx-1 my-0">
	<div class="col" align="center">

		<font size="4" color="#B90319"><h3 style="font-size:25px; font-family:'SCDream6';">결제방법</h3></font>
		<hr class="m-0 my-2">
					
		<table width="90%" style="font-size:13px;">
			<tr height="40">
				<td width="40%" align="right" class="pe-4">결제선택</td>
				<td align="left">
					<div class="d-inline-flex mt-2">
						<div class="form-check me-2">
							<input class="form-check-input" type="radio" name="pay_kind" value="0" 
								onclick="javascript:PaySel(0);" checked>
							<label class="form-check-label me-2">카드</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="pay_kind" value="1" 
								onclick="javascript:PaySel(1);">
							<label class="form-check-label">무통장</label>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<br><br>
		
		<font size="4" color="#B90319"><h3 style="font-size:25px; font-family:'SCDream6';">카드</h3></font>
		<hr class="m-0 my-2">
		
		<table width="90%" style="font-size:13px;">
			<tr height="40">
				<td  width="40%" align="right" class="pe-4">카드종류</td>
				<td align="left">
					<div class="d-inline-flex">
						<select name="card_kind" class="form-select form-select-sm myfs13">
							<option value="0" selected>카드종류를 선택하세요.</option>
							<option value="1">국민카드</option>
							<option value="2">신한카드</option>
							<option value="3">우리카드</option>
							<option value="4">하나카드</option>
						</select>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">카드번호</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="card_no1" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">&nbsp;
						<input type="text" name="card_no2" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">&nbsp;
						<input type="text" name="card_no3" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">&nbsp;
						<input type="text" name="card_no4" size="4" maxlength="4" value="" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">카드기간</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="card_month" size="2" maxlength="2" value="" 
							class="form-control form-control-sm">
						<div class="ms-1 mt-2">월</div>&nbsp;&nbsp;
						<input type="text" name="card_year" size="2" maxlength="2" value="" 
							class="form-control form-control-sm">
						<div class="ms-1 mt-2">년</div>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">카드비밀번호</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="password" name="card_pw" size="2" maxlength="2" value="" 
							class="form-control form-control-sm">
						<div class="mt-2 fs-6">**</div>&nbsp;
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" align="right" class="pe-4">할부</td>
				<td align="left">
					<div class="d-inline-flex">
						<select name="card_halbu" class="form-select form-select-sm myfs13">
							<option value="0" selected>일시불</option>
							<option value="3">3개월</option>
							<option value="6">6개월</option>
							<option value="9">9개월</option>
							<option value="12">12개월</option>
						</select>
					</div>
				</td>
			</tr>
		</table>
				
		<br><br>
		<font size="4" color="#B90319"><h3 style="font-size:25px; font-family:'SCDream6';">무통장</h3></font>
		<hr class="m-0 my-2">
		
		<table width="90%" style="font-size:13px;">
			<tr height="40">
				<td width="40%" align="right" class="pe-4">카드종류</td>
				<td align="left">
					<div class="d-inline-flex">
						<select name="bank_kind" class="form-select form-select-sm myfs13"  disabled>
							<option value="0" selected>입금할 은행을 선택하세요.</option>
							<option value="1">국민은행 111-00000-0000</option>
							<option value="2">신한은행 222-00000-0000</option>
						</select>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="right" class="pe-4">입금자명</td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="bank_sender" size="20" value="" 
							class="form-control form-control-sm" disabled>
					</div>
				</td>
			</tr>
		</table>

	</div>
</div>
<br>

<div class="row">
	<div class="col" align="center">
		<a href="javascript:Check_Value()"  class="btn btn-sm btn-dark text-white">&nbsp;결제하기&nbsp;</a>
	</div>
</div>

</form>

<br><br><br>
<?
	include "main_bottom.php";
?>