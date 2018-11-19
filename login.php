<?php //1701140_변수정 ?>
<?php
	/*
		1. 로그인 입력폼에서 전달된 아이디, 비밀번호 읽기
		2. 로그인 폼에 입력된 아이디의 회원정보를 db에서 읽기
		3. 그런 아이디를 가진 레코드가 있고, 비밀번호가 맞으면 로그인
			-> 세션에 로그인 정보를 저장.
		4. 레코드가 없거나, 비밀번호가 틀리면 로그인 폼 페이지로 이동(에러 메세지 출력 후)
	*/
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("memberDao.php");
	$id = requestValues("id");  // tools.php의 함수, $id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
	$pw = requestValues("pw");

	if($id && $pw) { // id와 pw가 모두 존재하여 값이 true일 경우 실행
		$mdao = new MemberDao(); // 생성자 실행 -> db연결됨
		$member = $mdao->getMember($id); // boardDao의 getMember($id)를 $member에 담음
		if($member && $member["pw"] == $pw) { // 아이디가 존재하고 비밀번호가 맞을 경우
			session_start(); // 세션 시작
			$_SESSION["id"] = $id; // 입력받은 id값을 $_SESSION["id"]에 넣어둠
			$_SESSION["name"] = $member["name"]; // 가입할 때 입력받았던 이름을 $_SESSION["name"]에 넣어둠
			okGo("로그인에 성공하였습니다.", MAIN_PAGE); 
			/*
				tools.php의 함수, 메세지 창을 띄우고 BOARD_PAGE로 이동함
			 	alert('<?= $msg ?>')
				location.href='<?= $url ?>' 
			*/
		}
	}
	errorBack("아이디 또는 비밀번호가 잘못됨"); 
	/* 
		tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
		alert('<?= $msg ?>'); // 창 띄움
		history.back(); 
	*/
?>