<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Reservation</title>
    <link rel="stylesheet" type="text/css" href="hertz_uts.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h4 class="header_title">Car Rental Center</h4>
            <!-- <input type="button" class="reservation_btn" value="Car Reservation" onclick="location.href='view_carts.php';"/> -->
        </header>
        <h1 align="center" id="reservation_title">Car Reservation</h1>
        <div id="cart_detial_container">
        <table id="cart_detail">
            <tr><th>Thumbnail</th><th>Vehicle</th><th>Price Per Day</th><th>Rental Days</th><th>Actions</th></tr>
            <?php
                if(isset($_SESSION['cart'])||!empty($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $car){
                        $thumbnail = $car['thumbnail'];
                        $vehicle = $car['vehicle'];
                        $price_pre_day = $car['price_pre_day'];
                        $rental_days = $car['rental_days'];
                        echo "<tr>";
                        echo "<td><img src=$thumbnail width=\"180\"/></td><td>$vehicle</td><td>$$price_pre_day</td><td><input type=\"number\" min =\"1\" max=\"365\" value=$rental_days /></td><td><input id=\"delete_btn\" type=\"button\" name=$vehicle value=\"Delete\"/></td>";
                        echo"</tr>";
                    }
                    echo "<td></td><td></td><td></td><td></td><td><input id=\"delete_btn\" type=\"button\" value=\"Proceeding to CheckOut\"/></td>";
                }
            ?>
        </table>
        </div>
    </div>
</body>
</html>
<script>
</script>