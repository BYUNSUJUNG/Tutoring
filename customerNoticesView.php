<?php //1701140_변수정 ?>
<?php
	// view.php: 특정 글의 상세보기
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("customerNoticesDao.php");
	/* 
		1. request에서 글의 id를 추출
		2. 해당 번호의 글을 읽고, 조회수 1 증가	
		3. 읽은 글을 출력한다
	*/
	$writer = requestValues("writer"); // tools.php의 함수, $writer = isset($_REQUEST["writer"])?$_REQUEST["writer"]:"";
	$num = requestValues("num"); 

	$bdao = new customerNoticesDao(); // 생성자 실행 -> db연결됨
	$msg = $bdao->getMsg($num);
	$bdao->increaseHits($num);
	
	session_start(); // 세션 시작

	$id = isset($_SESSION["id"])?$_SESSION["id"]:"";
	$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
	if(!$id) {
		errorBack("로그인부터 하시오");
		/* 
			tools.php의 함수, 메세지 창을 띄우고 전 페이지로 이동함
			alert('<?= $msg ?>'); // 창 띄움
			history.back(); 
		*/
    } 
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>공지사항</title>
		<!--Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<?php require("html_head.php") ?>
		<?php require("customer_head.php") ?>
	</head>
	<body>
		<?php require("top_nav.php") ?>
		<?php require("nav.php") ?>
		<article>
			<table class="table">
				<tr>
					<th>제목</th> <!-- title -->
					<td><?=$msg["title"]?></td>
				</tr>
				<tr>
					<th>작성자</th> <!-- writer -->
					<td><?= $msg["writer"]?></td>
				</tr>
				<tr>
					<th>작성일지</th> <!-- regtime -->
					<td><?= $msg["regtime"]?></td>
				</tr>
				<tr>
					<th>조회수</th> <!-- hits -->
					<td><?= $msg["hits"]?></td>
				</tr>
				<tr>
					<th>파일</th> <!-- file -->
					<td><?= $msg["file"]?></td>
				</tr>
				<tr>
					<th>내용</th> <!-- content -->
					<td><?= $msg["content"]?></td>
				</tr>
			</table>
			<input type="button" class="btn btn-primary"
			onclick="location.href='customerNotices.php'" value="글 목록"> <!-- 글 목록 -->
			<?php if($name==$writer) { ?>
				<input type="button" class="btn btn-success"
				onclick="location.href='modify_form.php?num=<?=$num?>&writer=<?=$writer?>&modifyNum=0'" value="글 수정"> <!-- 글 수정 -->
				<input type="button" class="btn btn-danger"
				onclick="location.href='delete_user_check.php?num=<?=$num?>&writer=<?=$writer?>&modifyNum=0'" value="글 삭제"> <!-- 글 삭제 -->
			<?php } ?>
		</article>
		<?php require("footer.php") ?>
	</body>
</html>
	