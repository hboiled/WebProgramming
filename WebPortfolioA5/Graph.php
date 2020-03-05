<?php 
    $nums = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0);

    // generate random nums
for ($i = 0; $i < 100; $i++) {
    $randNum = rand(1, 10);
    if (array_key_exists($randNum, $nums)) {
        $nums[$randNum]++;
    }
}

    // size and dimensions
    $cols  = count($nums); 
    $width = 455; 
    $height = 320; 
    $padding = 10; 
    // extra col added for display
    $colWidth = $width / ($cols + 1);
    $maxHeight = max($nums);     

    //set colours
    $img = imagecreate($width, $height); 
    $gray = imagecolorallocate($img, 0xcc, 0xcc, 0xcc);         
    $white = imagecolorallocate($img, 0xff, 0xff, 0xff); 
    $black = imagecolorallocate($img, 0x00, 0x00, 0x00);

    //bg colour
    imagefilledrectangle($img, 0, 0, $width, $height, $white);     
    //vertical line
    imageline($img, ($colWidth - 10), 0, ($colWidth - 10), ($height - 34), $black);
    //horizontal line
    imageline($img, 32, ($height - 34), $width, ($height - 34), $black);
    // labels
    imagestring($img, 31, 0, 0, $maxHeight, $black);
    imagestring($img, 31, 0, $height - 20, "num", $black);
    imagestring($img, 31, 0, $height - 35, "count", $black);

    // build graph
foreach ($nums as $key => $occ) {         
    $colHeight = ($height / 100) * (($occ / $maxHeight) * 100);
    $x1 = $colWidth * $key;
    $y1 = $height - $colHeight;
    $x2 = $colWidth * ($key + 1) - $padding;
    $y2 = $height - 35;

    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $gray); 
    imagestring($img, 10, ($x1 + $colWidth/4), $y2, $occ, $black);
    imagestring($img, 10, ($x1 + $colWidth/4), ($y2 + 15), $key, $black);
}
 
    // set header img name
    header("Content-type: image/png"); 
  
    imagepng($img); 
?>
