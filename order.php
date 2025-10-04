<?
	include "main_top.php";
?>
<script>
			function Check_Value() {
				if (!form2.o_name.value) {
					alert("주문자 이름이 잘못 되었습니다.");	form2.o_name.focus();	return;
				}
				if (!form2.o_tel1.value || !form2.o_tel2.value || !form2.o_tel3.value) {
					alert("핸드폰이 잘못 되었습니다.");	form2.o_tel1.focus();	return;
				}
				if (!form2.o_email.value) {
					alert("이메일이 잘못 되었습니다.");	form2.o_email.focus();	return;
				}
				if (!form2.o_zip.value) {
					alert("우편번호가 잘못 되었습니다.");	form2.o_zip.focus();	return;
				}
				if (!form2.o_juso.value) {
					alert("주소가 잘못 되었습니다.");	form2.o_juso.focus();	return;
				}

				if (!form2.r_name.value) {
					alert("받으실 분의 이름이 잘못 되었습니다.");	form2.r_name.focus();	return;
				}
				if (!form2.r_tel1.value || !form2.r_tel2.value || !form2.r_tel3.value) {
					alert("핸드폰이 잘못 되었습니다.");	form2.r_tel1.focus();	return;
				}
				if (!form2.r_email.value) {
					alert("이메일이 잘못 되었습니다.");	form2.r_email.focus();	return;
				}
				if (!form2.r_zip.value) {
					alert("우편번호가 잘못 되었습니다.");	form2.r_zip.focus();	return;
				}
				if (!form2.r_juso.value) {
					alert("주소가 잘못 되었습니다.");	form2.r_juso.focus();	return;
				}

				form2.submit();
			}

			function FindZip(zip_kind) 
			{
				window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=490,height=320");
			}

			function SameCopy(str) {
				if (str == "Y") {
					form2.r_name.value = form2.o_name.value;
					form2.r_zip.value = form2.o_zip.value;
					form2.r_juso.value = form2.o_juso.value;
					form2.r_tel1.value = form2.o_tel1.value;
					form2.r_tel2.value = form2.o_tel2.value;
					form2.r_tel3.value = form2.o_tel3.value;
					form2.r_email.value = form2.o_email.value;
				}
				else {
					form2.r_name.value = "";
					form2.r_zip.value = "";
					form2.r_juso.value = "";
					form2.r_tel1.value = "";
					form2.r_tel2.value = "";
					form2.r_tel3.value = "";
					form2.r_email.value = "";
				}
			}
</script>
<br><br>
<div class="row m-3 mb-0">
	<div class="col" align="center">
		<div class="col" align="left">
			<h2><font color='#AF2031'>&nbsp;&nbsp;&nbsp;주문 및 배송정보 입력</font></h2>
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
<form name="form2" method="post" action="order_pay.php">

<div class="row mx-1 my-0">
	<div class="col" align="center">
		<?
			if($_COOKIE["cookie_id"]) {
				$sql = "select * from member where id = {$_COOKIE["cookie_id"]}";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_array($result);
				
				$member_id = $row["id"];
				$name = $row["name"];
				$email = $row["email"];
				$zip = $row["zip"];
				$juso = $row["juso"];
				
				$tel1 = trim(substr($row["tel"],0,3));
				$tel2 = trim(substr($row["tel"],3,4));
				$tel3 = trim(substr($row["tel"],7,4));
				
			} else {
				$member_id = 0;
			}
		?>
		<font size="4" color="#B90319"><h3 style="font-size:25px; font-family:'SCDream6';">주문정보</h3></font>
		<hr class="m-0 my-2">
		
		<table  style="font-size:13px;">
			<tr height="40">
				<td align="left" width="100">이름 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="o_name" size="20" value="<?=$name ?>" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left" width="20%">휴대폰 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="o_tel1" size="3" maxlength="3" value="<?=$tel1 ?>" 
							class="form-control form-control-sm">-
						<input type="text" name="o_tel2" size="4" maxlength="4" value="<?=$tel2 ?>"		
							class="form-control form-control-sm">-
						<input type="text" name="o_tel3" size="4" maxlength="4" value="<?=$tel3 ?>"		
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">이메일 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="o_email" size="50" value="<?=$email ?>" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="80">
				<td align="left">주소 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex mb-1">
						<input type="text" name="o_zip" size="5" maxlength="5" value="<?=$zip ?>" 
							class="form-control form-control-sm">&nbsp;
					</div>
					<a href="javascript:FindZip(1)"  class="btn btn-sm btn-secondary text-white mb-1"  
						style="font-size:12px">우편번호 찾기</a><br>
					<div class="d-inline-flex">
						<input type="text" name="o_juso" size="50" value="<?=$juso ?>" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
		</table>
		
	</div>
</div>

<br>

<div class="row mx-1 my-3">
	<div class="col" align="center">
	
		<font size="4" color="#B90319"><h3 style="font-size:25px; font-family:'SCDream6';">배송정보</h3></font>
		<hr class="m-0 my-2">
	
		<table style="font-size:13px;">
			<tr height="40">
				<td align="left" width="20%">위 복사</td>
				<td align="left">
					<div class="d-inline-flex">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="same" 
								onclick="javascript:SameCopy('Y')">
							<label class="form-check-label me-2">예</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="same" 
								onclick="javascript:SameCopy('N')">
							<label class="form-check-label">아니오</label>
						</div>
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">이름 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="r_name" size="20" value="" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">휴대폰 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="r_tel1" size="3" maxlength="3" value="010" 
							class="form-control form-control-sm">-
						<input type="text" name="r_tel2" size="4" maxlength="4" value=""
							class="form-control form-control-sm">-
						<input type="text" name="r_tel3" size="4" maxlength="4" value=""
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="40">
				<td align="left">이메일 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex">
						<input type="text" name="r_email" size="50" value="" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="80">
				<td align="left">주소 <font color="red">*</font></td>
				<td align="left">
					<div class="d-inline-flex mb-1">
						<input type="text" name="r_zip" size="5" maxlength="5" value="" 
							class="form-control form-control-sm">&nbsp;
					</div>
					<a href="javascript:FindZip(2)"  class="btn btn-sm btn-secondary text-white mb-1"  
						style="font-size:12px">우편번호 찾기</a><br>
					<div class="d-inline-flex">
						<input type="text" name="r_juso" size="50" value="" 
							class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr height="90">
				<td align="left">요구사항</td>
				<td align="left">
					<div class="d-inline-flex">
						<textarea name="memo" cols="50" rows="3" 
							class="form-control form-control-sm"></textarea>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>

<div class="row mx-5">
	<div class="col" align="center">
		<a href="javascript:Check_Value()" class="btn btn-sm btn-dark text-white">
			&nbsp;다 &nbsp;&nbsp; 음&nbsp;</a>
	</div>
</div>

</form>
<br><br><br><br><br>
<?
	include "main_bottom.php";
?>
