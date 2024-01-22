<?php

session_start();
// Check if the user is not logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to the login page
    header("Location: login.html");
    exit();
}

include('config.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['UserID'])){
$UserID = $_SESSION['UserID'];
$Amount = $_POST['amount'];

$sql = "INSERT INTO Bid(UserID, Amount) VALUES ('$UserID','$Amount')";


if($conn->query($sql) == TRUE){

    echo "Data inserted successfuly";
    header("Location: loghouse.html");
    exit();
}

else

echo "Data insert error: ".$conn->error;;

}


$conn->close();


?>