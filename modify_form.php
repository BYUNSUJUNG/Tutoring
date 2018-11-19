<?php 
    session_start(); 	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>글 쓰기 페이지</title>
		<!--Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="SmartEditor/js/HuskyEZCreator.js" charset="utf-8"></script>
		<?php require("html_head.php") ?>
		<?php require("write_head.php") ?>
	</head>
	<body> 
		<?php require("top_nav.php") ?>
		<?php require("nav.php") ?>
		<?php
			require_once("MemberDao.php");
			require_once("tools.php");
			require_once("customerNoticesDao.php");
			require_once("customerAdvertisingScheduleDao.php");
			require_once("menuBurgerDao.php");
			require_once("menuChickenDao.php");
			require_once("menuSideDao.php");
			require_once("menuDrinkDao.php");
		
			$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
			$writer = requestValues("writer");

			// 1. 클라이언트가 송신한 num값을 읽는다.
			$num = requestValues("num");
			// 2. 그 값으로 해당하는 게시글을 읽는다.
			$modifyNum = requestValues("modifyNum");

			if($modifyNum==0){
				$dao = new customerNoticesDao();
				$msg = $dao->getMsg($num);
				
			} else if($modifyNum==1) {
				$dao = new customerAdvertisingScheduleDao();
				$msg = $dao->getMsg($num);
				
			} else if($modifyNum==2) {
				$dao = new menuBurgerDao();
				$msg = $dao->getMsg($num);
				
			} else if($modifyNum==3) {
				$dao = new menuChickenDao();
				$msg = $dao->getMsg($num);
				
			} else if($modifyNum==4) {
				$dao = new menuSideDao();
				$msg = $dao->getMsg($num);
				
			} else if($modifyNum==5) {
				$dao = new menuDrinkDao();
				$msg = $dao->getMsg($num);
			} 
			$mdao = new MemberDao(); // 생성자 실행 -> db연결됨
			$member = $mdao->getMember($id); // 아이디가 프라이머리키라서 레코드가 하나뿐

		?>
				
		<div class="top_article">
			<article>
			<form action="modify.php?num=<?= $msg["num"]?>&modifyNum=<?= $modifyNum ?>" method="post">
				<div class="form-group"> <!-- title -->
					<label fox="title">제목:</label>
					<input type="text" class="form-control" id="title" name="title" value="<?= $msg["title"]?>">
				</div>
				<div class="form-group"> <!-- writer -->
					<label for="writer">작성자:</label>
					<input type="text" class="form-control" id="writer" name="writer" value="<?= $writer ?>" readonly>
				</div>

				<div class="form-group"> <!-- file -->
					<label>업로드 파일 선택:</label>
					<input type="file" name="file" value="<?= $msg["file"]?>">
				</div>
			
				<div class="form-group"> <!-- content -->
					<label for="content">내용:</label>
					<textarea id="content" name="content" rows="5"><?= $msg["content"]?></textarea>   <!-- id 없앴음 content -->
				</div>	
			
				<script type="text/javascript">
				var oEditors = [];

				// 추가 글꼴 목록
				//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

				nhn.husky.EZCreator.createInIFrame({
					oAppRef: oEditors,
					elPlaceHolder: "content",
					sSkinURI: "SmartEditor/SmartEditor2Skin.html",	
					fOnAppLoad : function(){
						//예제 코드
						//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
					},
					fCreator: "createSEditor2"
				});

				function submitContents(elClickedObj) {
					oEditors.getById["content"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
					
					// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
					
					try {
						elClickedObj.form.submit();
					} catch(e) {}
				}
				</script>

				<button type="submit" class ="btn btn-success" name="modify" onclick="submitContents()">글 등록</button> <!-- submit, 글 등록 -->
				<button class="btn btn-primary" onclick="location.href='jingeria.php'">글 목록</button> <!-- 글 목록 -->
			</article>	
		</div>	
		<?php require("footer.php") ?>
	</body>
</html>
