function calculate() {

  var x = document.getElementById("input").value, //Input Value
    arr = x.split(",").map(Number); //array of strings into a Number
  var trial = document.getElementById('answers').rows.length;

  function addTrial(arr) {
    var trial = 1;
    return trial++;
  }

  //Done
  function findN(arr) {
    var arrayLength = arr.length;
    return arrayLength.toFixed(2);
  }

  //Done
  function findSum(arr) {
    var sumOfArray = 0;
    for (var i = 0; i < findN(arr); i++) {
      sumOfArray += arr[i];
    }
    return sumOfArray.toFixed(2);
  }

  //Done
  function findMean(arr) {
    var mean = findSum(arr) / findN(arr);
    return mean.toFixed(2);
  }

  //Done
  function findMedian(arr) {
    var arraySorted = arr.sort(function(a, b) {
      return a - b;
    });
    var half = Math.floor(arr.length / 2);

    if (arr.length % 2) {
      median = arraySorted[half];
    } else {
      median = (arraySorted[half - 1] + arraySorted[half]) / 2.0;
    }
    return median.toFixed(2);
  }

  //Done
  function findMode(arr) {
    var count = {};
    var modeArr = [];
    var max = 0;
    var mode = [];

    for (var i in arr) {
      if (!(arr[i] in count))
        count[arr[i]] = 0;
      count[arr[i]]++;

      if (count[arr[i]] == max)
        modeArr.push(arr[i]);
      else if (count[arr[i]] > max) {
        max = count[arr[i]];
        modeArr = [arr[i]];
      }
    }

    for (var i = 0; i < modeArr.length; i++) {
      mode.push(" " + modeArr[i].toFixed(2));
    }
    return mode;
  }


  function findVariance(arr) {
    var arrValSq = 0;
    for (var i = 0; i < findN(arr); i++) {
      arrValSq += (Math.pow(arr[i], 2));
    }
    var first = arrValSq,
      sum = findSum(arr),
      second = (Math.pow(sum, 2)) / arr.length,
      numerator = first - second,
      denominator = arr.length - 1,
      variance = numerator / denominator;
    return variance.toFixed(2);
  }

  function findStandardDeviation(arr) {
    var variance = findVariance(arr);
    var standardDeviation = Math.sqrt(variance);
    return standardDeviation.toFixed(2);

  }

  function appendResult() {
    var test = ++trial;
    var size = findN(arr);
    var sum = findSum(arr);
    var mean = findMean(arr);
    var median = findMedian(arr);
    var mode = findMode(arr);
    var variance = findVariance(arr);
    var standardDeviation = findStandardDeviation(arr);
    var row = document.createElement("tr");
    row.innerHTML = "<td>" + test + "</td>" +
      "<td>" + size + "</td>" +
      "<td>" + sum + "</td>" +
      "<td>" + mean + "</td>" +
      "<td>" + median + "</td>" +
      "<td>" + mode + "</td>" +
      "<td>" + variance + "</td>" +
      "<td>" + standardDeviation + "</td>";
    $("#answers").append(row);
  }

  appendResult();

}
