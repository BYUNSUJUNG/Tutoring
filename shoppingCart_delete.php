<?php

    require("shoppingCartDAO.php");
    require("tools.php");

    $num = $_REQUEST["num"]; 

    $dao = new shoppingCartDAO();
    $dao->deleteBoard($num);// db에서 삭제하기
    okGo("삭제되었습니다.", SHOPPINGCART_PAGE); 
?>


