<?
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	ini_set("display_errors", 1);
	
	mysqli_report(MYSQLI_REPORT_OFF);
	
	$db = mysqli_connect("localhost", "shop36", "1234", "shop36");
	if (!$db) exit("연결에러");
	
	$admin_id = "admin";
	$admin_pw = "1234";
	
	// 상품상태 배열
	$a_status = array("상품상태", "판매중", "판매중지", "품절");
	$n_status = count($a_status);
	// 아이콘 배열
	$a_icon = array("아이콘 선택", "New", "Hit", "Sale");
	$n_icon = count($a_icon);
	// 검색 옵션 배열
	$a_text1 = array("", "제품이름", "제품번호");
	$n_text1 = count($a_text1);
	
	// 장르 배열(DB에서 불러옴)
	$g_sql = "select * from genre";
	$g_result = mysqli_query($db, $g_sql);
	$a_genre = array();
	while ($g_row = mysqli_fetch_array($g_result)) {
		$a_genre[$g_row['id']] = $g_row['name'];
	}
	$n_genre = count($a_genre);
	
	$baesongbi = 5000;
	$max_baesongbi = 100000;
	
	$a_state = array("전체", "주문신청", "주문확인", "입금확인", "배송중", "주문완료", "주문취소");
	$n_state = count($a_state);
	
	$a_card = array("카드", "국민카드", "신한카드", "우리카드", "하나카드");
	$n_card = count($a_card);
	
	$a_bank_kind = array("입금 은행", "국민은행 111-00000-0000", "신한은행 222-00000-0000");
	$n_bank_kind = count($a_bank_kind);
	
	// 페이지네이션 함수
	$page_line =12;
	$page_block=5;
	
	function mypagination($query, $args, &$count, &$pagebar)
	{
		global $db, $page_line, $page_block;			// 서버DB 정보

		$page=$_REQUEST["page"] ? $_REQUEST["page"] : 1;	// page초기화
		
		$url=basename($_SERVER['PHP_SELF']) . "?" . $args;    // 문서이름?전송할 변수들
		
		// 전체 레코드개수
		$sql = strtolower( $query );
		$sql ="select count(*) " . substr($sql, strpos($sql,"from"));
		$result=mysqli_query($db, $sql);
		if (!$result) exit("에러: $sql <br>" . mysqli_error($db));
		$row=mysqli_fetch_array($result);
		$count = $row[0];

		// 페이지내 자료
		$first = ($page-1) * $page_line;
		
		$sql = str_replace(";", "", $query);
		$sql .= " limit $first, $page_line";
		$result=mysqli_query($db, $sql);
		if (!$result) exit("에러: $sql <br>" . mysqli_error($db));

		// pagebar html
		$pages = ceil($count/$page_line);				// 페이지수
		$blocks = ceil($pages/$page_block);			// 블록수 
		$block = ceil($page/$page_block);			// 블록 위치
		$page_s = $page_block * ($block-1);		// 블록의 시작페이지
		$page_e = $page_block * $block;				// 블록의 마지막페이지
		if ($blocks <= $block) $page_e = $pages;

		$pagebar .="<nav>
			<ul class='pagination pagination-sm justify-content-center py-1'>";

		if ($block > 1)				// 이전 블록으로
			$pagebar .="<li class='page-item'>
					<a class='page-link' href='$url&page=$page_s'>◀</a>
				</li>";

		for($i=$page_s+1; $i<=$page_e; $i++)
		{
			if ($page == $i)			// 선택한 page
				$pagebar .="<li class='page-item active'>
						<span class='page-link mycolor1'>$i</span>
					</li>";
			else
				$pagebar .="<li class='page-item'>
						<a class='page-link' href='$url&page=$i'>$i</a>
					</li>";
		}

		if ($block < $blocks)		// 다음 블록으로
			$pagebar .="<li class='page-item'>
					<a class='page-link' href='$url&page=" . $page_e+1 . "'>▶</a>
				</li>";
				
		$pagebar .="</ul>
			</nav>";
			
		return $result;
	}
?>