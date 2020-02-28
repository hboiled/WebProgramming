<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Number Separator</title>
<link rel="stylesheet" type="text/css" href="../style/style1.css" />
</head>

<body>
<h1>Number Separator</h1></br>
<div id="content">
<?php
    echo $_POST["num"] . " -- Your number.</br></br>";

    if (strlen($_POST["num"]) == 5) {    
        $intArr = array_map("intval", str_split($_POST["num"]));
        $intSum = 0;

        echo "Results: </br>";

        for ($i = 0; $i < count($intArr); $i++) {
        echo $intArr[$i] . " ";
        $intSum += $intArr[$i];
    }

    echo "=> " . $intSum;
    } else {
        echo "You must enter a 5 digit number to see the results.";
    }
?>
</div>
</body>

</html> 
