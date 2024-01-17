<?php

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){

$Username  = $_POST['username'];
$Password = $_POST['password'];


$sql = "SELECT * FROM Users WHERE Username='$Username' AND Password='$Password'";

$result = $conn->query($sql);

if ($result->num_rows>0){

    echo "Login successfully";
}

else 
{
    echo "Invalid login credentials";
}

header("Location: house.html");

}
$conn->close();

?>