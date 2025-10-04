<?
	include "common.php";
	
	
	$n_cart = $_COOKIE["n_cart"];
	$cart = $_COOKIE["cart"];
	$kind = $_REQUEST["kind"];
	$pos = $_REQUEST["pos"];
	
	if(!$n_cart) $n_cart = 0;
	
	$id = $_REQUEST["id"];
	$num = $_REQUEST["num"];
	$opts_id1 = $_REQUEST["opts1"] ?? 0;
	$opts_id2 = $_REQUEST["opts2"] ?? 0;
	
	switch ($kind){
		case "insert":
		case "order":
			$n_cart++;
			$cart[$n_cart] = implode("^", array($id, $num, $opts_id1, $opts_id2));
			setcookie("n_cart", $n_cart);
			setcookie("cart[$n_cart]", $cart[$n_cart]);
			break;
		case "delete":
			setcookie("cart[$pos]", "");
			break;
		case "update":
			list($id, $num, $opts_id1, $opts_id2) = explode("^", $cart[$pos]);
			$num = $_REQUEST["num"];
			$cart[$pos] = implode("^", array($id, $num, $opts_id1, $opts_id2));
			setcookie("cart[$pos]", $cart[$pos]);
			break;
		case "deleteall":
			for($i = 1; $i <= $n_cart; $i++) if($cart[$i]) setcookie("cart[$i]", "");
			setcookie("n_cart", "");
			break;
	}
	
	if($kind == "order") echo("<script>location.href='order.php'</script>");
	else echo("<script>location.href='cart.php'</script>");

?>