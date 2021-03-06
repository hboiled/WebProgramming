<?php
  require_once('db_cred.php');
  function db_connect()
  {
      $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
      confirm_db_connect();
      return $connection;
  }

  function db_disconnect($connection)
  {
      if (isset($connection)) {
          mysqli_close($connection);
          echo "<p>Connection terminated.</p>";
      }
  }

  // rewrite
  function confirm_db_connect()
  {
      if (mysqli_connect_errno()) {
          $msg = "Database connection failed: ";
          $msg .= mysqli_connect_error();
          $msg .= " (" . mysqli_connect_errno() . ")";
          exit($msg);
      } else {
          echo "<p>Successfully connected.</p>";
      }
  }
