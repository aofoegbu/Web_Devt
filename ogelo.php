
<?php
if(isset($_POST["name"])){
    

    function test_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = test_data($_POST["name"]);
    $qty = test_data($_POST["qty"]);
    $description = test_data($_POST["description"]);

    $dbname = 'oconne';
    $host = 'localhost';
    $username = 'root';
    $password = '';

    $con = mysqli_connect($host, $username, $password);
    $con1 = mysqli_select_db($con, $dbname);
    $sub1 = mysqli_query($con, "INSERT INTO item (name, qty, description) VALUES ('$name', '$qty', '$description')");

    if($sub1) {
        echo $name;
        header('Location:ogelo.php');
    } else {
        echo 'reject';
        header('Location:ogelo.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items</title>
</head>
<body>
    <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
    Item Name:
    <input type="text" name="name"><br/>
    Quantity:
    <input type="number" name="qty"><br/>
    Item Description:
    <input type="text" name="description"><br/>
    <input type="submit" value="Submit">
    </form>
</body>
</html>


