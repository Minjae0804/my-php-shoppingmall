<?
	include "main_top.php";
	include "carousel.php";
	
	$sql = "select * from game where icon_new = 1 and status = 1 order by rand() limit 4";
	$result=mysqli_query($db, $sql);
	$args = "genre=$genre";
	$row=mysqli_fetch_array($result);
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	

<!--  제목  -->
<div class="row mt-5 mb-1">
	<div class="col" align="left">
		<h2 style="font-size: 35px"><font color='#AF2031'>&nbsp;&nbsp;신작</font></h2>
	</div>	
</div>	
<hr class="mt-0 mb-1">
<br>
<!--  상품 진열  -->
<div class="row">
	<? foreach($result as $row) {
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
		<div class="card h-100">
			<div class="icon-row" style="display: flex; gap: 1px; align-items: flex-end; margin-bottom: 10px; min-height: 30px;">
				&nbsp;&nbsp;<? if($icon1) { ?><span style="background-color: #E2B639; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">신작</span><? } ?><? if($icon2) { ?><span style="background-color: #63ADB6; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">인기</span><? } ?><? if($icon3) { ?><span style="background-color: #5BA640; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">할인</span><? } ?>
			</div>
			<div class="zoom_image" align="center" style="border-radius: 30px; overflow: hidden; display: inline-block; box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25);">
				<a href="product.php?id=<?=$id ?>"><img src="product/<?=$image1 ?>" 
					height="360" class="card-img-top img-fluid" ></a>
			</div>
			<div class="card-body" align="left" style="font-size:20px;">
				<div class="card-title">
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
<div class="row mt-5 mb-1">
	<div class="col" align="left">
		<h2 style="font-size: 35px"><font color='#AF2031'>&nbsp;&nbsp;베스트셀러</font></h2>
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
		<div class="card h-100">
			<div class="icon-row" style="display: flex; gap: 1px; align-items: flex-end; margin-bottom: 10px; min-height: 30px;">
				&nbsp;&nbsp;<? if($icon1) { ?><span style="background-color: #E2B639; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">신작</span><? } ?><? if($icon2) { ?><span style="background-color: #63ADB6; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">인기</span><? } ?><? if($icon3) { ?><span style="background-color: #5BA640; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">할인</span><? } ?>
			</div>
			<div class="zoom_image" align="center" style="border-radius: 30px; overflow: hidden; display: inline-block; box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25);">
				<a href="product.php?id=<?=$id ?>"><img src="product/<?=$image1 ?>" 
					height="360" class="card-img-top img-fluid"></a>
			</div>
			<div class="card-body" align="left" style="font-size:20px;">
				<div class="card-title">
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
<div class="row mt-5 mb-1">
	<div class="col" align="left">
		<h2 style="font-size: 35px"><font color='#AF2031'>&nbsp;&nbsp;특별 할인</font></h2>
	</div>	
</div>		
<hr class="mt-0 mb-1">
<br>
<?
	$sql = "select * from game where icon_sale = 1 and status = 1 order by regday desc";
	$args = "genre=$genre";
	$result2 = mypagination($sql, $args, $count, $pagebar);
?>

<div class="row">
	<? foreach($result2 as $row) {
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
		<div class="card h-100">
			<div class="icon-row" style="display: flex; gap: 1px; align-items: flex-end; margin-bottom: 10px; min-height: 30px;">
				&nbsp;&nbsp;<? if($icon1) { ?><span style="background-color: #E2B639; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">신작</span><? } ?><? if($icon2) { ?><span style="background-color: #63ADB6; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">인기</span><? } ?><? if($icon3) { ?><span style="background-color: #5BA640; color: white; padding: 3px 10px; border-radius: 6px; font-size: 15px; display: inline-block; margin-left: 5px; font-family: SCDream6;">할인</span><? } ?>
			</div>
			<div class="zoom_image" align="center" style="border-radius: 30px; overflow: hidden; display: inline-block; box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25);">
				<a href="product.php?id=<?=$id ?>"><img src="product/<?=$image1 ?>" 
					height="360" class="card-img-top img-fluid"></a>
			</div>
			<div class="card-body" align="left" style="font-size:20px;">
				<div class="card-title">
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
<br><br><br>
<? echo $pagebar; ?>
<br>
<!-- 신작은 페이지네이션을 하지 않고 8개만 표시하고, 세일 중인 작품은 페이지네이션을 적용시키려고 합니다. --> 

<?
	include "main_bottom.php";
?>