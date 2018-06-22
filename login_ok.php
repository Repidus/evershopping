<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

  if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
  $user_id = $_POST['user_id'];
  $user_pw = $_POST['user_pw'];

  $user_type = $_POST['user_type'];
  if($user_type == "shopper") {
    $result = mysqli_query($conn, "SELECT * FROM shoppers WHERE id='".$user_id."'");
  } else {
    $result = mysqli_query($conn, "SELECT * FROM sellers WHERE id='".$user_id."'");
  }

  if($result->num_rows == 0) {
    echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
    exit;
  }

  $row = mysqli_fetch_assoc($result);

  if($row['password'] != $user_pw) {
    echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
    exit;
  }
  session_start();
  $_SESSION['user_id'] = $user_id;
  $_SESSION['user_name'] = $row['name'];
  $_SESSION['user_type'] = $user_type;
?>
<meta http-equiv='refresh' content='0;url=index.php'>
