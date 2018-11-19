<?php require("tools.php") ?>
<?php 
    session_start(); 	
?>
<!DOCTYPE html>
<html>
<head>
    <?php require("html_head.php") ?>
    <?php require("jingeria_head.php") ?>
</head> 
<body>
    <?php require("top_nav.php") ?>
    <?php require("nav.php") ?>
    <div class="container">
        <div class="slide">
            <button class="prev" type="button"><img class="button_left" src="images/button_left.png" alt="피자" /></button>
            <ul>
                <li><img src="images/slide1.jpg" alt="피자"/></li>
                <li><img src="images/slide2.jpg" alt="피자"/></li>           
                <li><img src="images/slide3.jpg" alt="피자"/></li>
            </ul>
            <button class="next" type="button"><img class="button_right" src="images/button_right.png" alt="피자" /></button>
        </div>
        
        <div class="NewBox"><h2>New</h2></div>
        <div class="card" style="width: 23rem;">
            <a href="http://localhost/201802A/201812%EC%B4%88/menuBurgerView.php?num=40&writer=%EA%B4%80%EB%A6%AC%EC%9E%90&title=%EB%B6%88%EA%B3%A0%EA%B8%B0%EB%B2%84%EA%B1%B0&file=burger1.jpg">
                <img class="card-img-top" src="images/burger1.jpg" alt="pizza">
                <div class="card-body">
                    <h5 class="card-title">불고기버거</h5>
                    <p class="card-text">영양만점의불고기 패티와 고소한 불고기 소스의 조화!
                    영양만점의 소고기를 원료로 만들어 낸 불고기패티에 고소한 불고기 소스를 가미하여 한층 더 맛있는 영양버거 </p>
                    <a href="#" class="btn btn-danger">더 자세히</a>
                </div>
            </a>
        </div>
        <div class="card" style="width: 23rem;">
            <a href="http://localhost/201802A/201812%EC%B4%88/menuchickenView.php?num=32&writer=%EA%B4%80%EB%A6%AC%EC%9E%90&title=%ED%9B%84%EB%9D%BC%EC%9D%B4%EB%93%9C%EB%8B%AD%EB%8B%A4%EB%A6%AC&file=chicken1.jpg">
                <img class="card-img-top" src="images/chicken1.jpg" alt="pizza">
                <div class="card-body">
                    <h5 class="card-title">후라이드닭다리</h5>
                    <p class="card-text">한국인이 가장 애호하는 다리만으로 구성을 만든 세트!
                                고소한 향미와 매콤함을 동시에 즐길 수 있는 새로운 개념의 
                                맘스후라이드치킨. 우리 입맛에 맞춘 새로운 느낌의 저칼로리 치킨 
                    </p>
                    <a href="#" class="btn btn-danger">더 자세히</a>
                </div>
            </a>
        </div>
        <div class="card" style="width: 23rem;">
            <a href="http://localhost/201802A/201812%EC%B4%88/menuSideView.php?num=32&writer=%EA%B4%80%EB%A6%AC%EC%9E%90&title=%ED%9C%A0%EB%9E%A9&file=side1.jpg">
                <img class="card-img-top" src="images/side1.jpg" alt="pizza">
                <div class="card-body">
                    <h5 class="card-title">휠랩</h5>
                    <p class="card-text">담백한 또띠아에 양상치, 피클, 토마토와 텐더로인이 통째로! 상큼한 너겟소스와 어우러진 다이어트식 한끼식사 
                    </p>
                    <a href="#" class="btn btn-danger">더 자세히</a>
                </div>
            </a>
        </div>
    </div> 
    <?php require("footer.php") ?>
</body>
</html>


