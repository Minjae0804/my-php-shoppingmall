<?
	include "main_top.php";
	
?>
<script>
	function cart_edit(kind,pos) 
	{
		if (kind=="deleteall") 
			location.href = "cart_edit.php?kind=deleteall";
		else if (kind=="delete")
			location.href = "cart_edit.php?kind=delete&pos="+pos;
		else if (kind=="insert")	
		{
			var num=eval("form2.num"+pos).value;
			location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
		}
		else if (kind=="update")	
		{
			var num=eval("form2.num"+pos).value;
			location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
		}
	}
</script>

<!-- form2 시작 -->
<form name="form2" method="post" action="">
<br><br>
<div class="row m-3 mb-0">
	<div class="col" align="center">
		<div class="col" align="left">
			<h2 style="font-size: 40px"><font color='#AF2031'>&nbsp;&nbsp;&nbsp;장바구니</font></h2>
		</div>
		<hr class="m-0">
		<?
			$cart = $_COOKIE["cart"] ?? [];
			$n_cart = $_COOKIE["n_cart"] ?? 0;
			$cartitem = 0;
			for($i = 1; $i <= $n_cart; $i++) if($cart[$i]) { $cartitem = 1; break; } 
			if($cartitem) {
		?>
		<table class="table table-sm mb-5">
			<tr height="40" class="bg-light">
				<td width="10%">이미지</td>
				<td width="35%">상품정보</td>
				<td width="10%">판매가</td>
				<td width="20%">수량</td>
				<td width="10%">금액</td>
				<td width="10%">삭제</td>
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
						<input type="text" name="num<?=$i?>" size="2" value="<?=$num ?>" class="form-control form-control-sm text-center">

					</div>
					<a href = "javascript:cart_edit('update','<?=$i?>')" class="btn btn-sm mybutton mb-1" style="color:#0066CC">수정</a> 
				</td>
				<td><?=number_format($price * $num); ?></td>
				<td>
					<a href = "javascript:cart_edit('delete','<?=$i?>')" class="btn btn-sm mybutton" style="color:#D06404">삭제</a> 
				</td>
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
		<a href="index.html"  class="btn btn-sm btn-outline-secondary mx-1 text-light">&nbsp;계속 쇼핑하기&nbsp;</a>
		<a href="javascript:cart_edit('deleteall',0)"  class="btn btn-sm btn-outline-secondary mx-1 text-light">&nbsp;장바구니 비우기&nbsp;</a>
		<a href="order.php"  class="btn btn-sm btn-dark text-white mx-1">&nbsp;결재하기&nbsp;</a>
		
		<? } else {?>
			<br><br><br><br><br>
			<h2 class="m-3 mt-5" style="font-size: 30px">장바구니가 비었습니다</h2>
			<p>게임들을 더 둘러보세요!</p>
			<br>
			<a href="index.html"  class="btn btn-sm btn-outline-secondary mx-1 text-light">&nbsp;둘러보기&nbsp;</a>
			<br><br><br><br><br><br><br><br><br><br>
			
		<? } ?>
	</div>
</div>




<div class="container">
<div class="row mt-5 mb-1">
	<div class="col" align="left">
		<h2 style="font-size: 35px"><font color='#AF2031'>&nbsp;&nbsp;추천작</font></h2>
	</div>	
</div>		
<hr class="mt-0 mb-1">
<br>
<?
	$sql = "select * from game where icon_hit = 1 and status = 1 order by rand() limit 8";
	$result1=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result1);
?>

<div class="row">
	<? foreach($result1 as $row) {
			$id = $row["id"];
			$genre = $a_genre[$row["genre"]];
			$name = $row["name"];
			$coname = $row["coname"];
			$icon1 = $row["icon_new"];
			$icon2 = $row["icon_hit"];
			$icon3 = $row["icon_sale"];
			$discount = $row["discount"] . "%";
			$saleprice = "₩ " . number_format(round($row["price"] * ((100 - $row["discount"])/100), -2));
			$price = "₩ " . number_format($row["price"]);
			$image1 = $row["image1"] == "" ? "p1.png" : $row["image1"];
	?>
	<div class="col-sm-3 mb-3">
		<div class="card h-100"  style="background-color: transparent;">
			<div class="icon-row" style="display: flex; gap: 1px; align-items: flex-end; margin-bottom: 10px; min-height: 30px;">
				&nbsp;&nbsp;<? if($icon1) { ?><span style="background-color: #E2B639; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">신작</span><? } ?><? if($icon2) { ?><span style="background-color: #63ADB6; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">인기</span><? } ?><? if($icon3) { ?><span style="background-color: #5BA640; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">할인</span><? } ?>
			</div>
			<div class="zoom_image" align="center" style="border-radius: 30px; overflow: hidden; display: inline-block; box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25);">
				<a href="product.php?id=<?=$id ?>"><img src="product/<?=$image1 ?>" 
					height="360" class="card-img-top img-fluid"></a>
			</div>
			<div class="card-body" align="left" style="font-size:20px;">
				<div class="card-title" >
					<div class="name-wrapper">
						<a href="product.php?id=<?=$id ?>" class="sliding-text" style="font-family:'SCDream7'; font-size: 22px; color: #444444;"><?=$name ?></a><br>
					</div>
					<!-- <a href="product.php?id=<?=$id ?>" style="font-family:'SCDream5'; font-size:13px;"><?=$coname ?></a><br> -->
				</div>
				<p class="card-text" align="left" style="font-size: 21px; font-family: SCDream4; color: #555555;">
					<? if($row["discount"]) { ?>
						<b style="color: #AF2031;"><?=$saleprice ?></b>
						&nbsp;<small><font color='#999999' style="font-family:SCDream5;"><strike><?=$price ?></strike></font> 
						<span style="background-color: #AF2031; color: white; padding: 2px 8px; border-radius: 8px; font-size: 15px; display: inline-block; margin-left: 5px; position: relative; top: 3px; float: right; font-family: SCDream5;">
							<?=$row["discount"] ?>%
						</span>
						</small>
					<? } else { ?>
						<b><?=$price ?></b>
					<? } ?>
					<br><br>
				</p>
			</div>
		</div>
	
	</div>
	<? } ?>
</div>
<br><br><br><br><br>
</section>
<div class="container">
</form>

<?
	include "main_bottom.php";
?>