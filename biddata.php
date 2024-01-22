<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid</title>

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

        label {
        display: inline-block;
        width: 100px; 
        text-align: right;
        margin-right: 5px; 
    }

    </style>


</head>
<body>
<?php
require "config.php";

//sqlquery to retrieve data from the Bid table by joining with the Users table using the UserId 
$sql = "SELECT Amount, Users.Fname, Users.Lname
FROM Bid
INNER JOIN Users ON Bid.UserID = Users.UserID;
        
";

//Execute the query
$result = $conn->query($sql);


echo "<table>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Amount</th>
<th>Action</th>
<th>Action</th>
</tr>";

if($result->num_rows>0){

//output data of each row
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" .$row["Fname"]."</td>";
    echo "<td>" .$row["Lname"]."</td>";
    echo "<td>" .$row["Amount"]."</td>";
    echo "<td><a href='update.php?id=" .$row["id"]."' class='btn btn-primary'>Update</a></td>";
    echo "<td><a href='deletelogin.php?id=" .$row["id"]."' class='btn btn-danger'>Delete</a></td>";
    echo "</tr>";
}
}

else{
    echo "No records found";
}

echo "</table>";
$conn->close();

?>

</body>
</html>
