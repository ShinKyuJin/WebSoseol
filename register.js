var userID = $('.userID');
var userIDchk = $('.userIDchk');
var userIDComment = $('.userIDComment');
var userPassword = $('.userPassword');
var userPassword2 = $('.userPassword2');
var userPasswordComment = $('.userPasswordComment');
var userPasswordchk = $('.userPasswordchk');
var userEmail = $('.userEmail');
var userEmailComment = $('.userEmailComment');
var userEmailchk = $('.userEmailchk');
var userMajor =$('.userMajor');
var userMajorComment = $('.userMajorComment');
var userMajorchk = $('.userMajorchk');

userID.blur(function() {
  $.ajax({
    type:'post',
    dataType:'json',
    url:'register_idchk.php',
    data:{userID:userID.val()},
    success:function(json) {
      if(json.res == 'suc') {
        userID.css('-webkit-')
        userID.css('background','green');
        userIDchk.val('1');
      }
      else {
        userID.css('background','red');
        userIDchk.val('0');
        userID.focus();
      }
    },
    error:function() {
      console.log('fail');
    }

  })
});

function validateid(){
  var re = /^[A-za-z0-9]{5,15}/g;
  var id = document.getElementById("id");
  if(!check(re,id,"아이디는 5~15자의 영문 대소문자 또는 숫자로만 입력")) {
      return false;
  }
}
function validatepw(){
  var userPassword1 = document.getElementById("userPassword1");
  var userPassword2 = document.getElementById("userPassword2");
  var re = /^[A-za-z0-9]{5,15}/g;
  var userPassword1 = document.getElementById("userPassword1");
  if(!check(re,userPassword1,"패스워드는 5~15자의 영문 대소문자 또는 숫자로만 입력")) {
      return false;
  }
  else if(userPassword1.value != userPassword2.value) {
      alert("비밀번호가 다릅니다. 다시 확인해 주세요.");
      userPassword2.value = "";
      userPassword2.focus();
      return false;
  }
}
function validateemail(){
  var re2 = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
  var email = document.getElementById("email");
  if(email.value=="") {
      alert("이메일을 입력해 주세요");
      email.focus();
      return false;
  }
  if(!check(re2, email, "적합하지 않은 이메일 형식입니다.")) {
      return false;
  }
}
   function check(re, what, message) {
       if(re.test(what.value)) {
           return true;
       }
       alert(message);
       what.value = "";
       what.focus();
   }


function validate1(){
  var username = document.getElementById("username");
  if(username.value ==""){
    return false;
  }
  else{
    true;
  }
}


function validate2(){
  var birth = document.getElementById("birth");
  if(birth.value ==""){
    return false;
  }
  else{
    true;
  }
}

function validate3(){
  var id = document.getElementById("id");
  if(id.value ==""){
    return false;
  }
  else{
    true;
  }
}

function validate4(){
  var userPassword1 = document.getElementById("userPassword1");
  var userPassword2 = document.getElementById("userPassword2");
  if(userPassword1.value!=userPassword2.value||userPassword2.value==""){
    return false;
  }
  else{
    true;
  }
}

function validate5(){
  var email = document.getElementById("email");
  if(email.value==""){
    return false;
  }
  else{
    true;
  }
}

function validate6(){
  var userMajor = document.getElementById("userMajor");
  if(userMajor.options[userMajor.selectedIndex].value=="false"){
    return false;
  }
  else{
    true;
  }
}

function validate7(){
  var userStudentID = document.getElementById("userStudentID");
  if(userStudentID.value==""){
    return false;
  }
  else{
    true;
  }
}

function myFunction1(){
  if(slideIndex==1){
    plusSlides(0);
  }
  if(slideIndex==2){
    username.classList.remove("error");
    plusSlides(-1);
  }
  if(slideIndex==3){
    birth.classList.remove("error");
    plusSlides(-1);
  }
  if(slideIndex==4){
    id.classList.remove("error");
    plusSlides(-1);
  }
  if(slideIndex==5){
    userPassword1.classList.remove("error");
    plusSlides(-1);
  }
  if(slideIndex==6){
    email.classList.remove("error");
    plusSlides(-1);
  }
  if(slideIndex==7){
    userMajor.classList.remove("error");
    plusSlides(-1);
  }
}

function myFunction2(){
  if(slideIndex==1){
    if(validate1()==false){
      username.classList.add("error");
      plusSlides(0);
    }
    else plusSlides(1);
  }
  else if(slideIndex==2){
    if(validate2()==false){
      birth.classList.add("error");
      plusSlides(0);
    }
    else plusSlides(1);
  }
  else if(slideIndex==3){
    validateid();
    if(validate3()==false){
    id.classList.add("error");
    plusSlides(0);
  }
    else plusSlides(1);
  }
  else if(slideIndex==4){
    validatepw();
    if(validate4()==false){
      var userPassword1 = document.getElementById("userPassword1");
      var userPassword2 = document.getElementById("userPassword2");
      userPassword1.classList.add("error");
      userPassword2.classList.add("error");
      plusSlides(0);
  }
    else plusSlides(1);
  }
  else if(slideIndex==5){
    validateemail();
    if(validate5()==false){
    email.classList.add("error");
    plusSlides(0);
  }
    else plusSlides(1);
  }
  else if(slideIndex==6){
    if(validate6()==false){
    userMajor.classList.add("error");
    plusSlides(0);
  }
    else plusSlides(1);
  }
  else if(slideIndex==7){
    if(validate7()==false){
      userStudentID.classList.add("error");
    }
  }
}
