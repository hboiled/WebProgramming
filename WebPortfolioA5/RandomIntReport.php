<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
  $nums = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0);

  // generate random nums
  for ($i = 0; $i < 100; $i++) {
      $randNum = rand(1, 10);
      if (array_key_exists($randNum, $nums)) {
          $nums[$randNum]++;
      }
  }
  $cols  = count($nums); 

  // set the height and width of the graph image 

    $width = 350; 
    $height = 220; 

  // Set the amount of space between each column 
    $padding = 10; 

  // Get the width of 1 column 
    $colWidth = $width / $cols ; 

  // set the graph color variables 
    $im        = imagecreate($width,$height); 
    $gray      = imagecolorallocate ($im,0xcc,0xcc,0xcc); 
    $gray_lite = imagecolorallocate ($im,0xee,0xee,0xee); 
    $gray_dark = imagecolorallocate ($im,0x7f,0x7f,0x7f); 
    $white     = imagecolorallocate ($im,0xff,0xff,0xff); 

  foreach ($nums as $key => $occ) {      
    $colHeight = ($height / 100) * $occ;
    $x1 = $colWidth * $key;
    $y1 = $height - $colHeight;
    $x2 = $colWidth * ($key + 1) - $padding;
    $y2 = $height - 20;

    printf("%s %s %s %s %s", $colHeight, $x1, $x2, $y1, $y2);
  }
  $maxHeight = max($nums);
  echo "<p>$maxHeight</p>";
?>
    
</body>
</html>