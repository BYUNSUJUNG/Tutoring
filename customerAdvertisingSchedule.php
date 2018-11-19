<?php //1701140_변수정 ?>
<?php 
    session_start(); 	
    $id= isset($_SESSION["id"])?$_SESSION["id"]:"";
?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("customer_head.php") ?>
</head>
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    <?php require("customerSidebar.php") ?>
    <div class="container">		
        <h2>광고일정</h2>
        <hr class="head">
        <form class="form-inline my-2 my-lg-0 submit" action="" method="POST">
            <input class="form-control mr-sm-2" type="text" placeholder="Search By Name" name="search">
            <button type="submit" class ="btn btn-success">검색</button>
        </form>
        <?php 
            require_once("customerAdvertisingScheduleDao.php"); // java inport와 유사함, once를 하면 한번만 읽어옴
            require_once("tools.php");
            $dao = new customerAdvertisingScheduleDao(); 

            $currentPage=requestValues("page");                                                  
            // http://Localhost/advertisingSchedule/advertisingSchedule.php?page=-3
            if($currentPage <1 ) 
                $currentPage = 1;

            $totalCount = $dao->getCountMsgs(); // 게시글 수 세는
        ?>
        <h1><?$totalCount?></h1>
        <?php
        

            $startPage = floor(($currentPage-1)/NUM_PAGE_LINKS)*(NUM_PAGE_LINKS)+1;  //floor: 내림 함수
            $endPage = $startPage + NUM_PAGE_LINKS - 1;

            // $totalPage = ceil(totalCount(전체 게시글 수) / NUM_LINES(한페이지 보여줄 게시글 수)); // ceil: 오름 함수
            $totalPage = ceil($totalCount/NUM_LINES); // ceil: 오름 함수 // 총페이지 수

            if($endPage > $totalPage) 
                $endPage = $totalPage;

            $startRecord = ($currentPage-1)*NUM_LINES;

            $msgs=$dao->getManyMsgs($startRecord);															
            
        ?>
        <?php if($totalCount>0) : ?> 
            <table class="table table-hover">
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일</th>
                    <th>조회수</th>
                </tr>
                <?php foreach($msgs as $row) :  // $record 와 $row 는 같은 의미로 사용된다. ?>   
                    <tr>
                        <td> <?= $row["num"] ?></td>
                        <td> 
                            <a href="customerAdvertisingScheduleView.php?num=<?= $row["num"] ?>&writer=<?= $row["writer"]?>">
                                <? 
                                    /* row는 서버에서 실행되어 값만 가져오는 것이기에 ""안에 ""가 가능한 것이다.
                                        하이퍼링크를 클릭할 때 view.php로 $row["Num"] 값과 $row["Writer"] 값을 넘겨준다. */
                                ?> 
                                <?= $row["title"] ?>
                            </a>
                        </td>
                        <td> <?= $row["writer"] ?></td>
                        <td> <?= $row["regtime"] ?></td>
                        <td> <?= $row["hits"] ?></td>
                    </tr>
                <?php endforeach ?>	
            </table>
            
            <?php if($startPage>1) : ?>
                <a href='<?=combineUrl("advertisingSchedule.php",0,$currentPage-NUM_PAGE_LINKS)?>' ><</a>&nbsp;
            <?php endif?>

            <?php for($i=$startPage;$i<=$endPage-1;$i++) : ?>
                <?php if($i==$currentPage) : ?>
                    <a href="<?=combineUrl('advertisingSchedule.php',0,$i)?>"><b><?= $i?></b></a>&nbsp;
                <?php else : ?>
                    <a href="<?=combineUrl('advertisingSchedule.php',0,$i)?>"><?= $i ?></a>&nbsp;
                <?php endif ?>
            <?php endfor ?>

            <?php if($endPage<$totalPage) : ?>
                <a href="<?=combineUrl('advertisingSchedule.php',0,$startPage+NUM_PAGE_LINKS)?>">></a>
            <?php endif ?>

        <?php endif ?>
        <?php if($id) : ?>
            <input class="btn btn-primary" type="button" value="글쓰기" onclick="location.href='write_form.php?writeNum=2'">
        <?php endif ?>
    </div>
    <?php require("footer.php") ?>
</body>
</html>
