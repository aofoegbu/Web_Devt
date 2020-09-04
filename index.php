<?php

if(!empty($_POST["name"]) && !empty($_POST["dob"]) && !empty($_POST["phone"])){

    function test_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = test_data($_POST["name"]);
    $dob = test_data($_POST["dob"]);
    $phone = test_data($_POST["phone"]);
    $comment = $_POST["comment"];

    $dbname = 'intro';
    $username = 'root';
    $password = '';
    $host = 'localhost';

    // host, username, password

    $con = mysqli_connect($host, $username, $password);             
    $con1 = mysqli_select_db($con, $dbname);
    $sub1 = mysqli_query($con, "INSERT INTO customer (name, dob, phone, comment) VALUES ('$name', '$dob', '$phone', '$comment')");

    if($sub1) {
        echo $name;
        // header('Location:/austine');
    } else {
        echo 'failed to submit';
        // header('Location:index.php');

    }

} else {
    echo 'all fields are required';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
    Name:
    <input type="text" name="name"><br/>
    Date Of Birth:
    <input type="date" name="dob"><br/>
    Phone:
    <input type="number" name="phone"><br/>
    Comment:
    <textarea name="comment"></textarea><br/>
    <input type="submit" value="Submit">
    </form>
    
</body>
</html>









