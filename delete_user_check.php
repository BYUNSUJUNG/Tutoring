<?php //1701140_변수정 ?>
<?php
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
    
    $deleteNum = requestValues("deleteNum");

    session_start(); // 세션 시작

    
    $name = isset($_SESSION["name"])?$_SESSION["name"]:"";
    $writer = requestValues("writer");

    if($name!=$writer) { // id가 writer와 다를 때
        errorBack("권한이 없습니다.");
    }
    //  클라이언트가 송신한 num값을 읽는다.
    $num = requestValues("num");
?>
<script> 
    function delReq() {  // 삭제 요청
        var yn = confirm("삭제하시겠습니까?"); // 삭제 전 확인
        if(yn== false) return;

		location.href="delete.php?num="+'<?=$num?>'+"&deleteNum="+'<?= $deleteNum?>';
    }
    delReq();
</script>

