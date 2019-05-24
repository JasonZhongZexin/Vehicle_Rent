<?php
    session_start();
    $items =$_REQUEST;
    if($items!=NULL){
        $keys = array_keys($items);
        $vehicles = $_SESSION['cart'];
        foreach($keys as $vehicle){
            if(array_key_exists($vehicle,$vehicles)){
                $request_car = $vehicles[$vehicle];
                $request_car['rental_days'] = $items[$vehicle];
                $vehicles[$vehicle] = $request_car; 
                $_SESSION['cart']=$vehicles;
            }
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Out</title>
    <link rel="stylesheet" type="text/css" href="hertz_uts.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h4 class="header_title">Car Rental Center</h4>
            <!-- <input type="button" class="reservation_btn" value="Car Reservation" onclick="location.href='view_carts.php';"/> -->
        </header>
        <h1 align="center" id="reservation_title">Check Out</h1>
        <form method = "POST" action = "">
            <h2>Customer Details and Payment</h2>
            <h3>Please fill in your details. <span>*</span> indicates required field</h3>
            <table>
            <tr><td>First Name<span>*</span></td><td><input type="text" name = "first_name" require/></td></tr>
            <tr><td>Last Name<span>*</span></td><td><input type="text" name = "last_name" require/></td></tr>
            <tr><td>Email Address<span>*</span></td><td><input type="text" name = "email" require/></td></tr>
            <tr><td>Address Line1<span>*</span></td><td><input type="text" name = "address_line1" require/></td></tr>
            <tr><td>Address Line2</td><td><input type="text" name = "address_line2"/></td></tr>
            <tr><td>City<span>*</span></td><td><input type="text" name = "city" require/></td></tr>
            <tr><td>State<span>*</span></td>
            <td>
                <select name = "state">
                    <option value = "ACT">ACT</option>
                    <option value = "NSW">NSW</option>
                    <option value = "QLD">QLD</option>
                    <option value = "SA">SA</option>
                    <option value = "TAS">TAS</option>
                    <option value = "VIC">VIC</option>
                    <option value = "WA">WA</option>
                </select>
            </td></tr>
            <tr><td>Post Code<span>*</span></td><td><input type="text" name = "post_code" require/></td></tr>
            <tr><td>Payment Type<span>*</span></td><td>
                <select name = "payment">
                    <option value = "PayPal">PayPal</option>
                    <option value = "VISA">VISA</option>
                    <option value = "Master Card">Master Card</option>
                </select></td></tr>
    </table>
    </div>
</body>
</html>