<?php

session_start();

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){

$enteredUsername  = $_POST['username'];
$enteredPassword = $_POST['password'];

//fetch the password of entered username from the database
$sql = "SELECT Password, Usertype, UserID FROM Users WHERE Username='$enteredUsername'";

$result = $conn->query($sql);

if ($result->num_rows>0){
 
    //fetch the row result and assign it value to the $hashpassword & $usertype variable
    $row = $result->fetch_assoc();
    $hashPassword = $row['Password'];
    $usertype = $row['Usertype'];


   //verify the entered password and the hashed password
   if (password_verify($enteredPassword, $hashPassword)){
    $_SESSION['UserID'] = $row['UserID'];

    if ($usertype == 0){
    header("Location: loghome.html");
    }

    elseif($usertype == 1){
        header("Location: panel.html");
    }

    exit();
   }

    else {
        echo "<script> alert('Invalid password'); window.location.href = 'login.html';</script>";
    }
}

else {
    echo "<script>alert('Invalid login credentials'); window.location.href = 'login.html';</script>";
}


}
$conn->close();

?>