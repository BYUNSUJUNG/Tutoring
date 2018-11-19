<?php //1701140_변수정 ?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("login_head.php") ?>
</head>
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    <article>		
        <h1>로그인</h1>
        <hr class="head">
        <div>좋은 세상을 만드는 집게리아 홈페이지에 오신 것을 환영합니다.</div>
        <form action="login.php" method="post"> <!--post방식으로 값 전달-->
            <div class="form-group">
                <label for="id">아이디</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="pw">비밀번호</label>
                <input type="password" class="form-control" id="pw" name="pw">
            </div>
        
            <button type="submit" class="btn btn-primary btn-lg">로그인</button> 
        </form>
        <button class="btn btn-secondary" onclick="location.href='register_form.php'">아이디 찾기</button>
        <button class="btn btn-secondary" onclick="location.href='register_form.php'">비밀번호 찾기</button>
        <hr>
        <p>아직 집게리아 회원이 아니신가요? </p>
        <p>집게리아 회원이 되시면 다양한 경험을 하실 수 있습니다</p>
        <button class="btn btn-secondary" onclick="location.href='register_form.php'">회원가입</button>
    </article>
    <?php require("footer.php") ?>
</body>
</html>
