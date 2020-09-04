<?php
   
if  (!empty($_POST["name"]) && !empty($_POST["phone"]) && !empty($_POST["address"])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

       
        $name = test_input($_POST["name"]);
        $phone = test_input($_POST["phone"]);
        $address = test_input($_POST["address"]);
        $status = test_input($_POST["status"]);
    
    
   

   
        $dbname = 'test';
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $con = mysqli_connect($host, $username, $password);
        $db_selection =mysqli_select_db($con,$dbname);
        $sub1 = mysqli_query($con,"INSERT INTO testament (name, phone, address, status) VALUES ('$name','$phone','$address','$status')");
        if ($sub1) {
            echo $name;
            header('Location:/austine');
            

        }else{
            echo'reject';
            header('Location:index.php');

        }
                 
    }else{
        echo "all fields are required";
    }
   
   


?>
