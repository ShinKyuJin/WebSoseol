<!DOCTYPE html>

<head>
    <meta charset="utf-8" type="text/html" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        .acc,
        .in_acc {
            background-color: #DDD;
            color: $444;
            border: none;
            text-align: left;
            padding: 10px;
            margin: 5px;
            float: left;
            width: 100%;
        }

        .active,
        .acc:hover,
        .:hover {
            background-color: #BBB;
        }

        .pan{
            padding: 0 10px;
            overflow: hidden;
            background-color: #FFF;
            display: none;
        }

        .in_pan{
            padding: 0 10px;
            overflow: hidden;
            background-color: #AAA;
            margin-left: 12px;
            display: none;
        }
    </style>
</head>

<body>
    <?php
    include "admin_include.php";
    ?>
    <h2>관리자 페이지</h2>
    <button class="acc">게시판 관리</button>
    <div class="pan">
        <button id="pan_1">게시판 개설</button>
        <div class="in_pan" id="pan_1_1">
            <fieldset>
                <legend>게시판 개설</legend>
                <form method="post" action="admin_settings.php">
                    게시판 이름 <input type="text" name="bdname"/><br />                    
                    <input type="hidden" name="menuIdx" value="pan_1" />
                    <input type="submit" value="생성" />
                </form>
            </fieldset>
        </div><br />

        <button id="pan_2">게시판 정보 수정</button>
        <div class="in_pan" id="pan_1_2">
            <form method="post" action="admin_settings.php">
                수정할 게시판
                <select name="select_board_m">
                <?php
                    $sql = mq("SELECT categoryIdx, boardSubject FROM LISTOFBOARD");
                    while($select = $sql->fetch_array()) {
                        $bdname = $select["boardSubject"];
                        $val = $select["categoryIdx"];
                        echo "<option value='$val'>$bdname</option>";
                    }
                ?>
                </select>
                게시판 이름 수정 <input type="text" name="bdname_m"/>
                <input type="hidden" name="menuIdx" value="pan_2" />
                <input type="submit" value="수정" />            
            </form>
        </div><br />

        <button id="pan_3">게시판 삭제</button>
        <div class="in_pan" id="pan_1_3">
            <form method="post" action="admin_settings.php">
            삭제할 게시판
            <select name="select_board">
                <?php
                    $sql = mq("SELECT categoryIdx, boardSubject FROM LISTOFBOARD");
                    while($select = $sql->fetch_array()) {
                        $bdname = $select["boardSubject"];
                        $val = $select["categoryIdx"];
                        echo "<option value='$val'>$bdname</option>";
                    }
                ?>
            </select>
            <input type="hidden" name="menuIdx" value="pan_3" />
            <input type="submit" value="삭제(복구 불가)" />
            </form>
        </div><br />
    </div>
    <button class="acc">오버플로우 세종 관리</button>
    <div class="pan">
    <p>코딩 질문을 할 수 있는 게시판 목록을 관리합니다.</p>
        <button id="pan_4">게시판 생성</button>
        <div class="in_pan" id="pan_1_4">
        <form method="post" action="admin_settings.php">
            게시판 이름 <input type="text" name="ofwname"/>
            프로그래밍 언어
            <select name="prlang">
                <option value="text/x-csrc">C언어</option>
                <option value="text/x-c++src">C++</option>
                <option value="text/x-csharp">C#</option>
                <option value="java">JAVA</option>
                <option value="php">PHP</option>
                <option value="python">Python</option>
                <option value="javascript">Javascript</option>
                <option value="ruby">Ruby</option>
                <option value="sql">SQL</option>
            </select>
            <input type="hidden" name="menuIdx" value="pan_4" />
            <input type="submit" value="생성" />
        </form>
        </div><br />

        <button id="pan_5">게시판 삭제</button>
        <div class="in_pan" id="pan_1_5">
            <form method="post" action="admin_settings.php">
            삭제할 게시판
            <select name="select_board_r">
                <?php
                    $sql = mq("SELECT categoryIdx, categorySubject FROM OVERFLOW_LISTOFBOARD");
                    while($select = $sql->fetch_array()) {
                        $bdname = $select["categorySubject"];
                        $val = $select["categoryIdx"];
                        echo "<option value='$val'>$bdname</option>";
                    }
                ?>
            </select>
            <input type="hidden" name="menuIdx" value="pan_5" />
            <input type="submit" value="삭제(복구 불가)" />
        </form>
        </div><br />
    </div>

    <button class="acc">기타 페이지 관리</button>
    <div class="pan">
        <button id="pan_6">로고 수정</button>
        <div class="in_pan" id="pan_1_6">
            <form method="post" enctype="multipart/form-data" action="admin_settings.php">
                <p>네비게이션 바에 로고 표시(이전에 최신으로 업로드 한 사진이 반영됩니다.)</p>
                <input type="radio" name="logo_present" value="true" checked/>예
                <input type="radio" name="logo_present" value="false" />아니오
                <p>로고 사진 변경</p>
                <input type="file" name="logoFile">
                <input type="hidden" name="menuIdx" value="pan_6" />
                <input type="submit" value="수정" />  
            </form>
        </div><br />
        <button id="pan_7">학생회 소개페이지 수정</button>
        <div class="in_pan" id="pan_1_7">
            <form method="post" enctype="multipart/form-data" action="admin_settings.php">
                <p>학생회 소개글 및 대표 사진을 수정할 수 있습니다.</p>
                <select id ="introduction_select" name="introduction_select">
                <?php
                    $sql = mq("SELECT MajorName, IntroText, idx FROM MAJORINTRO");
                    while ($select = $sql->fetch_array()) {
                        $mjName = $select["MajorName"];
                        $val = $select["idx"];
                        echo "<option value='$val'>$mjName</option>";
                    }
                ?>
                </select>
                <button type="button" onclick="getTextAboutIntroduce()">소개글 수정</button><br/>

                <textarea id="introduction_text" name="introText" width="100%" height="70px"></textarea>
                <br /><input type="file" name="studentFile">
                <input type="hidden" name="menuIdx" value="pan_7" />
                <input type="submit" value="수정" />
            </form>
        </div><br />
    </div>
    <button class="acc">회원 관리</button>
    <div class="pan">

    <button id="pan_9">회원정보 검색</button>
        <div class="in_pan" id="pan_1_9">
            <form method="post">
                <select id ="user_search_select">
                    <option value="userID">유저ID키워드검색</option>
                    <option value="userMajor">학과별유저검색</option>
                    <option value="userName">유저이름검색</option>
                </select>

                <input type="text" id="id_keyWord">회원ID
                <button type="button" onclick="getUserInfo()">회원정보검색</button><br/>
                <div id="userSearchInfo"></div>
            </form>
        </div><br />      

        <button id="pan_10">회원 강제탈퇴</button>
        <div class="in_pan" id="pan_1_10">
            <form method="post" action="admin_settings.php">
            <p>Some text</p>
                탈퇴할 유저 ID<input type="text" name="userID"/><br />
                <input type="hidden" name="menuIdx" value="pan_10" />
                <input type="submit" value="강제 탈퇴(복구 불가)" />
            </form>
        </div><br />

        <button id="pan_11">관리자권한 부여/해제</button>
        <div class="in_pan" id="pan_1_11">
        <form method="post" action="admin_settings.php">
            <p>Some text</p>
                유저 ID<input type="text" name="userID_a"/><br />
                <input type="radio" name="usrauth_m" value="admin" checked/>권한 : 관리자
                <input type="radio" name="usrauth_m" value="user"/>권한 : 유저
                <input type="hidden" name="menuIdx" value="pan_11" />
                <input type="submit" value="권한 변경" />
            </form>
        </div><br />
    </div>

    <p><button onclick="goback()">뒤로 가기</button></p>
    <?php

    ?>
    <script>
        function goback() {
            history.back();
        }

        $(document).ready(function() {
            var acc = $(".acc");
            var i, j;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var pan = this.nextElementSibling;
                    if (pan.style.display === "block")
                        pan.style.display = "none";
                    else
                        pan.style.display = "block";
                });
            }
            var pans = new Array();
            for(i=0; i<11; i++) {
                var panstring ="#pan";
                panstring = panstring.concat("_",i+1);
                pans[i] = panstring;
                $(pans[i]).click(function(){
                    $(this).next().toggle();
                });
            }
        });
    
        function getTextAboutIntroduce() {
            var idx = document.getElementById("introduction_select").value;
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                document.getElementById("introduction_text").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET","admin_getIntrodb.php?ci="+idx,true);
            xmlhttp.send();
        }

        function getUserInfo() {
            var mtd = document.getElementById("user_search_select").value;
            var kwd = document.getElementById("id_keyWord").value;
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                document.getElementById("userSearchInfo").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET","admin_getUser.php?mt="+mtd+"&kw="+kwd,true);
            xmlhttp.send();
        }
    </script>
</body>

</html>