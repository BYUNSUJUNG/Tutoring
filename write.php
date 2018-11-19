<?php //1701140_변수정 ?>
<?php
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("customerNoticesDao.php");
	require_once("customerAdvertisingScheduleDao.php");
	require_once("menuBurgerDao.php");
	require_once("menuChickenDao.php");
	require_once("menuSideDao.php");
	require_once("menuDrinkDao.php");

	/* 
		1. writer, title, content 값을 request에 추출
		2.그 값이 모두 존재하면 db삽입
			$dao = new BoardDao();
			$dao->insertMsg(값...);
			글 목록 페이지로 이동
			2.1  하나라도 없을 경우 errorBack("빈칸존재");
	*/
	// 1. writer, title, content 값을 request에 추출

	$writeNum = requestValues("writeNum");

 	$writer = requestValues("writer"); // tools.php의 함수, $writer = isset($_REQUEST["writer"])?$_REQUEST["writer"]:"";
	$title = requestValues("title");
	$file = requestValues("file");
	$content = requestValues("content");

	if($writer && $title && $content) { // 2. 그 값이 모두 존재하면 db삽입
		if($writeNum==0){
			$bdao = new customerNoticesDao(); // 생성자 실행 -> db연결됨
			$bdao->insertBoard($writer, $title, $file, $content); // 삽입할 값을 넘겨줌
			okGo("글 등록 완료", NOTICES_PAGE);
			/*
				tools.php의 함수, 메세지 창을 띄우고 BOARD_PAGE로 이동함
				alert('<?= $msg ?>')
				location.href='<?= $url ?>' 
			*/
		} else if($writeNum==1) {
			$bdao = new customerAdvertisingScheduleDao(); // 생성자 실행 -> db연결됨
			$bdao->insertBoard($writer, $title, $file, $content); // 삽입할 값을 넘겨줌
			okGo("글 등록 완료", SCHEDULE_PAGE);

		} else if($writeNum==2) {
			$bdao = new menuBurgerDao(); // 생성자 실행 -> db연결됨
			$bdao->insertBoard($writer, $title, $file, $content); // 삽입할 값을 넘겨줌
			okGo("글 등록 완료", BURGER_PAGE);
		} else if($writeNum==3) {
			$bdao = new menuChickenDao(); // 생성자 실행 -> db연결됨
			$bdao->insertBoard($writer, $title, $file, $content); // 삽입할 값을 넘겨줌
			okGo("글 등록 완료", CHICKEN_PAGE);
		} else if($writeNum==4) {
			$bdao = new menuSideDao(); // 생성자 실행 -> db연결됨
			$bdao->insertBoard($writer, $title, $file, $content); // 삽입할 값을 넘겨줌
			okGo("글 등록 완료", SIDE_PAGE);
		} else if($writeNum==5) {
			$bdao = new menuDrinkDao(); // 생성자 실행 -> db연결됨
			$bdao->insertBoard($writer, $title, $file, $content); // 삽입할 값을 넘겨줌
			okGo("글 등록 완료", DRINK_PAGE);
		}
	} else {//2.1  하나라도 없을 경우
		errorBack("빈칸존재");
	}
	/* 
		tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
		alert('<?= $msg ?>'); // 창 띄움
		history.back(); 
	*/
?>