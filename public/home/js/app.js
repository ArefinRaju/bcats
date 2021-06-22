$(document).ready(function(){

    $("#toggleBtn1").click(function(){
      $(".toggleText").slideUp();
      $("#toggleText1").slideToggle();
    });
    $("#toggleBtn2").click(function(){
      $(".toggleText").slideUp();
      $("#toggleText2").slideToggle();
    });
    $("#toggleBtn3").click(function(){
      $(".toggleText").slideUp();
      $("#toggleText3").slideToggle();
    });
    $("#toggleBtn4").click(function(){
      $(".toggleText").slideUp();
      $("#toggleText4").slideToggle();
    });
    $("#toggleBtn5").click(function(){
      $(".toggleText").slideUp();
      $("#toggleText5").slideToggle();
    });
    $("#toggleBtn6").click(function(){
      $(".toggleText").slideUp();
      $("#toggleText6").slideToggle();
    });

  });

  const loginBtn = document.getElementById('login_btn');
  loginBtn.addEventListener( 'click', () => {
    location.href = '/login.html';
  });

