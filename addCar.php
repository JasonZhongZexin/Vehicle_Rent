<?php
    session_start();
    $model=$_REQUEST['model'];
    $file = './cars.xml';
    $cars = simplexml_load_file($file);
    header("Content-Type: text/html; charset=utf-8");
    header("Cache-Control: no-cache");
    foreach($cars as $car){
        if(($car->model)==$model){
            if(($car->availability)=="Y"){
                $thumbnail = "./images/" . (string)$car->model . ".jpg";
                $vehicle = (string)$car->model_year . "-". (string)$car->brand . "-" . (string)$car->model;
                if(!isset($_SESSION['cart'])||empty($_SESSION['cart'])){
                    $request_car = array('thumbnail'=>$thumbnail,'vehicle'=>$vehicle,'price_pre_day'=>(string)$car->price_per_day,'rental_days'=>1);
                    $vehicles = array($vehicle=>$request_car);
                    $_SESSION['cart']=$vehicles;
                }else{
                    $vehicles = $_SESSION['cart'];
                    if(array_key_exists($vehicle,$vehicles)){
                        $request_car = $vehicles[$vehicle];
                        $request_car['rental_days'] = ($request_car['rental_days'])+1;
                        $vehicles[$vehicle] = $request_car; 
                        $_SESSION['cart']=$vehicles;
                    }else{
                        $request_car = array('thumbnail'=>$thumbnail,'vehicle'=>$vehicle,'price_pre_day'=>(string)$car->price_per_day,'rental_days'=>1);
                        $vehicles[$vehicle] = $request_car;
                        $_SESSION['cart']=$vehicles;
                    }
                }
                echo "Add to the cart successfully.";
                // print_r($_SESSION['cart']);
            }else{
                echo "Sorry, the car is not available now. Please try other cars.";
            }
        }
    }
?>

