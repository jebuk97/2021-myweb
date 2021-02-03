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

        .error-notice {
            border-radius: 5px;
            background-color: rgb(255, 69, 58);
            text-align: center;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .login-notice{
            text-align: center;
        }
        .input_alert{
            color: red;
            display: none;
            margin-bottom: 10px;
        }
        #id__field{
            margin-bottom: 0px;
            border-radius: 5px;
        }
        #pw__field{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #pw__confirm__field{
            margin-bottom: 0px;
            border-radius: 5px;
        }
        #homeid__field{
            margin-top: 10px;
        }
    </style>
</head>

<body class="align">

<div class="site__container">

    <div class="grid__container">
        <div class="login-logo" style="color:white; text-align:center">
            <h1><b>MyWeb</b></h1>
            <h3>Reset Password</h3>
        </div>
        <div>
            <?php
            if($_REQUEST['error']==1) {
                echo "<div class='error-notice'><label class='fontawesome-warning-sign'></label>
                입력하신 계정은 존재하지 않습니다.
                </div>";
            } else{
                echo "";
            }
            ?>
        </div>
        <form action="./lib/passwordFinder.php" method="POST" class="form form--login">

            <div class="form__field" id="id__field">
                <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
                <input id="register__username" type="text" name="id" class="form__input" placeholder="User ID" oninput="inputIdCheck(this.value)" required>
            </div>
            <div class="form__field" id="homeid__field">
                <label class="fontawesome-home"><span class="hidden">Name</span></label>
                <input id="register_homeid" type="text" name="name" class="form__input" placeholder="User Name" required>
            </div>
            <div class="form__field">
                <input type="submit" value="Reset" id="submit_button">
            </div>

            <div class="form__filed" style="text-align:center">
                <a href="/index.html">back</a>
            </div>
        </form>
    </div>

</div>


<script>
    function inputIdCheck(id){
        var alert = document.getElementById("input_id_alert");
        var targetField = document.getElementById("id__field");
        var submit_button = document.getElementById('submit_button');
        var reg = /[^0-9]/g;
        if(reg.test(id)){
            alert.style.display = 'block';
            targetField.style.border = 'solid 2px red';
            submit_button.disabled = true;
            submit_button.style.backgroundColor = 'grey';
        } else{
            alert.style.display = 'none';
            targetField.style.border = 'none';
            if( document.getElementById("register__password").value == document.getElementById("register__password__confirm").value) {
                submit_button.style.backgroundColor = '#ea4c88';
                submit_button.disabled = false;
            }
        }
    }

    function inputPwCheck(pw_confirm){
        var alert = document.getElementById("input_pw_alert");
        var targetField = document.getElementById("pw__confirm__field");
        var pw = document.getElementById("register__password").value;
        var reg= /[^0-9]/g
        if(pw_confirm.length>0 && pw_confirm!=pw){
            alert.style.display = 'block';
            targetField.style.border = 'solid 2px red';
            submit_button.disabled = true;
            submit_button.style.backgroundColor = 'grey';
        } else{
            alert.style.display = 'none';
            targetField.style.border = 'none';
            if(!reg.test(document.getElementById("register__username").value)) {
                submit_button.style.backgroundColor = '#ea4c88';
                submit_button.disabled = false;
            }
        }
    }
</script>
</body>
</html>