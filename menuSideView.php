<?php //1701140_변수정 ?>
<?php
	// view.php: 특정 글의 상세보기
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("menuSideDao.php");
	/* 
		1. request에서 글의 id를 추출
		2. 해당 번호의 글을 읽고, 조회수 1 증가	
		3. 읽은 글을 출력한다
	*/
	$writer = requestValues("writer"); // tools.php의 함수, $writer = isset($_REQUEST["writer"])?$_REQUEST["writer"]:"";
	$num = requestValues("num"); 
	$title = requestValues("title"); 
	$file = requestValues("file"); 

	$bdao = new menuSideDao(); // 생성자 실행 -> db연결됨
	$msg = $bdao->getMsg($num);
	
	session_start(); // 세션 시작


	$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
 
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>버거 메뉴</title>
		<!--Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<?php /* require("html_head.php")*/ ?>


		<?php require("html_head.php"); ?>
		<?php require("menu_head.php"); ?>
	</head>
	<body>
		<?php require("top_nav.php") ?>
		<?php require("nav.php") ?>
		<article>
			<div class="menu">
				<img height="350" width="350" src="images/<?= $msg["file"]?>"/>
			</div>
			<div> 
				<h1><?= $msg["title"]?></h1>
				<?= $msg["content"]?>
			</div>
			<input type="button" class="btn btn-primary"
			onclick="location.href='menuChicken.php'" value="글 목록"> <!-- 글 목록 -->
			<?php if($name==$writer) { ?>
				<input type="button" class="btn btn-danger"
				onclick="location.href='shoppingCart_check.php?menu=Side&title=<?=$title?>&file=<?=$file?>'" value="담기"> <!-- 담기 -->
				<input type="button" class="btn btn-success"
				onclick="location.href='modify_form.php?num=<?=$num?>&writer=<?=$writer?>&modifyNum=4'" value="글 수정"> <!-- 글 수정 -->
				<input type="button" class="btn btn-danger"
				onclick="location.href='delete_user_check.php?num=<?=$num?>&writer=<?=$writer?>&deleteNum=4'" value="글 삭제"> <!-- 글 삭제 -->
			<?php } ?>
		</article>
		<?php require("footer.php") ?>
	</body>
</html>
	