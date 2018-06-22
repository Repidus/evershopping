<!DOCTYPE html>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="./style.css">
<h2>EVERSHOPPING은 여러분을 환영합니다.</h2>
<form method='post' action='login_ok.php'>
  <table>
  <tr>
  	<td>아이디</td>
  	<td><input type='text' name='user_id' tabindex='1'/></td>
  	<td rowspan='2'><input type='submit' tabindex='3' value='로그인' style='height:50px'/></td>
  </tr>
  <tr>
  	<td>비밀번호</td>
  	<td><input type='password' name='user_pw' tabindex='2'/></td>
  </tr>
  </table>
  <div>
    <input type="radio" name="user_type" value="shopper" id="user_shopper" checked="checked"/>
    <label for="user_shopper">고객</label>
    <input type="radio" name="user_type" value="seller" id="user_seller"/>
    <label for="user_seller">판매자</label>
  </div>
</form>
<hr>
<a href="./join.php">회원가입</a>
