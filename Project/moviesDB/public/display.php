<?php
    include "../shared/header.php";
    require_once('../private/db_init.php');

    // init vars for further processing
    $result = null;
    $rows = 0;
    $movieData = array("title"=>"", "genre"=>"", "rating"=>"", "year"=>"");
    $queryStrLen = 20;
    $querySuccess = false;
    $truncQuery = "";
    $inc = "";
    
    if (isset($_POST["SubmitButton"])) {
        // populate movieData to construct query
        $movieData["title"] = $_POST["title"];
        $movieData["genre"] = $_POST["genre"];
        $movieData["rating"] = $_POST["rating"];
        $movieData["year"] = $_POST["year"];
        
        if ($sqlQuery = constructQuery($movieData)) {
            $result = search($sqlQuery);
            // create another result set to perform incrementCount function
            $iResult = search($sqlQuery);
            $inc = incrementCount($iResult);
            
            $rows = mysqli_num_rows($result);
            // for presenting search terms
            $truncQuery = substr($sqlQuery, $queryStrLen);
            $querySuccess = true;
        }
    }
    

?>
<a href="search.php">Go back</a>

<h1>
Result of Movie Search: 
<?php
    if ($rows > 0) {
        echo " $rows movies found";
    }
?> 
</h1>

<?php
    // result of query info
    echo "<p>Searching for movies " . $truncQuery . "</p></br>";
    echo "</br>" . $inc;
    if ($rows < 1) {
        echo "<p>There are no movies matching those search terms.</p>";
    }
?>

<table>
    <tr>
        <td>Title</td>
        <td>Studio</td>
        <td>Status</td>
        <td>Sound</td>
        <td>Versions</td>
        <td>Price</td>
        <td>Rating</td>
        <td>Year</td>
        <td>Genre</td>
        <td>Aspect</td>
        <td>Count</td>
    </tr>
        <?php
            // generate entries based on how many rows
            if ($querySuccess) {
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    echo "<tr>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td>".$row[6]."</td>";
                    echo "<td>".$row[7]."</td>";
                    echo "<td>".$row[8]."</td>";
                    echo "<td>".$row[9]."</td>";
                    echo "<td>".$row[10]."</td>";
                    echo "<td>".$row[11]."</td>";
                    echo "</tr>";
                }
            }
            
        ?>
</table>
 

</br>
<?php
    include "../shared/footer.php";
?>