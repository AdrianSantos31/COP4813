<?php
  if (isset($_POST['modifyStock'])) {
    $stock = $_POST["stocktick"];
    $noshares = $_POST["noshares"];
    $floatNoShares = number_format($noshares, 2, '.', '');
    $today = date("F j Y h:i:s");

    //Yahoo CSV
    //Opens Yahoo CSV
    $open = fopen("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=sl1d1t1c1ohgv&e=.csv", "r");

    //Yahoo CSV Array Process
    while(!feof($open)){
    $doc =  fgets($open). "<br />";
    }

    //Exploder into array
    $stockArr = explode(",", $doc);

    //New Variables
    $sharePrice = $stockArr[1];
    $totalValue;
    $floatTotalValue = number_format($totalValue, 2, '.', '');

    /* * * * * * ALL COMMENTED OUT ARE DEBUGGERS * * * * */
    // echo $stock."<br>";
    // echo $floatNoShares."<br>";
    // echo $today."<br>";

    $data = file_get_contents("information.dat");

    // echo $data;

    $row = explode("\n", $data);

    // echo "<pre>";
    // print_r($row);
    // echo "</pre>";


    for ($x=0; $x <count($row); $x++){
      $day[] = explode(",",$row[$x]);
    }
    // echo '<pre>';
    // print_r($day);
    // echo '</pre>';

    for($x=0;$x<count($row);$x++){
      if($stock == $day[$x][0] ){
        $day[$x][1] = $floatNoShares;
        $day[$x][2] = $sharePrice;
        $totalValue = $floatNoShares*$sharePrice;
        $totalValue = number_format($totalValue, 2, '.', '');
        $day[$x][3] = $totalValue;
        $day[$x][4] = $today;
        // echo $day[$x][1];
        // echo $day[$x][2];
        // echo $day[$x][3];
        // echo $day[$x][4];
      }
    }

    // echo '<pre>';
    // echo print_r($day);
    // echo '</pre>';

    // $letters = array();
    // foreach ($day as $value) {
    //     $letters = array_merge($letters, $value);
    // }

    $test = implode("\n", array_map('implode', $day, array_fill(0, count($day), ',')));
    // echo $test;
    //Create a file pointer
    $fp = fopen("information.dat", "w");
    fwrite($fp,"$test");
    fclose($fp);

    //Server-side redirect
    header("Location: admin.php");


  }
 ?>
