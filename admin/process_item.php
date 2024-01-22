<?php

session_start();
// Check if the user is not logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to the login page
    header("Location: login.html");
    exit();
}
require ('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$Category = $_POST['category'];
$Location = $_POST['location'];
$Price = $_POST['price'];
$Description = $_POST['description'];

// Handle file upload (image)
$image_path = "";
if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_name = $_FILES['image']['name'];
    $image_path = "admin/uploads/" . $image_name; 
    
    // Move the uploaded image to the destination folder
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
}


$sql = "INSERT INTO Items (Category, Location, Price, Description, image_path) VALUES ('$Category', '$Location', '$Price', '$Description', '$image_path')";

if ($conn->query($sql) === TRUE){

    echo "Data inserted successfully";
    header("Location: panel.html");
    exit();
}

else
{
    echo "Data insert error: " .$conn->error;
}

}


$conn->close();

?>