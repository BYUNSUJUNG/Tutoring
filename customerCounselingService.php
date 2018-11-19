<?php //1701140_변수정 ?>
<?php 
    session_start(); 	
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
        <h2>1:1문의</h2>
        <hr class="head">
        <div class="personBox">
        <p class="personTitle"><b>개인정보 수집 및 이용에 관한 사항 (필수)</b></p>

        <p>회사는 고객서비스 제공을 위해 귀하의 개인정보를 아래와 같이 수집하고자 합니다.</p>


        <p><b>수집하는 개인정보의 항목</b></p>
        <p>- 이용매장, 이름, 연락처(전화번호 및 핸드폰번호), 이메일주소, 고객문의사항(첨부파일 포함)</p>

        <p><b>수집 및 이용목적</b></p>
        <p>- 고객불만사항 해결, 문의사항 응답 및 이와 관련된 고객 연락업무, 고객 손해에 대한 배상 및 보험처리,</p>
        <p>서비스 향상을 위한 내부 교육자료 활용 등</p>

        <p><b>개인정보의 보유 및 이용기간 </b></p>
        <p>- 전자상거래 등에서의 소비자보호에 관한 법률에 따라 고객의 불만 또는 분쟁처리에 관한 기록은 3년간 보관됩니다.</p>

        <p><b>개인정보의 제 3자 제공</b></p>
        <p>- 귀하가 제공하시는 상기 개인정보는 불만사항 해결 등을 위하여 문제해결 담당부처나 제 3자에게 제공될 수 있습니다.</p>

        <p>* 서비스 제공을 위해 필요한 최소한의 개인정보이므로 동의를 해주셔야 서비스를 이용하실 수 있습니다.</p>

        <p><b>개인정보의 수집 및 이용에 관한 사항에 동의하십니까?</b></p>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="" name="check" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                동의합니다.
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="" name="check" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                동의하지 않습니다.
            </label>
        </div>

        <hr class="head">

        <form>
            <!-- 매장명 -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">매장명</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3">
                </div>
            </div>
            <hr>
            <!-- 작성자 -->
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">작성자</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3">
                </div>
            </div>
            <hr>
            <!-- 전화번호 -->
            <div class="form-row align-items-center">
                <label for="inputEmail3" class="col-sm-2 col-form-label">전화번호</label>
                <div class="col-auto my-1">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">053</option>
                        <option value="2">053</option>
                        <option value="3">053</option>
                    </select>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">-</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">-</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                </div>
            </div>
            <hr>
            <!-- 핸드폰 -->
            <div class="form-row align-items-center">
                <label for="inputEmail3" class="col-sm-2 col-form-label">핸드폰</label>
                <div class="col-auto my-1">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">010</option>
                        <option value="2">010</option>
                        <option value="3">010</option>
                    </select>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">-</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">-</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                </div>
            </div>
            <hr>
            <!-- 이메일 -->

            <div class="form-row align-items-center">
                <label for="inputEmail3" class="col-sm-2 col-form-label">이메일</label>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                    </div>
                </div>
                <div class="col-auto my-1">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="1">naver.com</option>
                        <option value="2">naver.com</option>
                        <option value="3">naver.com</option>
                    </select>
                </div>
            </div>

            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label" for="inlineFormCheck">
                문의사항에 대한 답변은 이메일로 보내드립니다.<br>
                답변을 받으실 이메일 주소를 정확히 기재해주시기 바랍니다.
                </label>
            </div>
            <hr>
            <!-- 제목 -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">제목</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <hr>
            <!-- 내용 -->

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">내용</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <hr>
            <!-- 첨부파일 -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">첨부파일</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label" for="inlineFormCheck">
                최대 4MB까지 첨부할 수 있으며, 이미지 파일만 등록 하실 수 있습니다.
                </label>
            </div>
            <hr>
            <!-- 자동등록방지 -->

            <div class="form-row align-items-center">
                <label for="inputEmail3" class="col-sm-2 col-form-label">자동등록방지</label>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input class="form-control" type="text" id="inlineFormInputName" placeholder="963852" readonly>
                </div>
            </div>
            <div class="form-check mb-2 mr-sm-2">
                <label class="form-check-label" for="inlineFormCheck">
                왼쪽의 글자를 입력하세요.
                </label>
            </div>
            
            <input class="btn btn-primary" type="button" value="확인" onclick="go('writer')">
            <button class="btn btn-secondary" onclick="location.href='register_form.php'">취소</button>
        </form>
    </div>
    <?php require("footer.php") ?>
</body>
</html>
