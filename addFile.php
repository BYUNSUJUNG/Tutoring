<?php

    $errMsg="업로드 실패";

    if ($_FILES["upload"]["error"] == UPLOAD_ERR_OK) {
        $tname = $_FILES["upload"]["tmp_name"];
        $fname = $_FILES["upload"]["name"];
        $fsize = $_FILES["upload"]["size"];

        $save_name = iconv("utf-8", "cp949", $fname); 

        
        require("menuBurgerDAO.php");
        $dao = new menuBurgerDAO();
        $dao->addFileInfo($fname,date("Y-m-d H:i:s"),$fsize); 
        header("Location: menuBurger.php"); 
        exit(); 
    
    } 
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <script>
            alert("<?= $errMsg ?>");
            history.back(); 
        </script>
    </body>
</html>

<?php
/*<?php

    $errMsg="업로드 실패";

    if ($_FILES["upload"]["error"] == UPLOAD_ERR_OK) {
        $tname = $_FILES["upload"]["tmp_name"];
        $fname = $_FILES["upload"]["name"];
        $fsize = $_FILES["upload"]["size"];

        $save_name = iconv("utf-8", "cp949", $fname); 

        if(file_exists("images/$save_name")) {
            $errMsg="이미 존재함";
        }else if (move_uploaded_file($tname, "images/$save_name")) {
            require("webhardDAO.php");
            $dao = new webhardDAO();
            $dao->addFileInfo($fname,date("Y-m-d H:i:s"),$fsize); 
            header("Location: webhard.php"); 
            exit(); 
        }
    } 
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
    </head>
    <body>
        <script>
            alert("<?= $errMsg ?>");
            history.back(); 
        </script>
    </body>
</html>

*/
?>
