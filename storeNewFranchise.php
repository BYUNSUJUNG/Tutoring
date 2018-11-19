<?php //1701140_변수정 ?>
<?php 
    session_start(); 	
    $id= isset($_SESSION["id"])?$_SESSION["id"]:"";
?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("menu_head.php") ?>
</head>
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    <?php require("storeSidebar.php") ?>

    <div class="container">		
        <h2>신규 가맹점</h2>
        <hr class="head">
        
    </div>

    <?php require("footer.php") ?>
</body>
</html>
