<?php
  function db_init($host, $duser, $dpw, $dname) {
    $conn = mysqli_connect($host, $duser, $dpw);
    mysqli_select_db($conn, $dname);
    mysqli_query($conn, "set names utf8");
    return $conn;
  }
?>
