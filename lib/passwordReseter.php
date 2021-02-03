<meta charset="utf-8">
<?php
include "../../config.php";
include 'dbConnect.php';

$conn = mysqli_connect($host, $db_id, $db_pw, $db_name);

if(isset($_POST["id"]) || isset($_POST["password"])){
    $id = mysqli_escape_string($conn, $_POST["id"]);
    $pw = mysqli_escape_string($conn, $_POST["password"]);
    $pw = hash("sha256", $id.$pw);

    $q = "update users set pw='$pw' where id='$id'";
    $arr = sendQuery($q);
    if($arr!=1) {
        echo "<meta http-equiv='refresh' content='0;url=../index.php?error=1'>";
    } else{
        echo "<meta http-equiv='refresh' content='0;url=../index.php?reset=1'>";
    }
}
?>