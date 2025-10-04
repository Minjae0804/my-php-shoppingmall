<!---------------------------------------------------------------------------------------------
	제목 : PHP 쇼핑몰 실무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "../common.php";
	$id = $_REQUEST["id"];

	$sql = "select * from game where id = $id";
	$result = mysqli_query($db, $sql);
	
	if (!$result) exit("에러: $sql");
	$row = mysqli_fetch_array($result);
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
	function imageView(strImage)
	{
		this.document.images["big"].src = strImage;
	}
</script>

<form name="form1" method="post" action="product_update.php" 
	enctype="multipart/form-data">

<input type="hidden" name="id" value="<?=$id; ?>">

<div class="row mx-1  justify-content-center">
	<div class="col" align="center">

		<h4 class="m-0 mb-3">제품 정보 수정</h4>

		<table class="table table-sm table-bordered myfs12 m-0 p-0">
			<tr>
				<td width="15%" class="bg-light">장르</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<select name="genre" class="form-select form-select-sm bg-light myfs12">
							<? foreach($a_genre as $key => $ele) { ?>
								<? if ($key == $row["genre"]) { ?> <option value="<?=$key; ?>" selected><?=$ele; ?></option>
								<? } else { ?> <option value="<?=$key; ?>"><?=$ele; ?></option> <? } ?>
							<? } ?>
						</select>&nbsp;
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">상품코드</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="code" size="20" value="<?=$row["code"]; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">상품명</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="name" size="80" value="<?=$row["name"]; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">제조사</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="coname" size="30" value="<?=$row["coname"]; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">판매가</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="text" name="price" size="12" value="<?=$row["price"]; ?>" class="form-control form-control-sm">
					</div> 원
				</td>
			</tr>
			<tr>
				<td class="bg-light">옵션</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<select name="opt1" class="form-select form-select-sm bg-light myfs12 me-2" style="width:100px">
							<option value="0" selected>옵션 선택</option>
							<?
								$osql = "select * from opt order by id";
								$oresult = mysqli_query($db, $osql);
								if (!$oresult) exit("에러: $osql");
								foreach($oresult as $row1) { 
									if ($row["opt1"] == $row1["id"]) { 
										echo "<option value=\"{$row1['id']}\" selected>{$row1['name']}</option>"; 
									} else {
										echo "<option value=\"{$row1['id']}\">{$row1['name']}</option>"; 
									}
								}
							?>
						</select>
						<select name="opt2" class="form-select form-select-sm bg-light myfs12 me-2" style="width:100px">
							<option value="0" selected>옵션 선택</option>
							<?
								mysqli_data_seek($oresult, 0);
								foreach($oresult as $row1) { 
									if ($row["opt2"] == $row1["id"]) { 
										echo "<option value=\"{$row1['id']}\" selected>{$row1['name']}</option>"; 
									} else {
										echo "<option value=\"{$row1['id']}\">{$row1['name']}</option>"; 
									}
								}
							?>
						</select>&nbsp;
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">상품상태</td>
				<td align="left" class="ps-2">
					<div class="form-check form-check-inline pt-2">
						<input class="form-check-input" type="radio" name="status" value="1" <?=$row["status"] == 1 ? "checked" : ""; ?>>
						<label class="form-check-label me-2">판매중</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="2" <?=$row["status"] == 2 ? "checked" : ""; ?>>
						<label class="form-check-labe me-2">판매중지</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="3" <?=$row["status"] == 3 ? "checked" : ""; ?>>
						<label class="form-check-label me-2">품절</label>
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">아이콘</td>
				<td align="left" class="ps-2">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="1" name="icon_new" <?=$row["icon_new"] ? "checked" : ""; ?>>
							<label class="form-check-label me-2">New</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="1" name="icon_hit" <?=$row["icon_hit"] ? "checked" : ""; ?>>
							<label class="form-check-label me-2">Hit</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" value="1" name="icon_sale" <?=$row["icon_sale"] ? "checked" : ""; ?>>
							<label class="form-check-label me-2">sale</label>
						</div>
						할인율: &nbsp;
						<div class="d-inline-flex">
							<input type="text" name="discount" value="<?=$row["discount"]; ?>" size="2" maxlength="3" class="form-control form-control-sm">
						</div> %
				</td>
			</tr>
			<tr>
				<td class="bg-light">등록일</td>
				<td align="left" class="ps-2">
					<div class="d-inline-flex">
						<input type="date" name="regday" value="<?=$row["regday"]; ?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bg-light">이미지<br>(삭제할 이미지 체크)</td>
				<td align="left" class="ps-2">
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$row["image1"] ? $row["image1"] : "p1.png" ?>" width="50" height="50" class="img-thumbnail" 
								style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
								onclick="document.getElementById('zoomModalLabel').innerText='<?=$row["image1"] ?>'; picname.src='../product/<?=$row["image1"] ? $row["image1"] : "p1.png" ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="hidden" name="imagename1" value="<?=$row["image1"] ?>">
							<input type="checkbox" name="checkno1" value="1">
							<b>이미지1 : </b>&nbsp;<?=$row["image1"] ? $row["image1"] : "이미지가 없습니다." ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image1" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$row["image2"] ? $row["image2"] : "p1.png" ?>" width="50" height="50" class="img-thumbnail" 
								style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
								onclick="document.getElementById('zoomModalLabel').innerText='<?=$row["image2"] ?>'; picname.src='../product/<?=$row["image2"] ? $row["image2"] : "p1.png" ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="hidden" name="imagename2" value="<?=$row["image2"] ?>">
							<input type="checkbox" name="checkno2" value="1">
							<b>이미지2 : </b>&nbsp;<?=$row["image2"] ? $row["image2"] : "이미지가 없습니다."  ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image2" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$row["image3"] ? $row["image3"] : "p1.png" ?>" width="50" height="50" class="img-thumbnail" 
								style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
								onclick="document.getElementById('zoomModalLabel').innerText='<?=$row["image3"] ?>'; picname.src='../product/<?=$row["image3"] ? $row["image3"] : "p1.png"?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="hidden" name="imagename3" value="<?=$row["image3"] ?>">
							<input type="checkbox" name="checkno3" value="1">
							<b>이미지3 : </b>&nbsp;<?=$row["image3"] ? $row["image3"] : "이미지가 없습니다."  ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image3" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$row["image4"] ? $row["image4"] : "p1.png" ?>" width="50" height="50" class="img-thumbnail" 
								style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
								onclick="document.getElementById('zoomModalLabel').innerText='<?=$row["image4"] ?>'; picname.src='../product/<?=$row["image4"] ? $row["image4"] : "p1.png"?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="hidden" name="imagename4" value="<?=$row["image4"] ?>">
							<input type="checkbox" name="checkno4" value="1">
							<b>이미지4 : </b>&nbsp;<?=$row["image4"] ? $row["image4"] : "이미지가 없습니다."  ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image4" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$row["image5"] ? $row["image5"] : "p1.png" ?>" width="50" height="50" class="img-thumbnail" 
								style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
								onclick="document.getElementById('zoomModalLabel').innerText='<?=$row["image5"] ?>'; picname.src='../product/<?=$row["image5"] ? $row["image5"] : "p1.png" ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="hidden" name="imagename5" value="<?=$row["image5"] ?>">
							<input type="checkbox" name="checkno5" value="1">
							<b>이미지5 : </b>&nbsp;<?=$row["image5"] ? $row["image5"] : "이미지가 없습니다."  ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image5" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
					<table class="my-1">
					<tr>
						<td>
							<img src="../product/<?=$row["image6"] ? $row["image6"] : "p1.png" ?>" width="50" height="50" class="img-thumbnail" 
								style='cursor:pointer' data-bs-toggle="modal" data-bs-target="#zoomModal" 
								onclick="document.getElementById('zoomModalLabel').innerText='<?=$row["image6"] ?>'; picname.src='../product/<?=$row["image6"] ? $row["image6"] : "p1.png" ?>'">
						</td>
						<td align="left" class="ps-3">
							<input type="hidden" name="imagename6" value="<?=$row["image6"] ?>">
							<input type="checkbox" name="checkno6" value="1">
							<b>이미지6 : </b>&nbsp;<?=$row["image6"] ? $row["image6"] : "이미지가 없습니다."  ?><br>
							<div class="d-inline-flex">
								<input type="file" name="image6" class="form-control form-control-sm myfs12">
							</div>
						</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="bg-light">게임 설명</td>
				<td align="left" class="ps-2">
					<b>설명주제 1 : </b>&nbsp;
					<div class="d-inline-flex">
						<input type="text" name="captbig1" size="80" value="<?=$row["captbig1"]; ?>" class="form-control form-control-sm">
					</div><br>
					<b>상세설명 1 : </b>&nbsp;
					<div class="d-inline-flex">
						<textarea name="captsmall1" rows="5" cols="80" class="form-control form-control-sm myfs12"><?=$row["captsmall1"]; ?></textarea>
					</div>
					<br><br>
					<b>설명주제 2 : </b>&nbsp;
					<div class="d-inline-flex">
						<input type="text" name="captbig2" size="80" value="<?=$row["captbig2"]; ?>" class="form-control form-control-sm">
					</div><br>
					<b>상세설명 2 : </b>&nbsp;
					<div class="d-inline-flex">
						<textarea name="captsmall2" rows="5" cols="80" class="form-control form-control-sm myfs12"><?=$row["captsmall2"]; ?></textarea>
					</div>
					<br><br>
					<b>설명주제 3 : </b>&nbsp;
					<div class="d-inline-flex">
						<input type="text" name="captbig3" size="80" value="<?=$row["captbig3"]; ?>" class="form-control form-control-sm">
					</div><br>
					<b>상세설명 3 : </b>&nbsp;
					<div class="d-inline-flex">
						<textarea name="captsmall3" rows="5" cols="80" class="form-control form-control-sm myfs12"><?=$row["captsmall3"]; ?></textarea>
					</div>
					<br><br>
					<b>설명주제 4 : </b>&nbsp;
					<div class="d-inline-flex">
						<input type="text" name="captbig4" size="80" value="<?=$row["captbig4"]; ?>" class="form-control form-control-sm">
					</div><br>
					<b>상세설명 4 : </b>&nbsp;
					<div class="d-inline-flex">
						<textarea name="captsmall4" rows="5" cols="80" class="form-control form-control-sm myfs12"><?=$row["captsmall4"]; ?></textarea>
					</div>
				</td>
			</tr>
		</table>

		<a href="javascript:form1.submit();"  
			class="btn btn-sm btn-dark text-white my-2">&nbsp;저 장&nbsp;</a>&nbsp;
		<a href="javascript:history.back();"  c
			lass="btn btn-sm btn-outline-dark my-2">&nbsp;돌아가기&nbsp;</a>

	</div>
</div>
<br>
<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>

<!-- Zoom Modal 이미지 -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title" id="zoomModalLabel">상품명1</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" align="center">
				<img src="#" name="picname" class="img-fluid img-thumbnail" style='cursor:pointer' data-bs-dismiss="modal">
			</div>
		</div>
	</div>
</div>