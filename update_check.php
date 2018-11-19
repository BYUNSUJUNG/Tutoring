<?php //1701140_변수정 ?>
<?php

	session_start();

	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("memberDao.php");

	$id=$_SESSION["id"];
	$pw = requestValues("pw");

	if($pw) { // id와 pw가 모두 존재하여 값이 true일 경우 실행
		$mdao = new MemberDao(); // 생성자 실행 -> db연결됨
		$member = $mdao->getMember($id); // boardDao의 getMember($id)를 $member에 담음
		if($member && $member["pw"] == $pw) { // 아이디가 존재하고 비밀번호가 맞을 경우

			okGo("로그인에 성공하였습니다.", UPDATE_PAGE); 
			/*
				tools.php의 함수, 메세지 창을 띄우고 BOARD_PAGE로 이동함
			 	alert('<?= $msg ?>')
				location.href='<?= $url ?>' 
			*/
		}
	}
	errorBack("비밀번호가 잘못됨"); 
	/* 
		tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
		alert('<?= $msg ?>'); // 창 띄움
		history.back(); 
	*/
?>