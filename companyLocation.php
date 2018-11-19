<?php //1701140_변수정 ?>
<?php 
    session_start(); 	
?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("company_head.php") ?>
    <?php require("location_head.php") ?>
</head>
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    <?php require("companySidebar.php") ?>


    <div class="container">		
        <h2>찾아오는길</h2>
        <hr>
        <div class="map_wrap">
            <div id="map" style="width:100%;height:100%;position:relative;overflow:hidden;"></div>

            <div id="menu_wrap" class="bg_white">
                <div class="option">
                    <div>
                        <form onsubmit="searchPlaces(); return false;">
                            키워드 : <input type="text" value="대구 롯데리아" id="keyword" size="15"> 
                            <button type="submit">검색하기</button> 
                        </form>
                    </div>
                </div>
                <hr>
                <ul id="placesList"></ul>
                <div id="pagination"></div>
            </div>
        </div>
    </div>
    <?php require("location_script.php") ?>
    <?php require("footer.php") ?>
</body>
</html>
