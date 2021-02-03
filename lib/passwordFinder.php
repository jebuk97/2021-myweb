<meta charset="UTF-8">
<?php
    include "../../config.php";
    include "dbConnect.php";

    $id = $_POST['id'];
    $name = $_POST['name'];

    $conn = mysqli_connect($host, $db_id, $db_pw, $db_name);
    $q = "select id from users where id='$id' and homeid='$name'";
    $arr = sendQuery($q);
    $result = $arr->fetch_array(MYSQLI_ASSOC);
    if(mysqli_num_rows($arr)==0){
        echo "<meta http-equiv='refresh' content='0;url=../findPassword.php?error=1'>";
    } else{
        redir_page($result['id']);
    }
    mysqli_close($conn);
//POST방식 전송 redirect 함수
function redir_page($redir_value){
    echo("<form name='redir_form' action='../findResult.php' method='post'>");
    echo("<input type='hidden' name='id' value='$redir_value'>");
    echo("</form> <script language='javascript'> document.redir_form.submit(); </script>");
}
?>