<?php

   
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





  

// $sql = "SELECT id, name, model FROM phone";
// $result = mysqli_query($con, $sql);

// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["model"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }


mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone</title>
</head>
<body>
    <form action="send.php" method="POST">
    Name:
    <input type="text" name="name"><br/>
    Model:
    <input type="text" name="model"><br/>
    Quantity:
    <input type="number" name="quantity"><br/>
    <input type="submit" value="Submit">
    </form>
</body>
</html>







