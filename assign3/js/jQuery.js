$(document).ready(function() {
  $("#result").hide();
  $("#unitTesting").hide();
  $("#hideUnitTesting").hide();

  $("#calculate").click(function() {
    $("#result").show();
  })

  $("#showUnitTesting").click(function() {
    $("#unitTesting").show();
    $("#showUnitTesting").hide();
    $("#hideUnitTesting").show();
  })

  $("#hideUnitTesting").click(function() {
    $("#showUnitTesting").show();
    $("#unitTesting").hide();
    $("#hideUnitTesting").hide();

  })

});
