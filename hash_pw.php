<?php
if(isset($_POST["username"])) {


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $user = test_input($_POST["username"]);
    $pass = test_input($_POST["password"]);
    $pass =  password_hash($pass, PASSWORD_DEFAULT);
    $dbname = 'hash_pw';
    $host = 'localhost';
    $username = 'root';
    $password = '';

    $con = mysqli_connect($host, $username, $password);
    $con1 = mysqli_select_db($con, $dbname);
    $sub1 = mysqli_query($con, "INSERT INTO users (username, password) VALUES ('$user', '$password')");

    if($sub1) {
        echo $pass;
        echo '<br/>';
        echo var_dump($pass);

        if(password_verify('ogelo', $pass)){
            echo '<br/>Hooray';
        }else {
            echo '<br/>Hashed password';
        }
        // header('Location:hash_pw.php');
    } else {
        echo 'All fields required';
        header('Location:hash_pw.php');
    }

}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
</head>
<body>
    <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
    Username:
    <input type="text" name="username"><br/>
    Password:
    <input type="text" name="password"><br/>
    <input type="submit" value="Submit">
    </form>
</body>
</html>
