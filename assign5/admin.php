<?php
  session_start();
  $username = $_SESSION['username'];
 ?>

<!-- User guide-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8>
    <title>Stock Portfolio Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Style CSS-->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Icon-->
    <link rel="icon" href="https://lh3.ggpht.com/7B2IoeJhz_RdHhJm6WNhAfbnL3HTyqdtNDI-291PRIASGESP2oxTkMYtMrww2u9L__c=w300">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Custom jQuery-->
    <!-- <script src="jQuery.js"></script> -->
  </head>
  <body>
    <div class="title-container heading">
      <h1>Stock Portfolio Manager</h1>
    </div>
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="admin.php">Stock Manager</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="admin.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </nav>
        <br>

        <div class="alert alert-info">
          <strong>Information:</strong> To <strong>add</strong> a stock, please put the <strong>stock symbol</strong> and the <strong>number of shares</strong> in the text field.
                                    <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo <strong>modify</strong> a stock, please put the <strong>stock symbol</strong> from your portfolio and the <strong>desired number of modified shares</strong> inside the text field.
                                    <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTo <strong>remove</strong> a stock, please choose the <strong>radio button</strong> of the stock that you want to delete, then press the <strong>delete</strong> button.
        </div>
        <div class="row">
        <div class="col-md-4">
          <h4>Add/Modify a stock </h4>
          <form method="post">
            <label for="stocktick">Stock Symbol:</label>
            <input type="text" class="form-control" id="stocktick" name="stocktick" value='<?php ?>'/>
            <label for="noshares">Number of shares:</label>
            <input type="number" class="form-control" id="noshares" name="noshares" value='<?php ?>'/>
            <br>
            <button type="submit" class="btn btn-primary" id="addStock" name="addStock" value="Add" formaction="addStock.php">Add</button>
            <button type="submit" id="modifyStock" class="btn btn-info" name="modifyStock" formaction="modifyStock.php">Modify</button>
          </form>
        </div>
        <div class="col-md-8">
          <h4>My Portfolio</h4>
          <div class="row" id="result">
            <table class="table table-hover">
              <thead class="head-decorate">
                <tr>
                  <td></td>
                  <td>Stock</td>
                  <td>Number of Shares</td>
                  <td>Share Price</td>
                  <td>Total Value</td>
                  <td>Date Added/Modified</td>
                </tr>
              </thead>
              <tbody id="answers">
                <form method="post">
                      <?php
                       $fp = fopen("information.dat", "r");

                       while($line = fgets($fp)){
                         //Get variable using tokenizer
                         $symbol = strtok($line, ",");
                         $noshares = strtok(",");
                         $sharePrice = strtok(",");
                         $totalValue = strtok(",");
                         $today = strtok(",");
                         $inc++;
                         $dataLine = "<tr><td><input type='radio' name='stock' value='$inc'><br></td><td>$symbol</td><td>$noshares</td> <td>$sharePrice</td> <td>$totalValue</td> <td>$today</td></tr>";
                         //Output Data
                         echo $dataLine;
                       }
                       fclose($fp);
                       ?>
                     <button type="submit"  class="btn btn-danger" name="deleteStock" formaction="deleteStock.php">Delete</button>
               </form>
              </tbody>
           </table>

           </div>

        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
          <div class="alert alert-success">
          <h2>Total Portfolio Value: <?php
          $fp = fopen("information.dat", "r");
          while($line = fgets($fp)){
            //Get variable using tokenizer
            $symbol = strtok($line, ",");
            $noshares = strtok(",");
            $sharePrice = strtok(",");
            $totalValue = strtok(",");
            $today = strtok(",");
            $portVal += $totalValue;
          }
          $portValue=number_format($portVal, 2, '.', '');
          if($portValue==0){
            echo "$0.00";
          }else{
          echo "$". $portValue;}
          fclose($fp);
          ?></h2>
        </div>
        </div>
      </div>
      </div>
      <div class="row">
          <h4>Chart Analysis</h4>
          <!-- TradingView Widget BEGIN -->
          <script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
          <script type="text/javascript">
          new TradingView.widget({
            "width": 980,
            "height": 610,
            "symbol": "NASDAQ:AAPL",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "Black",
            "style": "2",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "watchlist": [
              "NASDAQ:AAPL",
              "NASDAQ:TSLA",
              "COINBASE:BTCUSD",
              "COINBASE:ETHUSD",
              "NYSE:TWTR",
              "NYSE:SNAP",
              "NASDAQ:AMD",
              "NASDAQ:NVDA",
              "AMEX:JNUG",
              "AMEX:JDST",
              "OTC:UWTIF",
              "OTC:DWTIF"
            ],
            "hideideas": true,
            "studies": [
              "DM@tv-basicstudies",
              "BB@tv-basicstudies",
              "RSI@tv-basicstudies"
            ]
          });
          </script>
          <!-- TradingView Widget END -->
      </div>
   </div>
  </body>
  </html>
