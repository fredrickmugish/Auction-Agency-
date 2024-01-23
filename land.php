<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House</title>
    <link rel="stylesheet" href="dropdown.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="menu-bar">
        <ul>
            <li><a href="home.html"><i class="fa fa-home"></i>Home</a></li>
           
            <li><a href="#"><i class="fa fa-inr"></i>Auctions</a>
                <div class="sub-menu-1">
                    <ul>
                        <li><a href="house.php">Houses</a></li>
                        <li><a href="cars.php">Cars</a></li>
                        <li><a href="land.php">Lands</a></li>
                    </ul>
                </div>
            </li>

            
            <li><a href="#"><i class="fa fa-phone"></i>Contact</a>
            <div class="sub-menu-1">
                 <ul>
                    <li style="color:white">0762521584</li>
                    <li style="color:white">0633349974</li>
                </ul>
            </div>
            </li>
            <li><a href="login.html"><i class="fa fa-user"></i>Log In</a></li>
          
         

        </ul>
        <div class="search-menu">
        <form action="#" method="post" name="search-bar">
            <input class="srch" type="text" placeholder="Product/Location" name="search">
            <input class="btn" type="submit" value="Search">
        </form>
        </div>
    </div>


    <div class="row">
    <?php
    include('config.php');

    $sql = "SELECT * FROM Items WHERE Category = 'Land'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo '<div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="' . $row['image_path'] . '" height="" width="" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="card-text"><i class="fa fa-map-marker"></i> ' . $row['Location'] . '</p>
                        <h5 class="card-title">' . $row['Description'] . '</h5>
                        <a class="btn btn-success" style="margin-right: 10px;">' . $row['Price'] . '</a>
                        <br>
                        <div class="timer" data-duration="13000">00:00:00</div>
                        
                           <a href="login.html"> <input type="submit" class="btn btn-primary" value="Place Bid"> </a>
                    
                    </div>
                </div>
            </div>';
    }
    ?>
</div>
        
  

    <script src="script.js"></script>
    
    <div class="footer">
    </div>
</body>
</html>