<?php //1701140_변수정 ?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("register_head.php") ?>
</head> 

<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    <article>	
        <h1>회원 가입</h1>
        <hr class="head">
        <div>좋은 세상을 만드는 집게리아 홈페이지에 오신 것을 환영합니다.</div>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="name">이름</label> <!-- name -->
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="phone">폰 번호</label> <!-- phone -->
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="id">아이디</label> <!-- id -->
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="pw">비밀번호</label> <!-- pw -->
                <input type="password" class="form-control" id="pw" name="pw">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">회원가입</button> <!-- submit, 회원가입 -->
        </form>
    </article>
    <?php require("footer.php") ?>
</body>
</html>
