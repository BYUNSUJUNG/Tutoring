<?php

    require("menuDAO.php");
    $dao = new webhardDAO();

    $sort = isset($_REQUEST["sort"])?$_REQUEST["sort"]:"fname";
    $dir = isset($_REQUEST["dir"])?$_REQUEST["dir"]:"asc";

    $result = $dao->getFileList($sort,$dir);
?> 
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <style>
            a:link {text-decoration:none;}
            table {width:700px; text-align:center;}
            th {background-color:red;}
        </style>
    </head>
    <body>
        <form enctype="multipart/form-data" method="post" action="addFile.php">
            업로드파일선택<br>
            <input type="file" name="upload"><br>
            <input type="submit" value="업로드">
        </form>
        <table>
            <tr> <!--"파일명?"  부분에 파일명이 자기자신이면 안해도된다.-->
                <th>이미지</th>
                <th> 파일명 
                    <a href="?sort=fname&dir=asc">^</a>
                    <a href="webhard.php?sort=fname&dir=desc">v</a>
                </th>
                <th> 업로드 시각
                    <a href="?sort=ftime&dir=asc">^</a>
                    <a href="?sort=ftime&dir=desc">v</a></th>
                <th> 파일크기</th>
                <th> 파일삭제</th>
            </tr>
            <?php foreach($result as $row): ?>
            <tr>
                <td><img height="200" width="200" src="images/<?= $row["fname"]?>"/></td>
                <td><a href="images/<?= $row["fname"] ?>"><?php echo $row["fname"] ?></td>
                <td><?= $row["ftime"] ?></td>
                <td><?= $row["fsize"] ?></td>
                <td><a href="deleteFile.php?num=<?= $row['num']?>">X</a></td>
            </tr>
            <?php endforeach ?>
        </table>  
    </body>
</html>

