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

    $sql = "SELECT product_id FROM ".$user_type."s WHERE id='".$user_id."'";
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
      <nav class="col-md-3">
        <ol class="nav nav-pills nav-stacked">
          <?php
            while ($row = mysqli_fetch_assoc($result)) {
              $sql = "SELECT product_name FROM products WHERE product_id='".$row['product_id']."'";
              $products = mysqli_query($conn, $sql);
              $row_products = mysqli_fetch_assoc($products);

              echo '<li><a href="./index.php?id='.$row['product_id'].'">'.$row_products['product_name'].'</a></li>'."\n";
            }
          ?>
        </ol>
      </nav>
      <div class="col-md-9">
        <article>
          <?php
            if ($user_type == "shopper") {
              if(empty($_GET['id']) === false) {
                $sql = "SELECT * FROM products LEFT JOIN sellers ON products.seller_id=sellers.id WHERE products.product_id=".$_GET['id'];
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_assoc($result);
                echo '<h2>'.htmlspecialchars($rows['product_name']).'</h2>';
                echo '<p>'.htmlspecialchars($rows['name']).'</p>';
                echo '<p>'.$rows['price'].'</p>';
                echo strip_tags($rows['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
              } else {
                echo "<div id='control'><a href='./explore.php' class='btn btn-success btn-lg'>장바구니 채우러가기</a></div>";
              }
            } else {
              if(empty($_GET['id']) === false) {
                $sql = "SELECT * FROM products WHERE product_id='".$_GET['id']."'";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_assoc($result);
                echo '<h2>'.htmlspecialchars($rows['product_name']).'</h2>';
                echo '<p>'.$rows['price'].'</p>';
                echo strip_tags($rows['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
              } else {
                echo "<div id='control'><a href='./upload.php' class='btn btn-success btn-lg'>상품 업로드하기</a></div>";
              }
            }
          ?>
        </article>
        <hr>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>
