<?php
if(isset($_POST["name"])) {
    echo 'true';
}
if(!empty($_POST["name"]) && !empty($_POST["model"]) && !empty($_POST["quantity"])) {


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST["name"]);
$model = test_input($_POST["model"]);
$quantity = test_input($_POST["quantity"]);


$dbname = 'send';
$host = 'localhost';
$username = 'root';
$password = '';

$con = mysqli_connect($host, $username, $password);
$con1 = mysqli_select_db($con, $dbname);
$sub1 = mysqli_query($con, "INSERT INTO phone (name, model, quantity) VALUES ('$name', '$model', '$quantity')");


if($sub1) {
    echo 'name';
    header('Location:send.php');
} else {
    echo 'failed to submit';
    header('Location:send.php');
}





}  else {
    echo 'Rejected';
}


?>
