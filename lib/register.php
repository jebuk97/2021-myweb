<meta charset="utf-8">
<?php
	include "../../config.php";
	include 'dbConnect.php';

    $conn = mysqli_connect($host, $db_id, $db_pw, $db_name);

	if(isset($_POST["id"]) || isset($_POST["password"]) || isset($_POST["homeid"])){
            $id = mysqli_escape_string($conn, $_POST["id"]);
            $pw = mysqli_escape_string($conn, $_POST["password"]);
	    $homeid = mysqli_escape_string($conn, $_POST["homeid"]);

	    $pw = hash("sha256", $id.$pw);

	    $q = "select id from users where id='$id'";
            $arr = sendQuery($q);
            if(mysqli_num_rows($arr)>=1) {
                exit('<script>alert("이미 존재하는 아이디 입니다.");history.go(-1)</script>');
            }

 	    $q = "select homeid from users where homeid='$homeid'";
            $arr = sendQuery($q);
	    if(mysqli_num_rows($arr)>=1) {
	        //exit('<script>alert("이미 존재하는 이름 입니다.");history.go(-1)</script>');
	    }
	
	    $q = "insert into users values ('$id', '$pw', '$homeid')";	
            $arr = sendQuery($q);

	    mkdir("../../users/$id", 0777);
	    chmod("../../users/$id", 0777);
	    copy("./tmp/index.html", "../../users/$id/index.html");


	    exit('<script>alert("registration ok");location.href="/"</script>');
        } else {
		exit('<script>alert("check values");history.go(-1)</script>');

        }
?>
