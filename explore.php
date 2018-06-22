<?php
  require("config/config.php");
  require("lib/db.php");
  $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
  //$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="./style.css">
  <link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css">
  <?php
    session_start();
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
      echo "<meta http-equiv='refresh' content='0;url=login.php'>";
      exit;
    }
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $user_type = $_SESSION['user_type'];
    echo "<div id='logout_btn'><a href='logout.php'>로그아웃</a></div>";
    echo "<div id='hi'>안녕하세요, $user_name($user_id)님!</div>";

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
  ?>
</head>
<body id="target">
  <div class="container">
    <header class="jumbotron text-center">
      <img src="./palm_trees.jpg" alt="palm trees" class="img-circle" id="logo">
      <h1><a href="./index.php">EVERSHOPPING</a></h1>
    </header>
    <div class="row">
      <div class="col-md-12">
        <article>
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<a class="btn btn-default btn-lg" href="./explore_process.php?uid='.$user_id.'&pid='.$row['product_id'].'">'.$row['product_name']."<br />".$row['price'].'원</a>'."\n";
            }
          ?>
        </article>
        <hr>
        <div id="control">
          <a href="./write.php" class="btn btn-success btn-lg">쓰기</a>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
