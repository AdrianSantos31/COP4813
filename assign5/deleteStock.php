<?php
  if (isset($_POST['deleteStock'])) {

    $stockID = $_POST["stock"];

    $data = file_get_contents("information.dat");
    /* * * * * * ALL COMMENTED OUT ARE DEBUGGERS * * * * * * */

    // echo $data;
    $row = explode("\n", $data);
    // echo "Before:  ". $stockID;

    $stockID -=1;

    if(stockID == -1){
      stockID == 0;
    }
    // echo "After:  ".$stockID;

    for ($x=0; $x <count($row); $x++){
      $day[] = explode(",",$row[$x]);
    }
    // echo '<pre>';
    // print_r($day);
    // echo '</pre>';


    unset($row[$stockID]);


    // echo '<pre>';
    // print_r($row);
    // echo '</pre>';

    $rowSize = (sizeof($row));

    $stringMe = implode("\n",$row);

    // echo $data;
    // echo $stringMe;

    $fp = fopen("information.dat", "w");

    fwrite($fp,"$stringMe");

    fclose($fp);

    //Server-side redirect
    header("Location: admin.php");


  }
 ?>
