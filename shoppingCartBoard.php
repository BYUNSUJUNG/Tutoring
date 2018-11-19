<?php //1701140_변수정 ?>
<?php 
    session_start(); 	
?>
<!DOCTYPE html>
<html>
<head>

    <?php require("html_head.php") ?>
    <?php require("shoppingCart_head.php") ?>
</head>
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>

    <article>		
        <h2>장바구니</h2>
        <hr class="head">
        <?php 
            require_once("shoppingCartDao.php"); // java inport와 유사함, once를 하면 한번만 읽어옴
            require_once("tools.php");
            $dao = new  shoppingCartDao(); 
            
            $currentPage=requestValues("page");                                                  
            // http://Localhost/advertisingSchedule/advertisingSchedule.php?page=-3
            if($currentPage <1 ) 
                $currentPage = 1;

            /*
                currentPage는 주어짐
                startPage, endPage, prevLink, nextLink는 계산함
            */

            // 집단함수, aggregate function
            // select count(*) from advertisingSchedule;
            $totalCount = $dao->getCountMsgs(); // 게시글 수 세는
        ?>
        <?php
            /*
            if($totalCount==0) { // 게시글의 개수가 0보다 클 경우: 게시글 존재
                echo "<h1>등록된 게시글이 없습니다.</h1>";
                exit();
            }*/

            $startPage = floor(($currentPage-1)/NUM_PAGE_LINKS)*(NUM_PAGE_LINKS)+1;  //floor: 내림 함수
            $endPage = $startPage + NUM_PAGE_LINKS - 1;

            // $totalPage = ceil(totalCount(전체 게시글 수) / NUM_LINES(한페이지 보여줄 게시글 수)); // ceil: 오름 함수
            $totalPage = ceil($totalCount/NUM_LINES); // ceil: 오름 함수 // 총페이지 수

            if($endPage > $totalPage) 
                $endPage = $totalPage;


            /* select * from advertisingSchedule order by regtime limit start_record, count
            currentPage 1 : start = 0, count = NUM_LINES
            currentPage 2 : start = NUM_LINES, count = NUM_LINES
            currentPage 3 : start = NUM_LINES*2, count = NUM_LINES
            currentPage 4 : start = NUM_LINES*3, count = NUM_LINES */

            $startRecord = ($currentPage-1)*NUM_LINES;

            $msgs=$dao->getManyMsgs($startRecord);																	 // 교수님이랑 다른 부분

            //$msgs=$dao->getManyMsgs(); //advertisingScheduleDao의 getManyMsgs()를 $msgs에 담음

        ?>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th scope="col">카테고리</th>
                <th scope="col">메뉴명</th>
                <th scope="col">목록삭제</th>
            </tr>
        <?php foreach($msgs as $row): ?>
            <tr>
                <td scope="row"><?=$row["num"]?></td>
                <td><h3><?= $row["menu"]?></h3></td>
                <td>
                    <img height="100" width="100" src="images/<?= $row["file"]?>"/>
                    <span><?= $row["title"] ?></span>
                </td>
                <td>
                    <a href="shoppingCart_delete.php?num=<?= $row['num']?>">X</a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
    </article>
    <?php require("footer.php") ?>
</body>
</html>
