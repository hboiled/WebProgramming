<?php
    include "../shared/header.php";
    require_once('../private/db_init.php');

    $strQuery = "SELECT * FROM user_table";
    $query = mysqli_query($connection, $strQuery);

?>
<h1>List of Database Entries</h1>

<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
    </tr>
        <?php
            // generate entries based on how many rows
            while ($row = mysqli_fetch_array($query, MYSQLI_NUM)) {
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "</tr>";
            }
        ?>
</table>
 

</br>
<?php
    include "../shared/footer.php";
?>