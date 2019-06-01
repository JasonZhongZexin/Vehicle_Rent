<?php
    session_start();
    $deleteItem = $_GET['deleteItem'];
    if(isset($deleteItem)&&$deleteItem!=NULL){
        unset($_SESSION['reservation_cart'][$deleteItem]);
    }
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
        <form name="checkout_detail" action="checkOut.php" method="POST">
        <table id="cart_detail">
            <tr><th>Thumbnail</th><th>Vehicle</th><th>Price Per Day</th><th>Rental Days</th><th>Actions</th></tr>
            <?php
                if(isset($_SESSION['reservation_cart'])||!empty($_SESSION['reservation_cart'])){
                    foreach($_SESSION['reservation_cart'] as $car){
                        $thumbnail = $car['thumbnail'];
                        $vehicle = $car['vehicle'];
                        $price_pre_day = $car['price_pre_day'];
                        $rental_days = $car['rental_days'];
                        echo "<tr>";
                        echo "<td><img src=$thumbnail width=\"180\"/></td><td>$vehicle</td><td>$$price_pre_day</td><td><input type=\"text\" size=\"5\" class=\"rental_days\" name=$vehicle value=$rental_days /></td><td><input id=\"delete_btn\" type=\"button\" onclick=\"deleteItem(this.name)\" name=$vehicle value=\"Delete\"/></td>";
                        echo"</tr>";
                    }
                }
                $isEmpty = empty($_SESSION['reservation_cart']);
                echo "<td></td><td></td><td></td><td></td><td><input id=\"delete_btn\" type=\"button\" onclick=\"proceedingCheckOut($isEmpty)\" value=\"Proceeding to Checkout\"/></td>";
            ?>
        </table>
        </form>
        </div>
    </div>
</body>
</html>
<script>
    function deleteItem(item){
        if(confirm("Are you sure to remove this car from your reservation list? ")){
            window.location.href = "view_carts.php?deleteItem="+item;
        }
    }

    function proceedingCheckOut(isEmpty){
        if(isEmpty){
            alert("No car has been reserved");
            document.checkout_detail.action = "index.php";
            document.checkout_detail.submit();
        }else{
            if(validateDays()){
                document.checkout_detail.submit();
            }
        }
    }

    function validateDays(){
        var rental_days = document.getElementsByClassName("rental_days");
        var i;
        for(i = 0; i < rental_days.length; i++){
            if(isNaN(rental_days[i].value)||(rental_days[i].value)<=0){
                alert("Invalid rental days.");
                rental_days[i].focus();
                return false;
                break;
            }
        }
        return true;
    }
</script>