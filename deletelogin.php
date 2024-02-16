<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assuming you're passing the user ID via GET method
    if(isset($_GET['id'])) {
        $UserID = $_GET['id'];

        // Prepare and bind the delete query
        $stmt = $conn->prepare("DELETE FROM Users WHERE UserID = ?");
        $stmt->bind_param("i", $UserID); 
        
        // Execute the delete query
        if ($stmt->execute()) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting user: " . $conn->error;
        }

        // Close the prepared statement
        $stmt->close();
        $conn->close();
    } else {
        echo "User ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
