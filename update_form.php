<?php //1701140_변수정 ?>
<?php 
	session_start(); 	
	$id = isset($_SESSION["id"])?$_SESSION["id"]:"";
?>
<!DOCTYPE html>
<html>
<head>
	<?php require("html_head.php") ?>
	<?php require("update_head.php") ?>
</head> 
<body>
	<?php require("top_nav.php") ?>
	<?php require("nav.php") ?> 
	<?php
		require_once("MemberDao.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
		require_once("tools.php");

		$mdao = new MemberDao(); // 생성자 실행 -> db연결됨
		$member = $mdao->getMember($id); // 아이디가 프라이머리키라서 레코드가 하나뿐
	?>
	<article>
	<h2>회원 정보 수정</h2>
		<hr class="head">
		<form action="update.php" method="post">
		<div class="form-group">
			<label for="name">이름:</label> <!-- name -->
			<input type="text" class="form-control" id="name" name="name" 
			value="<?= $member["name"]?>">
		</div>	
		<div class="form-group">
			<label for="phone">폰 번호:</label> <!-- phone -->
			<input type="text" class="form-control" id="phone" name="phone"
			value="<?= $member["phone"]?>">
		</div>
		<div class="form-group">
			<label for="id">아이디:</label> <!-- id --> 
			<input type="text" class="form-control" id="id" name="id" 
			value="<?= $member["id"]?>" readonly> 
		</div>
		<div class="form-group">
			<label for="pw">비밀번호:</label> <!-- password -->
			<input type="password" class="form-control" id="pw" name="pw"
			value="<?= $member["pw"]?>">
		</div>

		<button type="submit" class="btn btn-primary btn-lg">정보 수정</button> <!-- submit, 정보 수정 -->
	</article>
	<?php require("footer.php") ?>	
</body>
</html>
