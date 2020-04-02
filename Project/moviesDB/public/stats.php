<?php
    include "../shared/header.php";
    require_once('../private/db_init.php');
    
    $querySuccess = false;
    if ($result = getTopTen()) {
        $querySuccess = true;
    }

?>

<h1>Top 10 most searched movies: </h1>

<!-- graph data -->
<h2>Graph:</h2>
<img src="images/statgraph.php" alt="Top 10 movies searched">

<h2>Table:</h2>
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
            // generate table for top ten rows
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