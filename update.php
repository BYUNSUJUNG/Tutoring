<?php //1701140_변수정 ?>
<?php
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("MemberDao.php");
	session_start(); // 세션 시작
	/* 

		1. 아이디, 암호, 이름 값을 REQUEST에서 추출
		2. 그 값이 모두 존재하면 DB에서 해당 정보를 수정한다.
			2.1 그 값이 하나라도 없으면 errorBack(tools.php)

	*/

	// 1. 아이디, 암호, 이름 값을 REQUEST에서 추출
	$name = requestValues("name");
	$phone = requestValues("phone");
	$id = requestValues("id"); // tools.php의 함수, $id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
	$pw = requestValues("pw");


	if($id && $pw && $name) { // 2. 그 값이 모두 존재하면 DB에서 해당 정보를 수정한다.
		$mdao = new MemberDao(); // 생성자 실행 -> db연결됨
		$mdao->updateMember($name, $phone, $id, $pw); //변경할 값 넘겨줌
		$_SESSION["name"] = $name; // board.php에 나타나는 $_SESSION["name"]의 값을 변경시킴
		okGo("회원 정보 수정 완료", MAIN_PAGE );
		/*
			tools.php의 함수, 메세지 창을 띄우고 BOARD_PAGE로 이동함
			alert('<?= $msg ?>')
			location.href='<?= $url ?>' 
		*/		
	}
	else errorBack("모든값입력하셈"); // 2.1 그 값이 하나라도 없으면 errorBack(tools.php)
	/* 
		tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
		alert('<?= $msg ?>'); // 창 띄움
		history.back(); 
	*/
?>