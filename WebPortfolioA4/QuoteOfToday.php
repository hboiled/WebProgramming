<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
</head>
<body>
    <h1>Quote of Today</h1>
    <button onClick="window.location.reload();" class="btns" type="button">Click here to display a random quote</button> 
    <?php
    $connection = mysqli_connect("localhost", "root", "", "quotes");
    
    echo "</br>";
    
    if (!$connection) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }

    $randNum = rand(1, 10);
    $statement = "Select * from famousquotes Where ID=".$randNum.";";

    if ($res = mysqli_query($connection, $statement)) {        
        if ($record = mysqli_fetch_row($res)) {
            printf("<p class='content'>%s</p>", $record[1], );
            printf("<p class='source'>%s</p>", $record[2]);
            
        }
        
    }
    
    mysqli_close($connection);
    ?>
</body>
</html>