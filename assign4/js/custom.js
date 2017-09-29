$(document).ready(function() {
  $("#coverCanvas").hide();
  $("#imAdrian").hide();
  $("#text-top").hide();
  $("#step2").hide();
  $("#step3").hide();
  $("#step4").hide();

  setTimeout(function() {
    $("#step1").fadeOut(1000);
    $("#switch").trigger('load');
    $("#switch").trigger('play');
  }, 1800);

  setTimeout(function() {
    $("#step2").fadeIn(1000);
    $("#electric").trigger('load');
    $("#electric").trigger('play');
  }, 2100);


  setTimeout(function() {
    $("#step2").fadeOut(1000);
    // $("#step1").hide();
  }, 4000);

  setTimeout(function() {
    $("#step3").fadeIn(1000);
    $("#lightbulb").trigger('load');
    $("#lightbulb").trigger('play');
  }, 4500);

  setTimeout(function() {
    $("#step3").fadeOut(1000);

  }, 5500);

  setTimeout(function() {
    $("#step4").fadeIn(700);
  }, 6000);

  setTimeout(function() {
    $("#switch").trigger('load');
    $("#switch").trigger('play');

  }, 6500);
  setTimeout(function() {
    $("#coverCanvas").fadeIn(2000, "linear");
    $("#imAdrian").fadeIn(2000, "linear");
    $("#text-top").fadeIn(2000, "linear");
    $("#bass").trigger('load');
    $("#bass").trigger('play');
  }, 10000);
});
