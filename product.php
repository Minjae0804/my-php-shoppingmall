<?
	include "main_top.php";
	$id = $_REQUEST["id"];
	
	$sql = "select * from game where id = $id";
	$result=mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	
	$id = $row["id"];
	$genre = $a_genre[$row["genre"]];
	$name = $row["name"];
	
	$coname = $row["coname"];
	$regday = $row["regday"];
	
	$icon1 = $row["icon_new"];
	$icon2 = $row["icon_hit"];
	$icon3 = $row["icon_sale"];
	$discount = $row["discount"] . "%";
	$saleprice = "₩ " . number_format(round($row["price"] * ((100 - $row["discount"])/100), -2));
	$price = "₩ " . number_format($row["price"]);
	
	$saleprice1 = round($row["price"] * ((100 - $row["discount"])/100), -2);
	$price1 = $row["price"];
	
	$image2 = $row["image2"] == "" ? "nopic.png" : $row["image2"];
	$image3 = $row["image3"] == "" ? "main.png" : $row["image3"];
	$image4 = $row["image4"] == "" ? "main.png" : $row["image4"];
	$image5 = $row["image5"] == "" ? "main.png" : $row["image5"];
	$image6 = $row["image6"] == "" ? "main.png" : $row["image6"];
	
	$captbig1 = $row["captbig1"] ?? "";
	$captbig2 = $row["captbig2"] ?? "";
	$captbig3 = $row["captbig3"] ?? "";
	$captbig4 = $row["captbig4"] ?? "";
	$captsmall1 = $row["captsmall1"] ?? "";
	$captsmall2 = $row["captsmall2"] ?? "";
	$captsmall3 = $row["captsmall3"] ?? "";
	$captsmall4 = $row["captsmall4"] ?? "";

	
	$opt1 = $row["opt1"] ?? 0;
	$opt2 = $row["opt2"] ?? 0;
?>

<script >
	window.addEventListener('DOMContentLoaded', function() {
		cal_price();
	});
	
	function cal_price() 
	{
		form2.prices.value = "₩ " + ((form2.num.value * form2.price.value).toLocaleString());
		form2.num.focus();
	}

	function check_form2(str) 
	{
		if (form2.opts1 && form2.opts1.value == 0) {
			alert("옵션1을 선택하십시요.");
			form2.opts1.focus();
			return;
		}

		if (form2.opts2 && form2.opts2.value == 0) {
			alert("옵션2를 선택하십시요.");
			form2.opts2.focus();
			return;
		}
		if (!form2.num.value) {
			alert("수량을 입력하십시요.");
			form2.num.focus();
			return;
		}
		if (str == "D") {
			form2.action = "order.php";
			form2.kind.value = "order";
			form2.submit();
		}
		else {
			form2.action = "cart_edit.php?kind=insert";
			form2.submit();
		}
	}
	
	function changeQty(delta) {
		const input = document.getElementById('numInput');
		let value = parseInt(input.value) || 1;
		value += delta;
		if (value < 1) value = 1;
		input.value = value;
		cal_price();
	}
</script>
<!-- form2 시작  -->
<form name="form2" method="post" action="">
<input type="hidden" name="kind" value="insert">
<input type="hidden" name="id" value="<?=$id ?>">
<input type="hidden" name="price" value="<?=($row["discount"] ? $saleprice1 : $price1) ?>">
<br><br>
<!--  상품 사진/정보(제품명,가격,옵션)  -->
<div class="row mx-1 my-4">
	<div class="col" align="center">

		<table class="table table-sm table-borderless">
			<tr>
				<td valign="top" align="center" width="50%" style="height: 800px; overflow: hidden;" >
					<img src="product/<?=$image2 ?>" width="80%" 
						class="img-fluid mt-2"  style="cursor:zoom-in; border-radius: 30px; box-shadow: 0 1px 10px rgba(0, 0, 0, 0.25); width: 100%; height: 100%; object-fit: cover;"
						data-bs-toggle="modal" data-bs-target="#zoomModal">
				</td>
				<td  width="50%" align="center" valign="top" class="px-0">
					<br>
					<table width="100%" style="font-size:12px;" class="table table-sm table-borderless p-0 m-0">
						<tr height="5">
							<td colspan="2" align="left" style="padding-left: 70px;">
								<? if($icon1) { ?><span style="background-color: #E2B639; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">신작</span><? } ?><? if($icon2) { ?><span style="background-color: #63ADB6; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">인기</span><? } ?><? if($icon3) { ?><span style="background-color: #5BA640; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">할인</span><? } ?>
								<!--<? if($icon1) { ?><img src="images/i_new.png" style="width: 30px;"><? } ?><? if($icon2) { ?><img src="images/i_hit.png" style="width: 30px;"><? } ?><? if($icon3) { ?><img src="images/i_sale.png" style="width: 30px;"><font size="2" color="red">&nbsp;<b><?=$discount ?></b></font><? } ?> -->
							</td>
						</tr>
						<tr height="50">
							<td width="90%" colspan="2" align="left" style="font-size:20px; color:#222222; padding-left:70px;">
								<h2 style="font-family:'SCDream7';"><?=$name ?></h2>
							</td>
						</tr>
						<tr height="10">
							<td width="50%" align="left" style="padding-left: 70px;">
								<h6 style="font-family:'SCDream6'; font-size:18px";><?=$coname ?></h6>
							</td>
						</tr>
						
						
						
						<? if($opt1 || $opt2) { ?>
						<tr><td colspan="2" style="padding: 0 70px;"><div style="border-top: 1px solid #ccc; margin: 10px 0;"></div></td></tr>
						<? } ?>
						<? 
							if($opt1) {
								$sql1 = "select * from opt where id=" . $opt1 . " order by id";
								$result1 = mysqli_query($db, $sql1);
								while ($row1 = mysqli_fetch_array($result1)) {
						?>
						<tr>
							<td align="left" style="font-size:16px; padding-left:70px;"><b><?=$row1["name"]; ?></b></td>
							<td align="left" >
								<select name="opts1" class="form-select form-select-sm mb-2" style="width:60%; font-size:12px;">
									<option value="0" selected><?=$row1["name"]; ?>을(를) 선택하세요.</option>
									<? 
										$sql2 = "select * from opts where opt_id=" . $opt1 . " order by id";
										$result2 = mysqli_query($db, $sql2);
										while ($row2 = mysqli_fetch_array($result2)) {
									?>
									<option value="<?=$row2["id"] ?>"><?=$row2["name"] ?></option>
									<? } ?>
								</select>
							</td>
						</tr>
						<? } } ?>
						
						<? 
							if($opt2) {
								$sql3 = "select * from opt where id=" . $opt2 . " order by id";
								$result3 = mysqli_query($db, $sql3);
								while ($row3 = mysqli_fetch_array($result3)) {
						?>
						<tr>
							<td align="left" style="font-size:16px; padding-left:70px;"><b><?=$row3["name"]; ?></b></td>
							<td align="left">
								<select name="opts2" class="form-select form-select-sm mb-2" style="width:60%; font-size:12px;">
									<option value="0" selected><?=$row3["name"]; ?>을(를) 선택하세요.</option>
									<? 
										$sql4 = "select * from opts where opt_id=" . $opt2 . " order by id";
										$result4 = mysqli_query($db, $sql4);
										while ($row4 = mysqli_fetch_array($result4)) {
									?>
									<option value="<?=$row4["id"] ?>"><?=$row4["name"] ?></option>
									<? } ?>
								</select>
							</td>
						</tr>
						<? } } ?>
						
						
						
						<tr><td colspan="2" style="padding: 0 70px;"><div style="border-top: 1px solid #ccc; margin: 10px 0;"></div></td></tr>

						<tr height="35">
							<td width="30%" align="left" style="font-size:16px;  padding-left:70px;"><b>판매가</b></td>
							<? if($icon3) { ?>
							<td width="70%" align="left" style="font-size:15px;"><strike><font color='#AF2031'><b><?=$price ?></b></font></strike></td>
							<? } else { ?>
							<td width="70%" align="left" style="font-size:15px;"><b><?=$price ?></b></td>
							<? } ?>
						</tr>
						<? if($row["discount"]) { ?>
						<tr height="35">
							<td align="left" style="font-size:16px; padding-left:70px;"><b>할인가</b></td>
							<td style="font-size:15px;" align="left">
								<b><?=$saleprice ?></b>
								<span style="background-color: #AF2031; color: white; padding: 2px 8px; border-radius: 8px; 
									font-size: 12px; display: inline-block; margin-left: 5px; position: relative; 
									top: -1px; float: mid; font-family: SCDream5;">
									<?=$row["discount"] ?>%
								</span>
							</td>
						</tr>
						<? } ?>
						
						<tr><td colspan="2" style="padding: 0 70px;"><div style="border-top: 1px solid #ccc; margin: 10px 0;"></div></td></tr>
						<tr>
							<td align="left" style="font-size:16px; padding-left:70px;"><b>수량</b></td>
							<td align="left">
								<div>
									<input type="number" style="width: 50px; text-align: center;"name="num" value="<?= $num ?? 1 ?>" min="1"
									   class="form-control form-control-sm"
									   onkeydown="return false;"
									   onchange="cal_price()">
								</div>
							</td>
						</tr>
						<tr>
							<td align="left" style="font-size:16px; padding-left:70px;"><b>금액</b></td>
							<td align="left">
								<div class="d-flex justify-content-between" style="width: 50%;">
									<input type="text" name="prices" value="" size="10"
										class="form-control form-control-sm"
										style="border:0; background-color:white; text-align:left; font-size:18px; font-weight:bold; width:auto;" 
										readonly>
								</div>
								
							</td>
						</tr>
						<tr>
							<td colspan="2" height="50" align="center">
								<br>
								<a href="javascript:check_form2('D')" 
									class="btn btn-sm btn-secondary text-light">바로 구매</a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="javascript:check_form2('C')" 
									class="btn btn-sm btn-outline-secondary text-light">장바구니</a>
							</td>
						</tr>
					</table>

				</td>
			</tr>
		</table>

	</div>
</div>

</form>
<!-- form2 끝 -->
<div class="row mt-5 mb-1">
	<div class="col" align="left">
		<br>
		<h2>&nbsp;&nbsp;게임의 사양</h2>
	</div>	
</div>

</div>
<hr class="mt-0 mb-0">
<section class="game-info-section">
	
	<div class="container">
	  <div class="info-box">
		<div class="info-column">
		  <div class="info-item">
			<div class="label"><h4 style="font-family: SCDream6;">&nbsp;&nbsp;&nbsp;게임명</h4></div>
			<div class="value"><a style="font-family: SCDream5; font-size:16px;">&nbsp;&nbsp;&nbsp;<?=$name?></a></div>
		  </div>
		  <div class="info-item">
			<div class="label"><h4 style="font-family: SCDream6;">&nbsp;&nbsp;&nbsp;발매일</h4></div>
			<div class="value"><a style="font-family: SCDream5; font-size:16px;">&nbsp;&nbsp;&nbsp;<?=$regday?></a></div>
		  </div>
		</div>
		<div class="info-column">
		  <div class="info-item">
			<div class="label"><h4 style="font-family: SCDream6;">&nbsp;&nbsp;&nbsp;개발사</h4></div>
			<div class="value"><a style="font-family: SCDream5; font-size:16px;">&nbsp;&nbsp;&nbsp;<?=$coname?></a></div>
		  </div>
		  <div class="info-item">
			<div class="label"><h4 style="font-family: SCDream6;">&nbsp;&nbsp;&nbsp;장르</h4></div>
			<div class="value"><a style="font-family: SCDream5; font-size:16px;">&nbsp;&nbsp;&nbsp;<?=$genre?></a></div>
		  </div>
		</div>
	  </div>
  </div>
  
</section>
<hr class="mt-0 mb-0">

<div class="container">
<div class="row mt-5 mb-1">
	<div class="col" align="left">
		<br>
		<h2>&nbsp;&nbsp;게임 정보 및 이미지</h2>
	</div>	
</div>	

<hr class="mt-0 mb-0">
<br>
<div id="carouselProductPage" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="999999999"
	style="border-top-left-radius: 40px; border-top-right-radius: 40px; border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; overflow: hidden; box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25);">
	<div class="carousel-indicators d-flex justify-content-end me-10">
		<button type="button" data-bs-target="#carouselProductPage" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true" ></button>
		<button type="button" data-bs-target="#carouselProductPage" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselProductPage" data-bs-slide-to="2" aria-label="Slide 3"></button>
		<button type="button" data-bs-target="#carouselProductPage" data-bs-slide-to="3" aria-label="Slide 4"></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item active" style="position: relative;">
			<img src="product/<?=$image3 ?>" class="d-block w-100" alt="...">
			<div class="black-overlay"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black);
			pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right: 200px; z-index: 2;">
				<h1><?=$captbig1 ?></h1>
				<p><h6><?=$captsmall1 ?></h6></p>
			</div>
		</div>
		<div class="carousel-item" style="position: relative;">
			<img src="product/<?=$image4 ?>" class="d-block w-100" alt="...">
			<div class="black-overlay"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black);
			pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right: 200px; z-index: 2;">
				<h1><?=$captbig2 ?></h1>
				<p><h6><?=$captsmall2 ?></h6></p>
			</div>
		</div>
		<div class="carousel-item" style="position: relative;">
			<img src="product/<?=$image5 ?>" class="d-block w-100" alt="...">
			<div class="black-overlay"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black);
			pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right: 200px; z-index: 2;">
				<h1><?=$captbig3 ?></h1>
				<p><h6><?=$captsmall3 ?></h6></p>
			</div>
		</div>
		<div class="carousel-item" style="position: relative;">
			<img src="product/<?=$image6 ?>" class="d-block w-100" alt="...">
			<div class="black-overlay"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black);
			pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right: 200px; z-index: 2;">
				<h1><?=$captbig4 ?></h1>
				<p><h6><?=$captsmall4 ?></h6></p>
			</div>
		</div>
	</div>
	
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselProductPage" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselProductPage" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>

</div>



<br><br>

<!-- Zoom Modal 이미지 -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background:transparent; border:none; box-shadow:none;">
		<img src="product/<?=$image2 ?>" class="img-thumbnail" style="cursor:pointer; max-width: 100%; max-height: 90vh; width: auto; height: auto; display: block; margin: 0 auto; border-radius: 30px; box-shadow: 0 1px 10px rgba(0, 0, 0, 0.25);" 
			data-bs-dismiss="modal" aria-label="Close">
    </div>
  </div>
</div>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "main_bottom.php";
?>