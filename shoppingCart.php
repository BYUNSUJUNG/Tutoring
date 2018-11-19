<?php //1701140_변수정 ?>
<?php
	require_once("tools.php"); // java inport와 유사함, require_once를 하면 한번만 읽어옴
	require_once("shoppingCartDao.php");
	
	 // tools.php의 함수, $writer = isset($_REQUEST["writer"])?$_REQUEST["writer"]:"";
	$menu = requestValues("menu");
	$title = requestValues("title");
	$file = requestValues("file");
	if($title) { // 2. 그 값이 모두 존재하면 db삽입
		
        $bdao = new shoppingCartDao(); // 생성자 실행 -> db연결됨
        $bdao->insertBoard($menu, $title, $file); // 삽입할 값을 넘겨줌

    
	} else {//2.1  하나라도 없을 경우
		errorBack("빈칸존재");
	}
	
?>
<script>
    function boardReq() {  
        var yn = confirm("장바구니 페이지로"); 
        if(yn== false) history.back();

		location.href="shoppingCartBoard.php";
    }
    boardReq();
</script>
