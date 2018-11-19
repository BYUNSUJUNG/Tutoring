<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> php search</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
                $sql = "select * from notices";

            ?>
            <div class="col-md-8 col-md-offset-2" style="margin-top: 5%">
                <div class="row">
                <form action="" method="POST">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control"
                        placeholder="Search By Name" value="">
                    </div>
                    <div class="col-md-6 text-left">
                        <button class="btn">search</button>
                    </div>
                </form>
                <br>
                </div>
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
                            <a href="customerNoticesView.php?num=<?= $row["num"] ?>&writer=<?= $row["writer"]?>">
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
            </div>
        </div>
    </div>
</body>
</html>