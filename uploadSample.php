<?php //1701140_변수정

    if(isset($_REQUEST['write'])) {
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_Loc = $_FILES['file']['tmp_name'];
        $file_store = "upload/".$file_name;
        
        move_uploaded_file($file_tem_Loc, $file_store);
    } 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>글 쓰기 페이지</title>
	</head>
	<body> 
		
		
		<div class="container">
			<h2>새 글쓰기</h2>
			<form action="write.php" method="post">
			<label>Upload Files</lable>
            <p><input type="file" name="file"/></p>
            <p><input type="submit" name="upload" value="Upload"></p>
			<button type="submit" class ="btn btn-success" name="write" onclick="submitContents()">글 등록</button> <!-- submit, 글 등록 -->
			<button class="btn btn-primary" onclick="location.href='board.php'">글 목록</button> <!-- 글 목록 -->
		</div>	
	</body>
</html>
