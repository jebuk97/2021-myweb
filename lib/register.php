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
                echo "<meta http-equiv='refresh' content='0;url=../registration.php?error=1'>";
	    }

 	    $q = "select homeid from users where homeid='$homeid'";
            $arr = sendQuery($q);
	    if(mysqli_num_rows($arr)>=1) {
            echo "<meta http-equiv='refresh' content='0;url=../registration.php?error=2'>";
	        //exit('<script>alert("homeid exist");history.go(-1)</script>');
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
