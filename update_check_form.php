<?php //1701140_변수정 ?>
<?php 
    session_start(); 	
?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("update_check_head.php") ?>
</head>
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    

    <article>		
        <h1>비밀번호 확인</h1>
        <hr class="head">
        <div>회원님의 정보를 안전하게 보호하기 위해 비밀번호를 다시 확인합니다.</div>
        <form action="update_check.php" method="post"> <!--post방식으로 값 전달-->
            <div class="form-group">
                <label for="pw">비밀번호</label>
                <input type="password" class="form-control" id="pw" name="pw">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">로그인</button> 
        </form>
        <dir>집게리아은 회원님의 개인정보를 신중히 취급하며, 회원님의 동의 없이는 
        기재하신 회원정보를 공개 및 변경하지 않습니다.</div>
    </article>
    <?php require("footer.php") ?>
</body>
</html>
