<?php
    // processes associative array representing search terms
    // constructs sql query that will find proper matches
    function constructQuery($movieData)
    {
        global $connection;

        if (!movieDataIsValid($movieData)) {
            return false;
        }
        
        $title = mysqli_real_escape_string($connection, $movieData["title"]);
        $genre = mysqli_real_escape_string($connection, $movieData["genre"]);
        $rating = mysqli_real_escape_string($connection, $movieData["rating"]);
        $year = mysqli_real_escape_string($connection, $movieData["year"]);

        $keys = array_keys($movieData);
        $conds = array($title, $genre, $rating, $year);

        for ($i = 0; $i < count($conds); $i++) {
            if ($conds[$i] != "") {
                $validCons[] = $keys[$i] . "='" . $conds[$i] . "' ";
            }
        }
         
        $sql = "SELECT * FROM movies ";
  
        if (count($validCons) > 0) {
            $sql .= "WHERE " . implode(' AND ', $validCons);
        }
        
        return $sql;
    }

    // validate movie data
    // all 4 are empty, return false
    // post-adjustment addition
    function movieDataIsValid($movieData)
    {
        $validCheck = 0;
        $fieldsNum = count($movieData);

        foreach ($movieData as $key=>$val) {
            if (empty($val)) {
                $validCheck++;
            }
        }

        return $validCheck == $fieldsNum ? false : true;
    }

    // uses query constructed by the former function to obtain result set
    function search($query)
    {
        global $connection;
        
        if ($result = mysqli_query($connection, $query)) {
            return $result;
        }
    }

    // takes a result set and iterates over all rows in it
    // increments the count column which will be used to construct graph
    function incrementCount($resultSet)
    {
        global $connection;
        
        $inc = 1;
        $sqlStart = "UPDATE movies SET count='";
        $sqlUpdate = "";

        while ($row = mysqli_fetch_array($resultSet)) {
            $inc += $row[11];
            $sqlUpdate .= $sqlStart . $inc . "' WHERE id='" . $row[0] . "'";
            mysqli_query($connection, $sqlUpdate);
            $sqlUpdate = "";
            $inc = 1;
        }
        return $sqlUpdate;
    }

    // gets top 10 results based on count col
    // default order
    function getTopTen()
    {
        global $connection;

        $strQuery = "SELECT * FROM movies ORDER BY count DESC LIMIT 10";
        if ($res = mysqli_query($connection, $strQuery)) {
            return $res;
        }
    }
