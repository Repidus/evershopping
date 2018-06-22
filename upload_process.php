<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $user_id = $_POST['seller'];
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);

  $sql = "INSERT INTO products(product_name, seller_id, price, description) VALUES('".$name."', '".$user_id."', '".$price."', '".$description."')";
  mysqli_query($conn, $sql);

  $sql = "SELECT * FROM sellers WHERE id='".$user_id."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $user_name = $row['name'];
  $password = $row['password'];

  $sql = "SELECT * FROM products WHERE seller_id='".$user_id."' AND product_name='".$name."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $product_id = $row['product_id'];

  $sql = "INSERT INTO sellers(id, name, password, product_id) VALUES('".$user_id."', '".$user_name."', '".$password."', ".$product_id.")";

  mysqli_query($conn, $sql);

  header('Location: ./index.php');
?>
