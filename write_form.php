<?php //1701140_변수정 ?>
<!DOCTYPE html>
<?php 
    session_start(); 	
?>
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
			require_once("MemberDao.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
			require_once("tools.php");

			$writeNum = requestValues("writeNum");

			session_start(); // 세션 시작

			$writer=isset($_SESSION["name"])?$_SESSION["name"]:"";
		?>
				
		<div class="top_article">
			<article>
				<form action="write.php?writeNum=<?=$writeNum?>" method="post">
				<div class="form-group"> <!-- title -->
					<label fox="title">제목:</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>
				<div class="form-group"> <!-- writer -->
					<label for="writer">작성자:</label>
					<input type="text" class="form-control" id="writer" name="writer" value="<?= $writer ?>" readonly>
				</div>

				<div class="form-group"> <!-- file -->
					<label>업로드 파일 선택:</label>
					<input type="file" name="file">
				</div>
			
				<div class="form-group"> <!-- content -->
					<label for="content">내용:</label>
					<textarea id="content" name="content" rows="5"></textarea>   <!-- id 없앴음 content -->
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

				<button type="submit" class ="btn btn-success" name="write" onclick="submitContents()">글 등록</button> <!-- submit, 글 등록 -->
				<button class="btn btn-primary" onclick="location.href='board.php'">글 목록</button> <!-- 글 목록 -->
			</article>	
		</div>	
		<?php require("footer.php") ?>
	</body>
</html>
