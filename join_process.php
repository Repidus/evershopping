<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

  $id = $_POST['id'];
  $password = $_POST['password'];
  $name = $_POST['name'];

  if ($_POST['user_type'] == "shopper") {
    $sql = "SELECT * FROM shoppers WHERE id='".$id."'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows != 0) {
      echo "<script>alert('이미 사용중인 아이디입니다.');history.back();</script>";
      exit;
    }
    $sql = "INSERT INTO shoppers (id, name, password) VALUES('".$id."', '".$name."', '".$password."')";
  } else {
    $sql = "SELECT * FROM sellers WHERE id='".$id."'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows != 0) {
      echo "<script>alert('이미 사용중인 아이디입니다.');history.back();</script>";
      exit;
    }
    $sql = "INSERT INTO sellers (id, name, password) VALUES('".$id."', '".$name."', '".$password."')";
  }
  mysqli_query($conn, $sql);
  header('Location: ./index.php');
?>
