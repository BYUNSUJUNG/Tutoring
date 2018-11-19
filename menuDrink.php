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
    <?php require("menuSidebar.php") ?>

    <div class="container">		
        <h2>음료 메뉴</h2>
        <hr class="head">
        <form class="form-inline my-2 my-lg-0 submit" action="" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="Search By Name" name="search">
            <button type="submit" class ="btn btn-success">검색</button>
        </form>
        <br><br><br>
        <?php 
            require_once("menuDrinkDao.php"); // java inport와 유사함, once를 하면 한번만 읽어옴
            require_once("tools.php");
            $dao = new menuDrinkDao(); 
            
            $currentPage=requestValues("page");                                                  
            // http://Localhost/advertisingSchedule/advertisingSchedule.php?page=-3
            if($currentPage <1 ) 
                $currentPage = 1;

            $totalCount = $dao->getCountMsgs(); // 게시글 수 세는
        ?>
        <?php


            $startPage = floor(($currentPage-1)/MENU_NUM_PAGE_LINKS)*(MENU_NUM_PAGE_LINKS)+1;  //floor: 내림 함수
            $endPage = $startPage + MENU_NUM_PAGE_LINKS - 1;

            // $totalPage = ceil(totalCount(전체 게시글 수) / MENU_NUM_LINES(한페이지 보여줄 게시글 수)); // ceil: 오름 함수
            $totalPage = ceil($totalCount/MENU_NUM_LINES); // ceil: 오름 함수 // 총페이지 수

            if($endPage > $totalPage) 
                $endPage = $totalPage;

            $startRecord = ($currentPage-1)*MENU_NUM_LINES;

            $msgs=$dao->getManyMsgs($startRecord);																	 

            //$msgs=$dao->getManyMsgs(); //advertisingScheduleDao의 getManyMsgs()를 $msgs에 담음

        ?>
        <?php if($totalCount>0) : ?>  
            <?php foreach($msgs as $row): ?>
            <div class="menu">
                <a href='menuDrinkView.php?num=<?= $row["num"] ?>&writer=<?= $row["writer"]?>&title=<?=$row["title"]?>&file=<?=$row["file"]?>'>
                    <img height="200" width="200" src="images/<?= $row["file"]?>"/>
                    <div><?php echo $row["title"] ?></div>
                </a>
            </div>
            <?php endforeach ?>
            <br><br><br><br><br><br><br><br><br><br>
            <?php if($startPage>1) : ?>
                <a href='<?=combineUrl("menuDrink.php",0,$currentPage-MENU_NUM_PAGE_LINKS)?>' ><</a>&nbsp;
            <?php endif?>

            <?php for($i=$startPage;$i<=$endPage-1;$i++) : ?>
                <?php if($i==$currentPage) : ?>
                    <a href="<?=combineUrl('menuDrink.php',0,$i)?>"><b><?= $i?></b></a>&nbsp;
                <?php else : ?>
                    <a href="<?=combineUrl('menuDrink.php',0,$i)?>"><?= $i ?></a>&nbsp;
                <?php endif ?>
            <?php endfor ?>

            <?php if($endPage<$totalPage) : ?>
                <a href="<?=combineUrl('menuDrink.php',0,$startPage+MENU_NUM_PAGE_LINKS)?>">></a>
            <?php endif ?>
        <?php endif ?>
        <?php if($id) : ?>
            <input class="btn btn-primary" type="button" value="글쓰기" onclick="location.href='write_form.php?writeNum=5'">
        <?php endif ?>
    </div>

    <?php require("footer.php") ?>
</body>
</html>
