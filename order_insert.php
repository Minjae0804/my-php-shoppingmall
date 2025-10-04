
<?
	include "common.php";
	
	$member_id = $_COOKIE["cookie_id"] ?? 0;
	$o_name = $_REQUEST["o_name"];
	$o_tel = $_REQUEST["o_tel"];
	$o_email = $_REQUEST["o_email"];
	$o_zip = $_REQUEST["o_zip"];
	$o_juso = $_REQUEST["o_juso"];
	
	$r_name = $_REQUEST["r_name"];
	$r_tel = $_REQUEST["r_tel"];
	$r_email = $_REQUEST["r_email"];
	$r_zip = $_REQUEST["r_zip"];
	$r_juso = $_REQUEST["r_juso"];
	$memo = $_REQUEST["memo"];
	
	$pay_kind = $_REQUEST["pay_kind"];
	
	$card_kind = $_REQUEST["card_kind"] ?? 0;
	$card_no1 = $_REQUEST["card_no1"] ?? 0;
	$card_no2 = $_REQUEST["card_no2"] ?? 0;
	$card_no3 = $_REQUEST["card_no3"] ?? 0;
	$card_no4 = $_REQUEST["card_no4"] ?? 0;
	$card_month = $_REQUEST["card_month"] ?? 0;
	$card_year = $_REQUEST["card_year"] ?? 0;
	$card_pw = $_REQUEST["card_pw"] ?? 0;
	$card_halbu = $_REQUEST["card_halbu"] ?? 0;
	
	$bank_kind = $_REQUEST["bank_kind"] ?? 0;
	$bank_sender = $_REQUEST["bank_sender"] ?? '';
	
	$sql = "select id from jumun where jumunday = curdate() order by id desc limit 1";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	
	$today = date("ymd");
	if ($row) {
		$last_seq = (int)substr($row["id"], 6);  // 뒤 4자리 숫자 추출
		$new_seq = $last_seq + 1;
		$jumun_id = $today . str_pad($new_seq, 4, "0", STR_PAD_LEFT);
	} else {
		$jumun_id = $today . "0001";
	}
	
	$card_okno = $jumun_id;
	
	$totalprice = 0;
	$game_nums = 0;
	$game_names = "";
	
	$cart = $_COOKIE["cart"] ?? [];
	$n_cart = $_COOKIE["n_cart"] ?? 0;
	$total = 0;
	
	for ($i = 1; $i <= $n_cart; ++$i) {
		$cart_item = $cart[$i] ?? "";
		if (!$cart_item) continue;
		
		list($game_id, $num, $opts_id1, $opts_id2) = explode("^", $cart[$i]);
		
		$gamesql = "select * from game where id = $game_id";
		$gameresult = mysqli_query($db, $gamesql);
		$gamerow = mysqli_fetch_array($gameresult);
		
		if ($gamerow["icon_sale"]) { 
			$gameprice = round($gamerow["price"] * ((100 - $gamerow["discount"])/100), -2);
		} else {
			$gameprice = $gamerow["price"];
		}

		$jumunssql = "insert into jumuns(jumun_id, game_id, num, price, prices, discount, opts_id1, opts_id2) values ('$jumun_id', $game_id, $num, $gameprice, $num * $gameprice, {$gamerow["discount"]}, {$opts_id1}, {$opts_id2})";
		$jumunsresult = mysqli_query($db, $jumunssql);
		if (!$jumunsresult) exit("에러: $jumunssql");
		
		if(!$totalprice) $game_names = $gamerow["name"];
		$totalprice += ($num * $gameprice);
		$game_nums++;
		
		setcookie("cart[$i]", "");
	}
	
	$game_names = addslashes($game_names);
	if ($game_nums > 1) $game_names = $game_names . " 외 " . ($game_nums - 1);
	
	$n_cart = 0;
	
	if ($totalprice < $max_baesongbi) {
		$jumunssql = "insert into jumuns values (null, '$jumun_id', 0, 1, $baesongbi, $baesongbi, 0, 0, 0)";
		$totalprice += $baesongbi;
		$jumunsresult = mysqli_query($db, $jumunssql);
		if (!$jumunsresult) exit("에러: $jumunssql");
	}
	
	$jumunsql = "insert into jumun values('$jumun_id', $member_id, '$today', '$game_names', $game_nums, '$o_name', '$o_tel', '$o_email', '$o_zip', '$o_juso', '$r_name', '$r_tel', '$r_email', '$r_zip', '$r_juso', '$memo', $pay_kind, 0, $card_halbu, $card_kind, $bank_kind, '$bank_sender', $totalprice, 1)";
	$jumunresult = mysqli_query($db, $jumunsql);
	if (!$jumunresult) exit("에러: $jumunsql");
	
	echo("<script>location.href='order_ok.php'</script>");
?>