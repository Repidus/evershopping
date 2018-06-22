<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap.min.css">
  </head>
  <body>
    <form action="join_process.php" method="post">
      <div class="container" style="padding: 20px">
        회원가입
        <div>
          <input type="radio" name="user_type" value="shopper" id="user_shopper" checked="checked"/>
          <label for="user_shopper">고객</label>
          &nbsp;&nbsp;
          <input type="radio" name="user_type" value="seller" id="user_seller"/>
          <label for="user_seller">판매자</label>
        </div>
        <div class="form-group">
          <label for="form-id">아이디</label>
          <input type="text" class="form-control" name="id" id="form-id" placeholder="">
        </div>
        <div class="form-group">
          <label for="form-password">비밀번호</label>
          <input type="password" class="form-control" name="password" id="form-password" placeholder="">
        </div>
        <div class="form-group">
          <label for="form-name">이름</label>
          <input type="text" class="form-control" name="name" id="form-name" placeholder="">
        </div>
        <input type="submit" name="submit-btn" class="btn btn-default btn-lg">
      </div>
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  </body>
</html>
