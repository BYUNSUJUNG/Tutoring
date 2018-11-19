<?php //1701140_변수정 ?>
<?php 
/*
	1. 회원가입폼에서 입력된 정보 추출
	2. 모든 입력 필드의 값이 채워져있는 지 확인
		2.1 채워져있지않으면 메시지띄우고 회원가입폼으로 이동
	3. 이미 존재 아이디인지 확인
		3.1 이미 존재하면 메시지띄우고 회원가입폼으로 이동
	4. 디비로 회원정보 넣기
	5. 메인페이지로 이동
*/

	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("memberDao.php");
	
	// 1. 회원가입폼에서 입력된 정보 추출
	$name = requestValues("name"); // tools.php의 함수, $id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
	$phone = requestValues("phone");
	$id = requestValues("id"); 
	$pw = requestValues("pw");
	
	
	if($name && $phone && $id && $pw) { // 2. 모든 입력 필드의 값이 채워져있는 지 확인
		$mdao = new MemberDao();
		if($mdao->getMember($id)) { //3. 이미 존재 아이디인지 확인 
			errorBack("이미 존재하는 아이디입니다."); // tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
		} else { // 아이디가 존재안해서 가입가능
			$mdao->insertMember($name, $phone, $id, $pw); // 입력된 정보 DAO로 넘겨줌
			okGo("가입이 완료되었습니다.", MAIN_PAGE); 
			/*
				tools.php의 함수, 메세지 창을 띄우고 BOARD_PAGE로 이동함
			 	alert('<?= $msg ?>')
				location.href='<?= $url ?>' 
			*/
		}
	} else { // 2.1 채워져있지않으면 메시지띄우고 회원가입폼으로 이동
		errorBack("모든 입력란을 채워주세요"); 
		/* 
			tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
			alert('<?= $msg ?>'); // 창 띄움
			history.back(); 
		*/
	}
	
?> 