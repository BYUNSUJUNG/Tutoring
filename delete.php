<?php    
// 게시글 삭제 페이지
    require_once("tools.php");
    require_once("customerNoticesDao.php");
	require_once("customerAdvertisingScheduleDao.php");
	require_once("menuBurgerDao.php");
	require_once("menuChickenDao.php");
	require_once("menuSideDao.php");
    require_once("menuDrinkDao.php");
    
    $deleteNum = requestValues("deleteNum");

    // 사용할 메서드들이 들어있는 두 php 파일을 불러온다
    session_start();
    // 이 글의 작성자가 맞는지 확인하기 위해 세션데이터를 쓰기 때문에 세션 스타트
    $num=requestValues("num");
    // 전달받은 값 즉 게시글 번호를 만들어주고


    if($deleteNum==0){
        $dao=new customerNoticesDao();
        $dao->deleteBoard($num);
        okGo("글 삭제 완료", NOTICES_PAGE);
    } else if($deleteNum==1) {
        $dao=new customerAdvertisingScheduleDao();
        $dao->deleteBoard($num);
        okGo("글 삭제 완료", SCHEDULE_PAGE);
    } else if($deleteNum==2) {
        $dao=new menuBurgerDao();
        $dao->deleteBoard($num);
        okGo("글 삭제 완료", BURGER_PAGE);
    } else if($deleteNum==3) {
        $dao=new menuChickenDao();
        $dao->deleteBoard($num);
        okGo("글 삭제 완료", CHICKEN_PAGE);
    } else if($deleteNum==4) {
        $dao=new menuSideDao();
        $dao->deleteBoard($num);
        okGo("글 삭제 완료", DRINK_PAGE);
    } else if($deleteNum==5) {
        $dao=new menuDrinkDao();
        $dao->deleteBoard($num);
        okGo("글 삭제 완료", SIDE_PAGE);
    } 

    errorback("삭제되었습니다.");

?>