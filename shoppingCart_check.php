<?php //1701140_변수정 ?>
<?php
    require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
    
    $menu = requestValues("menu");
	$title = requestValues("title");
	$file = requestValues("file");
?>
<script> 
    function cartReq() {  
        var yn = confirm("담으시겠습니까?"); 
        if(yn== false) history.back();

		location.href="shoppingCart.php?menu="+'<?=$menu?>'+"&title="+'<?=$title?>'+"&file="+'<?=$file?>';
    }

    cartReq();
</script>

