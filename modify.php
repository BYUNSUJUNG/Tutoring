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
	$num = requestValues("num"); 
	$modifyNum = requestValues("modifyNum");

	$writer = requestValues("writer"); 
    $title = requestValues("title");
	$file = requestValues("file"); 
	$content = requestValues("content");

	if($writer && $title &&  $content) { // 2. 그 값이 모두 존재하면 db삽입
		
		if($modifyNum==0){
			$dao=new customerNoticesDao();
			$dao->updateBoard($num, $writer, $title, $file, $content);
			okGo("글 수정 완료", NOTICES_PAGE);
		} else if($modifyNum==1) {
			$dao=new customerAdvertisingScheduleDao();
			$dao->updateBoard($num, $writer, $title, $file, $content);
			okGo("글 수정 완료", SCHEDULE_PAGE);
		} else if($modifyNum==2) {
			$dao=new menuBurgerDao();
			$dao->updateBoard($num, $writer, $title, $file, $content);
			okGo("글 수정 완료", BURGER_PAGE);
		} else if($modifyNum==3) {
			$dao=new menuChickenDao();
			$dao->updateBoard($num, $writer, $title, $file, $content);
			okGo("글 수정 완료", CHICKEN_PAGE);
		} else if($modifyNum==4) {
			$dao=new menuSideDao();
			$dao->updateBoard($num, $writer, $title, $file, $content);
			okGo("글 수정 완료", DRINK_PAGE);
		} else if($modifyNum==5) {
			$dao=new menuDrinkDao();
			$dao->updateBoard($num, $writer, $title, $file, $content);
			okGo("글 수정 완료", SIDE_PAGE);
		} 
		/*
			tools.php의 함수, 메세지 창을 띄우고 BOARD_PAGE로 이동함
			alert('<?= $msg ?>')
			location.href='<?= $url ?>' 
		*/
	} else //2.1  하나라도 없을 경우
	errorBack("빈칸존재");
	/* 
		tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
		alert('<?= $msg ?>'); // 창 띄움
		history.back(); 
	*/
?>
