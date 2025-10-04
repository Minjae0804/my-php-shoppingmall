<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "main_top.php";
	include "carousel.php";
	$genre = $_REQUEST["genre"];
	$sort = $_REQUEST["sort"];
	if($sort == 1) $a =" order by icon_new desc, regday desc";
	elseif($sort == 2) $a =" order by icon_hit desc, id desc";
	elseif($sort == 3) $a =" order by name";
	elseif($sort == 4) $a =" order by price";
	else $a =" order by price desc";
	
	$sql = "select * from game where status = 1 and genre =" . $genre . $a;
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
?>

<div class="row mt-5">
	<div class="col" align="left">
		<h2 style="font-size: 35px">&nbsp;&nbsp;<font color='#AF2031'><?=$a_genre[$genre]; ?></font></h2>
	</div>	
</div>	
<!--  상품개수 & 정렬 -->
<div class="row m-0">
	<hr class="mt-0 mb-1">
	<div class="col-2" align="left" style="font-size:15px">
		&nbsp;&nbsp;Total <b><font color='#AF2031'><?=$count?></font></b> items
	</div>
	<div class="col" align="right" style="font-size:12px">
		<a href="menu.php?genre=<?=$genre?>&sort=1"><? if($_REQUEST["sort"] == 1) { ?><b><font color='#AF2031'>최신 순</font></b><? } else { ?>최신 순<? } ?></a>&nbsp;|
		<a href="menu.php?genre=<?=$genre?>&sort=2"><? if($_REQUEST["sort"] == 2) { ?><b><font color='#AF2031'>인기 순</font></b><? } else { ?>인기 순<? } ?></a>&nbsp;|
		<a href="menu.php?genre=<?=$genre?>&sort=3"><? if($_REQUEST["sort"] == 3) { ?><b><font color='#AF2031'>이름 순</font></b><? } else { ?>이름 순<? } ?></a>&nbsp;|
		<a href="menu.php?genre=<?=$genre?>&sort=4"><? if($_REQUEST["sort"] == 4) { ?><b><font color='#AF2031'>가격 낮은 순</font></b><? } else { ?>가격 낮은 순<? } ?></a>&nbsp;|
		<a href="menu.php?genre=<?=$genre?>&sort=5"><? if($_REQUEST["sort"] == 5) { ?><b><font color='#AF2031'>가격 높은 순</font></b><? } else { ?>가격 높은 순<? } ?></a>
	</div>	
</div>	
<br>

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
<br>
<?
	include "main_bottom.php";
?>
