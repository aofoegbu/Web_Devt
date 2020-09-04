<?php


$dbname = 'send';
$host = 'localhost';
$username = 'root';
$password = '';

$con = mysqli_connect($host, $username, $password);
$con1 = mysqli_select_db($con, $dbname);
// $sub1 = mysqli_query($con, "INSERT INTO phone (name, model, quantity) VALUES ('$name', '$model', '$quantity')");

// SELECT
$sql_sel = "SELECT id, name, model FROM phone";
$result = mysqli_query($con, $sql_sel);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["model"]. "<br>";
    }
} else {
    echo "0 results";
}

// DELETE
$sql_del = "DELETE FROM phone WHERE id=2";

if (mysqli_query($con, $sql_del)) {
    echo "Record deleted successfully. <br/>";
    
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

// UPDATE
$sql_update = "UPDATE phone SET name='Ogechi' WHERE id=1";

if (mysqli_query($con, $sql_update)) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . mysqli_error($con);
}

mysqli_close($con);









?>



