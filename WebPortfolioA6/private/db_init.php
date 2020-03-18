<?php
    require_once('db_funcs.php');
    require_once("db_query.php");
    $connection = db_connect();

    function insert_user($user) {
        global $connection;
        $name = mysqli_real_escape_string($connection, $user["name"]);
        $email = mysqli_real_escape_string($connection, $user["email"]);

        $sql = "INSERT INTO user_table (id, name, email) VALUES (null, '$name', '$email')";        
        
        if ($result = mysqli_query($connection, $sql)) {
            return $result;
        }          
    }
?>