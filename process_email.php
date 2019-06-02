<?php
    session_start();
    ini_set("display_errors","On");
    error_reporting(E_ALL);
?>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="hertz_uts.css">
    </head>
    <body>
        <p>
        <?php
        $cost = $_REQUEST['cost'];
        $first_name=$_REQUEST['first_name'];
        $email=$_REQUEST['email'];
        $subject = "Renting confirmation"; 
        $from = "zexin.zhong-1@student.uts.edu.au";
        $content = "Thanks for renting cars from Hertz-UTS, the total cost is $cost<br><br>Detail are as follows:";
        if(isset($_SESSION['reservation_cart'])){ 
            foreach($_SESSION['reservation_cart'] as $car){
                $content .="<br><br>";
                $content .="Model: ".$car['vehicle']."<br>Mileage: ".$car['mileage']."<br>Fuel type: ".$car['fuel_type']."<br>Seats: ".$car['seats']."<br>Price pre day: $".$car['price_pre_day']."<br>Rent days: ".$car['rental_days']."<br>Description: ".$car['description']." ";
            }
        }
        session_destroy();
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Hertz-UTS@uts.edu.au";
    if(($first_name!=NULL||$first_name!="")&& ($email!=NULL||$email!="")){
        mail($email,$subject,$content,$headers);
        echo "<br> <div id=\"order_email\">Thanks for renting with us. <br>Your order has been processed and a confirmation email has been send to $email <br> Click <a href=\"index.php\"> Here </a> to start a new order.</div>";
    }
?>
</p>
</body>
</html>