<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

  $user_id = $_GET['uid'];
  $product_id = $_GET['pid'];

  $sql = "SELECT * FROM shoppers WHERE id='".$user_id."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $user_name = $row['name'];
  $user_password = $row['password'];

  $sql = "INSERT INTO shoppers(id, name, password, product_id) VALUES('".$user_id."', '".$user_name."', '".$user_password."', '".$product_id."')";
  mysqli_query($conn, $sql);

  header('Location: ./index.php');
?>
