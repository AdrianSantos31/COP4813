var myCanvas = document.getElementById("myCanvas");
var myContext = myCanvas.getContext("2d");

var canvasWidth = myCanvas.width;
var canvasHeight = myCanvas.height;

var hand = new Image();
hand.src = "media/hand.png";

var handX = 270;
var handY = 110;
var handWidth = 30;
var handHeight = 30;
var background = {
  draw: function() {
    //Background
    myContext.rect(0, 0, canvasWidth, canvasHeight);
    myContext.fillStyle = "#42fbff";
    myContext.fill();
    myContext.closePath();
  }
};

var baseBulb = {
  draw: function() {
    //Bulb Base
    //Line 1
    myContext.beginPath();
    myContext.moveTo(90, 100);
    myContext.lineTo(90, 120);
    // myContext.moveTo(90, 120);
    myContext.lineTo(110, 120);
    // myContext.moveTo(110, 120);
    myContext.lineTo(110, 100);
    myContext.moveTo(90, 100);
    myContext.lineTo(110, 100);
    myContext.moveTo(90, 110);
    myContext.lineTo(110, 110);
    myContext.fillStyle = "#c5c5c5";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();

  }
};

var switchCase = {
  draw: function() {
    //Switch Case
    myContext.beginPath();
    myContext.rect(185, 30, 70, 90);
    myContext.fillStyle = "#E7BA8D";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();

    //On/off
    myContext.beginPath();
    myContext.rect(205, 50, 30, 50);
    myContext.fillStyle = "#c9c8c7";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();

    //On
    myContext.beginPath();
    myContext.rect(215, 65, 10, 10);
    myContext.fillStyle = "black";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();

    //Off
    myContext.beginPath();
    myContext.rect(215, 80, 10, 10);
    myContext.fillStyle = "black";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();

  }

};

var wire = {
  draw: function() {
    myContext.beginPath();
    myContext.moveTo(220, 120);
    myContext.lineTo(220, 140);
    myContext.lineTo(100, 140);
    myContext.lineTo(100, 120);
    myContext.stroke();
    myContext.closePath();

  }
};

var timer = setInterval(firstScene, 30);

function firstScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Draw Background
  background.draw();


  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#FFFFFF";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  baseBulb.draw();

  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "red";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  handX -= 1;
  handY -= 0.8;
  handWidth += 0.3;
  handHeight += 0.3;

  //Condition
  if (handX < 215) {
    handX = 215;
    handY = 67;
    clearInterval(timer);
    secondScene();
  }
}

console.log(handX);
console.log(handY);

var energyTransfer1 = [125, 135];
var energyTransfer2 = [210, 200, 190, 180, 170, 160, 150, 140, 130, 120, 110, 100];
var energyTransfer3 = [];

var timer2;

function secondScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Draw Background
  background.draw();


  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#FFFFFF";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();

  //Switch Case
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "green";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();


  for (var i = 0; i < 2; i++) {
    myContext.beginPath();
    myContext.arc(220, energyTransfer1[i], 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }
  setTimeout(function() {
    thirdScene();
  }, 1000);

}


var timer3;

function thirdScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);


  //Background
  background.draw();


  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#FFFFFF";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();

  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "green";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  for (var i = 0; i < 2; i++) {
    myContext.beginPath();
    myContext.arc(220, energyTransfer1[i], 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  for (var i = 0; i < 12; i++) {
    myContext.beginPath();
    myContext.arc(energyTransfer2[i], 140, 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  setTimeout(function() {
    fourthScene();
  }, 1000);


}

var timer4;

function fourthScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();


  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#FFFFFF";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();

  //Switch Case
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "green";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  myContext.beginPath();
  myContext.arc(100, 130, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  myContext.beginPath();
  myContext.arc(100, 120, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  for (var i = 0; i < 2; i++) {
    myContext.beginPath();
    myContext.arc(220, energyTransfer1[i], 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  for (var i = 0; i < 12; i++) {
    myContext.beginPath();
    myContext.arc(energyTransfer2[i], 140, 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  setTimeout(function() {
    fifthScene();
  }, 1000);
}

var timer5;

function fifthScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();

  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "green";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();


  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();


  myContext.beginPath();
  myContext.arc(100, 130, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  myContext.beginPath();
  myContext.arc(100, 120, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  for (var i = 0; i < 2; i++) {
    myContext.beginPath();
    myContext.arc(220, energyTransfer1[i], 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  for (var i = 0; i < 12; i++) {
    myContext.beginPath();
    myContext.arc(energyTransfer2[i], 140, 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }


  setTimeout(function() {
    // sixthScene();
    clearInterval(timer3);
    timer4 = setInterval(sixthScene, 50);
  }, 1000);
}

var timer5;

function sixthScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();

  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "green";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  handY += 1;

  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  myContext.beginPath();
  myContext.arc(100, 130, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  myContext.beginPath();
  myContext.arc(100, 120, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  for (var i = 0; i < 2; i++) {
    myContext.beginPath();
    myContext.arc(220, energyTransfer1[i], 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  for (var i = 0; i < 12; i++) {
    myContext.beginPath();
    myContext.arc(energyTransfer2[i], 140, 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  if (handY > 85) {
    handY = 85;
    clearInterval(timer4);
    seventhScene();
  }
}

function seventhScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();

  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "red";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();


  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  myContext.beginPath();
  myContext.arc(100, 130, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  myContext.beginPath();
  myContext.arc(100, 120, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();


  for (var i = 0; i < 12; i++) {
    myContext.beginPath();
    myContext.arc(energyTransfer2[i], 140, 3, 0, 2 * Math.PI);
    myContext.fillStyle = "#fdff00";
    myContext.fill();
    myContext.stroke();
    myContext.closePath();
  }

  setTimeout(function() {
    // sixthScene();
    eightScene();
  }, 1000);

}

function eightScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();

  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "red";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();


  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  myContext.beginPath();
  myContext.arc(100, 130, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  myContext.beginPath();
  myContext.arc(100, 120, 3, 0, 2 * Math.PI);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  setTimeout(function() {
    // sixthScene();
    ninthScene();
  }, 1000);
}

function ninthScene() {

  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();

  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#fdff00";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "red";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();

  setTimeout(function() {
    // sixthScene();
    tenthScene();
  }, 1000);
}

function tenthScene() {
  //Clear Everything
  myContext.clearRect(0, 0, canvasWidth, canvasHeight);

  //Background
  background.draw();

  //Beziel Curve
  myContext.beginPath();
  myContext.moveTo(90, 100);
  myContext.bezierCurveTo(15, 10, 190, 10, 110, 100);
  myContext.fillStyle = "#FFFFFF";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();

  //Bulb Base
  baseBulb.draw();
  switchCase.draw();

  //Indicator
  myContext.beginPath();
  myContext.rect(215, 55, 10, 5);
  myContext.fillStyle = "red";
  myContext.fill();
  myContext.stroke();
  myContext.closePath();


  //Hand
  myContext.drawImage(hand, handX, handY, handWidth, handHeight);

  //Wires
  wire.draw();
}
