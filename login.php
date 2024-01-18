<?php

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){

$enteredUsername  = $_POST['username'];
$enteredPassword = $_POST['password'];

//fetch the password of entered username from the database
$sql = "SELECT Password FROM Users WHERE Username='$enteredUsername'";

$result = $conn->query($sql);

if ($result->num_rows>0){
 
    //fetch the row result and assign it value to the $hashpassword variable
    $row = $result->fetch_assoc();
    $hashPassword = $row['Password'];

   //verify the entered password and the hashed password
   if (password_verify($enteredPassword, $hashPassword)){
    echo "Login successfully";
    header("Location: loghome.html");
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