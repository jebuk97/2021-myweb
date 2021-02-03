<?php
	session_start();
	if($_SESSION["login"])
		echo "<script>location.href='./list.php'</script>";	
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>myweb</title>
<style>
@import url(http://weloveiconfonts.com/api/?family=fontawesome);
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}

* {
  box-sizing: border-box;
}

html {
  height: 100%;
}

body {
  background-color: #2c3338;
  color: white/*#606468*/;
  font: 400 0.875rem/1.5 "Open Sans", sans-serif;
  margin: 0;
  min-height: 100%;
}

a {
  color: #eee;
  outline: 0;
  text-decoration: none;
}
a:focus, a:hover {
  text-decoration: underline;
}

input {
  border: 0;
  color: inherit;
  font: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  -webkit-transition: background-color .3s;
          transition: background-color .3s;
}

.site__container {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  padding: 3rem 0;
}

.form input[type="password"], .form input[type="text"], .form input[type="submit"] {
  width: 100%;
}
.form--login {
  color: white/*#606468*/;
}
.form--login label,
.form--login input[type="text"],
.form--login input[type="password"],
.form--login input[type="submit"] {
  border-radius: 0.25rem;
  padding: 1rem;
}
.form--login label {
  background-color: #363b41;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}
.form--login input[type="text"], .form--login input[type="password"] {
  background-color: #3b4148;
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
.form--login input[type="text"]:focus, .form--login input[type="text"]:hover, .form--login input[type="password"]:focus, .form--login input[type="password"]:hover {
  background-color: #434A52;
}
.form--login input[type="submit"] {
  background-color: #ea4c88;
  color: #eee;
  font-weight: bold;
  text-transform: uppercase;
}
.form--login input[type="submit"]:focus, .form--login input[type="submit"]:hover {
  background-color: #d44179;
}
.form__field {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 1rem;
}
.form__input {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
}

.align {
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
      -ms-flex-direction: row;
          flex-direction: row;
}

.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.text--center {
  text-align: center;
}

.grid__container {
  margin: 0 auto;
  max-width: 20rem;
  width: 90%;
}
.login-notice{
   text-align: center;
}
.error-notice {
    border-radius: 5px;
    background-color: rgb(255, 69, 58);
    text-align: center;
    padding: 10px 0;
    margin-bottom: 10px;
}
.confirm-notice {
    border-radius: 5px;
    background-color: rgb(52, 199, 89);
    text-align: center;
    padding: 10px 0;
    margin-bottom: 10px;
}
</style>
</head>

<body class="align">

  <div class="site__container">

    <div class="grid__container">
	<div class="login-logo" style="color:white; text-align:center">
		<h1><b>MyWeb</b></h1>
	  </div>
        <div>
            <p class="login-notice">
                <label class="fontawesome-info-sign"></label> 사용자 아이디는 학번으로 설정해야 합니다.</p>
         <?php
            if($_REQUEST['error']==1) {
                echo "<div class='error-notice'><label class='fontawesome-warning-sign'></label>
                에러가 발생했습니다.
                </div>";
            } else if($_REQUEST['reset']==1) {
                echo "<div class='confirm-notice'>
                <label class='fontawesome-ok'></label>
                비밀번호가 초기화 되었습니다. 다시 로그인하세요.
                </div>";
            } else{
                echo "";
            }
            ?>
        </div>
      <form action="./lib/loginAction.php" method="POST" class="form form--login">

        <div class="form__field" id="id__field">
          <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
          <input id="login__username" type="text" name="id" class="form__input" placeholder="User ID" required>
        </div>
        <div class="form__field" id="pw__field">
          <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Log In">
        </div>
	
	<div class="form__filed" style="text-align:center">
		<a href="./registration.php">registration</a>
	</div>
      <div class="form__filed" style="text-align:center">
          <br/>
          <a href="./findPassword.php">비밀번호를 잊으셨나요?</a>
      </div>

      </form>
	
    </div>

  </div>

</body>
</html>
