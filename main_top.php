<!---------------------------------------------------------------------------------------------
	제목 : 내 손으로 만드는 PHP 쇼핑몰무 (실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2024.02)
---------------------------------------------------------------------------------------------->
<?
	include "common.php";
	$cookie_id = $_COOKIE["cookie_id"] ?? 0;
	
	if ($cookie_id) {
		$sql = "select * from member where id = $cookie_id";
//		$result=mysqli_query($db, $sql);
//		$row=mysqli_fetch_array($result);
	}
?>
<!doctype html>
<html lang="kr">
<head>
	<link rel="icon" href="images/favicon.png" type="image/png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DaBa: 세상의 모든 게임</title>	
	<link  href="css/bootstrap.min.css" rel="stylesheet">
	<link  href="css/my.css" rel="stylesheet">
	<script src="js/jquery-3.7.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<style>
		.nav-link.dropdown-toggle::after { display: none !important; }
		.nav-link.dropdown-toggle.show svg { color: #AF2031 !important; fill: #AF2031 !important; }
	</style>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
		  const wrappers = document.querySelectorAll(".name-wrapper");

		  wrappers.forEach(wrapper => {
			const text = wrapper.querySelector(".sliding-text");

			if (text.scrollWidth > wrapper.clientWidth) {
			  const distance = text.scrollWidth - wrapper.clientWidth;

			  const pixelsPerSecond = 80;
			  const duration = (distance / pixelsPerSecond).toFixed(2);

			  wrapper.addEventListener("mouseenter", () => {
				text.style.transition = `transform ${duration}s linear`;
				text.style.transform = `translateX(-${distance}px)`;
			  });

			  wrapper.addEventListener("mouseleave", () => {
				text.style.transition = `transform 0.5s ease-out`;
				text.style.transform = `translateX(0)`;
			  });
			}
		  });
		});
	</script>
</head>
<body>
<!-------------------------------------------------------------------------------------------->	

<!--  Title과  메뉴(로그인/회원가입/장바구니/주문조회/게시판/Q&A) -->
<div class="container">
	<div class="row">
		<div class="col fs-3" align="left">
			&nbsp;<a href="index.html"><img src="images/title_logo.png" alt="INDUK Mall 로고" class="logo" width="225"></img></a>
		</div>
	</div>
</div>

<!--  상품 Category 메뉴/ 상품검색 -->
<div style="position: sticky; top: 0; z-index: 1000; background-color: white; background-color: rgba(255, 255, 255, 0.985); box-shadow: 0 20px 20px rgba(0, 0, 0, 0.02); ">
	<div style="max-width: 1350px; margin: 0 auto; padding: 0 15px;">
		<br>
		<div class="col">
			<div class="d-flex">
				<ul class="nav me-auto" style="font-size:17px; font-family:'SCDream6';" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=1&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 1) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 액션 </font></b><? } else { ?> 액션 <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=2&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 2) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 어드벤처 </font></b><? } else { ?> 어드벤처 <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=3&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 3) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 캐주얼 </font></b><? } else { ?> 캐주얼 <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=4&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 4) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 인디 </font></b><? } else { ?> 인디 <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=5&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 5) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 협동 </font></b><? } else { ?> 협동 <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=6&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 6) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 퍼즐 </font></b><? } else { ?> 퍼즐 <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=7&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 7) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> RPG </font></b><? } else { ?> RPG <? } ?></a></li>&nbsp;&nbsp;
					<li class="nav-item zoom_a"><a class="nav-link" href="menu.php?genre=8&sort=1" style="font-size:19px;"><? if($_REQUEST["genre"] == 8) { ?><b><font color='#AF2031' style="font-family: SCDream5;"> 시뮬레이션 </font></b><? } else { ?> 시뮬레이션 <? } ?></a></li>
					
				</ul>
				
				<ul class="nav ms-auto"  style="font-size:17px; font-family:'SCDream6';" >
					
					<li class="nav-item	dropdown" style="margin-left: auto; font-size:17px; font-family:'SCDream6';">
					
						<a class="nav-link dropdown-toggle zoom_a" data-bs-toggle="dropdown" href="#" role="button">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="width: 28px; height: 28px; vertical-align: top;">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
							</svg>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" style="min-width: auto; width: 500px; background-color: rgba(255, 255, 255, 0.97); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
							<script>
								function check_findproduct() {
									if (!form1.find_text.value)  {
										alert('검색어를 입력하세요');
										return;
									}
									form1.submit();
								}
							</script>
							<form name="form1" method="post" action="product_search.php" style="padding-left: 15px; padding-right: 15px;">
								<div class="input-group input-group-sm pt-1" >
									<input type="text" name="find_text" value="" size="20" class="form-control form-control-sm" style="font-family:SCDream5;"placeholder="작품을 검색하세요!">
									<button type="button" class="btn btn-sm btn-outline-secondary" style="font-size:13px;" 
										onClick="check_findproduct();">검색</button>
								</div>
							</form>
						</ul>
					</li>
					
					
					
					
					<li class="nav-item zoom_a">
						<a class="nav-link" href="cart.php" style="font-size:19px;">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16" style="width: 28px; height: 28px; vertical-align: top;">
								<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
							</svg>
						</a>
					</li>

					<li class="nav-item	dropdown" style="margin-left: auto; font-size:17px; font-family:'SCDream6';">
						<a class="nav-link dropdown-toggle zoom_a" data-bs-toggle="dropdown" href="#" role="button">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="width: 28px; height: 28px; vertical-align: top;">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
							</svg>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" style="min-width: auto; width: fit-content; background-color: rgba(255, 255, 255, 0.97); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
							<? if (!$cookie_id) { ?>
								<li class="nav-item zoom_a"><a class="dropdown-item" href="member_login.php">로그인</a></li>
								<li class="nav-item zoom_a"><a class="dropdown-item" href="member_join.php">회원가입</a></li>
							<? } else { ?>
								<li class="nav-item zoom_a"><a class="dropdown-item" href="member_edit.php">계정 정보</a></li>
								<li class="nav-item zoom_a"><a class="dropdown-item" href="member_logout.php">로그아웃</a></li>
							<? } ?>
						</ul>
					</li>
				</ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				
				
				
				
			</div>
		</div>
		
	</div>
		<hr class="mt-0 mb-0" style="border: none; height: 1px; background-color: #CCCCCC; opacity: 1;">
</div>

<div class="container">

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	
