<?php
  /* User guide
   Yahoo CSV Symbols
   sl1d1t1c1ohgv&e

   s -> Symbol => stockArr[0]
   l1 -> Last Trade (Price Only) => stockArr[1]
   d1 -> Last Trade Date => stockArr[2]
   t1 -> Last Trade Time => stockArr[3]
   c1 -> Change => stockArr[4]
   o -> Open => stockArr[5]
   h -> Day’s High => stockArr[6]
   g -> Day’s Low => stockArr[7]
   v -> Volume => stockArr[8]
   e -> Earnings per Share => stockArr[9]
  */

  //Variables
   $stock = $_POST["stocktick"];
   $noshares = $_POST["noshares"];
   $floatNoShares = number_format($noshares, 2, '.', '');
   $today = date("F j Y h:i:s");

   //Create a file pointer
   $fp = fopen("information.dat", "a");
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
   $totalValue = $noshares * $sharePrice;
   $floatTotalValue = number_format($totalValue, 2, '.', '');

   //Write the data
   fwrite($fp, "$stock,$floatNoShares,$sharePrice,$floatTotalValue,$today\n");

   //Close the file
   fclose($fp);

   //Server-side redirect
   header("Location: admin.php");
 ?>
