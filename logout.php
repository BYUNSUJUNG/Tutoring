<?php //1701140_변수정 ?>
<?php
session_start(); //session를 사용하기 위해 start

unset($_SESSION["id"]);
unset($_SESSION["name"]); 
/* $_SESSION["pw"]는 하지않았기 때문에 
 unset($_SESSION["pw"])를 하지않아도 된다.*/

header("Location: jingeria.php"); // 웹서버가 사용자를 강제 이동시킴

?>

