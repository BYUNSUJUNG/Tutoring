<?php

	define ("MAIN_PAGE", "jingeria.php");
	define ("UPDATE_PAGE", "update_form.php");

	define ("BURGER_PAGE", "menuBurger.php");
	define ("CHICKEN_PAGE", "menuChicken.php");
	define ("DRINK_PAGE", "menuDrink.php");
	define ("SIDE_PAGE", "menuSide.php");
	define ("NOTICES_PAGE", "customerNotices.php");
	define ("SCHEDULE_PAGE", "customerAdvertisingSchedule.php");
	define ("SHOPPINGCART_PAGE", "shoppingCartBoard.php");
	

	
	define ("NUM_LINES", 5); // 한 페이지 출력할 게시물 수
	define ("NUM_PAGE_LINKS", 5); // 한 페이지 출력할 페이지 링크 수
	
	define ("MENU_NUM_LINES", 4); // 메뉴 페이지, 한 페이지 출력할 게시물 수
	define ("MENU_NUM_PAGE_LINKS", 5); // 메뉴 페이지, 한 페이지 출력할 페이지 링크 수
	

	//NUM_PAGE_LINKS(5) : startPage 값은 1 6 11 16
	//NUM_PAGE_LINKS(10) : startPage 값은 1 11 21 31
	
	
	function requestValues($name) {
		return isset($_REQUEST[$name])?$_REQUEST[$name]:""; // 받은 값을 다시 돌려줘야하니까 return
	}
	
	function errorBack($msg) {
		?>
		
		<!doctype html>
		<html>
		<head>
			<meta charset="utf-8">
		</head>
		<body>
			<script>
				alert('<?= $msg ?>');
				history.back();
				</script>
		</body>
		</html>
		<?php
		
		exit(); // 돌아가서는 끝내라
	}
	
	function okGo($msg, $url) {
		
		?>
		
		<!doctype html>
		<html>
		<head>
			<meta charset="utf-8">
		</head>
		<body>
			<script>
				alert('<?= $msg ?>');
				location.href='<?= $url ?>';
			</script>
		</body>
		</html>
		
		
		<?php
	}

	function combineUrl($file, $num, $page) {
		$join="?";
		if($num) { // .= :기존문자열을 유지하고 뒤에 값을 붙인다. // $file = $file+$join+"num=$num"
			$file .= $join."num=$num";
			$join = "&";
		}

		if($page) {
			$file .= $join."page=$page";
		}
		return $file;
	}

?>