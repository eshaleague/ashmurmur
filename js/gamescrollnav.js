
 $(window).scroll(function(){
    if ($(window).scrollTop > 10) {
    $('.thegames').addClass("thegamesfixed");
  } else {
    $('.thegames').removeClass("thegamesfixed");
  }
});
  
