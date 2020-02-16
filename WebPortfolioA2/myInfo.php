<html>
    <head>
        <title>Web Programming A2</title>
        <link rel="stylesheet" href="wstyle.css">  
    </head>
    <body>        
        <div id="navbar">
            <ul>
                <li>
                    <a href="myinfo.php">Home</a>
                </li>
                
            </ul>
        </div>

        <?php
        $name = "Samuel Siew Fei Lee";
        $studentID = "30018308";
        $stuEmail = "30018308@tafe.wa.edu.au";
        $pEmail = "sflee36@yahoo.com.au";
        $hobby1 = "programming";
        $hobby2 = "eating";

        printf ("<p>My name is %s. </br></br>
                My student ID is %s and my student emails is %s. </br></br>
                My personal email is %s and my hobbies include %s and %s.</p>", 
                $name, $studentID, $stuEmail, $pEmail, $hobby1, $hobby2);
        ?>
    </body>
</html>