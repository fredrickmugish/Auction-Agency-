<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


<style>
table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: skyblue;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        .item-image {
            width: 150px; 
            height: 150px; 
        }

    </style>
</head>
<body>

<form action="process_item.php" method="POST" enctype="multipart/form-data">

<label>Item category:</label>
<select name="category" required>
     <option value="House">House</option>
     <option value=" Car">Car</option>
     <option value="Land">Land</option>
        </select>
<br>
       <lable> Location: </lable>
 <input type="text" name="location" required><br>
        
      <lable> Price: </lable>
<input type="text" name="price" required><br>

<lable> Description: </lable>
<input type="text" name="description" required><br>

<lable> Image: </lable>
<input type="file" name="image"/><br>

<input type="submit" value="Add item" class="btn btn-success"></input>
</form>
<br>

<!----show all items--->
<h1>All items</h1>


<?php

session_start();
// Check if the user is not logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to the login page
    header("Location: login.html");
    exit();
}
include "config.php"; 

// Retrieve data from the "items" table
$sql = "SELECT Category, Location, Price, Description, image_path FROM Items";
$result = $conn->query($sql);


echo "<table>
<tr>
<th>Category</th>
<th>Location</th>
<th>Price</th>
<th>Description</th>
<th>Image</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $Category = $row['Category'];
        $Location = $row['Location'];
        $Price = $row['Price'];
        $Description = $row['Description'];
        $image_path = $row['image_path'];

      
        echo "<tr>";
        echo "<td>$Category</td>";
        echo "<td>$Location</td>";
        echo "<td>$Price</td>";
        echo "<td>$Description</td>";
        echo "<td><img src='$image_path' class='item-image'></td>"; 
        echo "</tr>";
        
    }
} else {
    echo "No items found.";
}

// Close the database connection
$conn->close();
?>


</body>
</html>