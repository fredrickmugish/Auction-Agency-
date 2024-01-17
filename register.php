<?php

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){
$Fname = $_POST['fname'];
$Lname = $_POST['lname'];
$Username =$_POST['username'];
$Password = $_POST['password'];
$Email = $_POST['email'];



$sql = "INSERT INTO Users(Fname, Lname, Username, Password, Email) VALUES ('$Fname', '$Lname', '$Username', '$Password', '$Email')";


if ($conn->query($sql) == TRUE){

    echo "Data inserted successfuly";
}

else
{
    "Data insert error: " .$conn->error;
}


header("Location: register.html");
exit();
}


$conn->close();


?>