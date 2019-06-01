<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="hertz_uts.css">
    <title>Hertz-UTS</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        function load_cars() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                //alert(this.readyState);
                if (this.readyState == 4 && this.status == 200) {
                    handleXML(this);
                }
            };
            var url = "./cars.xml";
            xhttp.open("GET", url, true);
            xhttp.send(null);
        }

        function handleXML(xml){
            var i;
            var xmlData = xml.responseXML;
            var cars = xmlData.getElementsByTagName("car");
            var table="<tr><th>category</th><th>availability</th><th>brand</th><th>model</th></tr>";
            dataSent = cars.length;
            for (i = 0; i <cars.length; i++) { 
                var title = cars[i].getElementsByTagName("brand")[0].childNodes[0].nodeValue +" - "+ cars[i].getElementsByTagName("model")[0].childNodes[0].nodeValue +" - "+ cars[i].getElementsByTagName("model_year")[0].childNodes[0].nodeValue;
                //alert(title);
                var model = cars[i].getElementsByTagName("model")[0].childNodes[0].nodeValue;
                var meileage = cars[i].getElementsByTagName("mileage")[0].childNodes[0].nodeValue;
                var fuel_type = cars[i].getElementsByTagName("fuel_type")[0].childNodes[0].nodeValue;
                var seats = cars[i].getElementsByTagName("seats")[0].childNodes[0].nodeValue;
                var price = cars[i].getElementsByTagName("price_per_day")[0].childNodes[0].nodeValue;
                var availability = cars[i].getElementsByTagName("availability")[0].childNodes[0].nodeValue;
                var description = cars[i].getElementsByTagName("description")[0].childNodes[0].nodeValue;
                setTitle(i+1,title);
                //alert(id);
                // alert(availability);
                setImage(i+1,model);
                setMileage(i+1,meileage);
                setFuel_type(i+1,fuel_type);
                setSeats(i+1,seats);
                setPrice(i+1,price);
                setAvailability(i+1,availability);
                setDescription(i+1,description);
                setAddCartButton(i+1,model);
                // dispalyItem(i+1);
            }
        }
        function setTitle(index,data){
            var id = "cards"+index+"_title";
            document.getElementById(id).innerHTML = data;
        }
        function setImage(index,model){
            var id="cards"+index;
            var images = "./images/"+model+".jpg"
            document.getElementById(id).src = images;
        }

        function setMileage(index,meileage){
            var data = "<b>Mileage: </b>"+meileage+" kms";
            var id="mileage"+index;
            document.getElementById(id).innerHTML = data;
        }

        function setFuel_type(index,fuel_type){
            var data = "<b>Fuel type: </b>"+fuel_type;
            var id="fuel_type"+index;
            document.getElementById(id).innerHTML = data;
        }

        function setSeats(index,seats){
            var data = "<b>Seats: </b>"+seats;
            var id="seats"+index;
            document.getElementById(id).innerHTML = data;
        }

        function setPrice(index,price){
            var data = "<b>Price pre day: </b>$"+price;
            var id="price"+index;
            document.getElementById(id).innerHTML = data;
        }

        function setAvailability(index,availability){
            var data = "<b>Availability: </b>"+availability;
            var id="availability"+index;
            document.getElementById(id).innerHTML = data;
        }

        function setDescription(index,description){
            var data = "<b>Description: </b>"+description;
            var id="description"+index;
            document.getElementById(id).innerHTML = data;
        }

        function setAddCartButton(index,model){
            var id = "add_btn"+index;
            document.getElementById(id).name = model;
            // alert(document.getElementById(id).name);
        }

        function addItem2Cart(model){
            // alert(model);
            checkAvailability(model);
        }

        // function dispalyItem(index){
        //     document.getElementById(id).style.display = "inline-block";
        // }

        $(document).ready(function(){
            load_cars();
        });

        function checkAvailability(model){
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function() {
                //alert(this.readyState);
                if (this.readyState == 4 && this.status == 200) {
                    addCarsResult(this);
                }
            };
            var url = "addCar.php?model="+model;
            ajax.open("GET", url, true);
            ajax.send(null);
        }

        function addCarsResult(res){
            alert(res.responseText);
        }
    </script>
</head>
<body>
<div class="container">
        <header class="header">
            <h4 class="header_title">Car Rental Center</h4>
            <input type="button" class="reservation_btn" value="Car Reservation" onclick="location.href='view_carts.php';"/>
        </header>
    <div class="gallery_container">
        <div class="gallery">
            <div class="thumbnail1">
                <img src="" alt="" width="2000" id="cards1"/>
                <h4 id=cards1_title></h4>
                <p id="mileage1"></p>
                <p id="fuel_type1"></p>
                <p id="seats1"></p>
                <p id="price1"></p>
                <p id="availability1"></p>
                <br/>
                <br/>
                <p id="description1"></p>
                <p><input type="button" id="add_btn1" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail2">
                <img src="" alt="" width="2000" id="cards2"/>
                <h4 id=cards2_title></h4>
                <p id="mileage2"></p>
                <p id="fuel_type2"></p>
                <p id="seats2"></p>
                <p id="price2"></p>
                <p id="availability2"></p>
                <br/>
                <br/>
                <p id="description2"></p>
                <p><input type="button" id="add_btn2" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail3">
                <img src="" alt="" width="2000" id="cards3"/>
                <h4 id=cards3_title></h4>
                <p id="mileage3"></p>
                <p id="fuel_type3"></p>
                <p id="seats3"></p>
                <p id="price3"></p>
                <p id="availability3"></p>
                <br/>
                <br/>
                <p id="description3"></p>
                <p><input type="button" id="add_btn3" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail4">
                <img src="" alt="" width="2000" id="cards4"/>
                <h4 id=cards4_title></h4>
                <p id="mileage4"></p>
                <p id="fuel_type4"></p>
                <p id="seats4"></p>
                <p id="price4"></p>
                <p id="availability4"></p>
                <br/>
                <br/>
                <p id="description4"></p>
                <p><input type="button" id="add_btn4" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
        </div>
        <div class="gallery">
            <div class="thumbnail5">
                <img src="" alt="" width="2000" id="cards5"/>
                <h4 id=cards5_title></h4>
                <p id="mileage5"></p>
                <p id="fuel_type5"></p>
                <p id="seats5"></p>
                <p id="price5"></p>
                <p id="availability5"></p>
                <br/>
                <br/>
                <p id="description5"></p>
                <p><input type="button" id="add_btn5" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail6">
                <img src="" alt="" width="2000" id="cards6"/>
                <h4 id=cards6_title></h4>
                <p id="mileage6"></p>
                <p id="fuel_type6"></p>
                <p id="seats6"></p>
                <p id="price6"></p>
                <p id="availability6"></p>
                <br/>
                <br/>
                <p id="description6"></p>
                <p><input type="button" id="add_btn6" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail7">
                <img src="" alt="" width="2000" id="cards7"/>
                <h4 id=cards7_title></h4>
                <p id="mileage7"></p>
                <p id="fuel_type7"></p>
                <p id="seats7"></p>
                <p id="price7"></p>
                <p id="availability7"></p>
                <br/>
                <br/>
                <p id="description7"></p>
                <p><input type="button" id="add_btn7" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail8">
                <img src="" alt="" width="2000" id="cards8"/>
                <h4 id=cards8_title></h4>
                <p id="mileage8"></p>
                <p id="fuel_type8"></p>
                <p id="seats8"></p>
                <p id="price8"></p>
                <p id="availability8"></p>
                <br/>
                <br/>
                <p id="description8"></p>
                <p><input type="button" id="add_btn8" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
        </div>
        <div class="gallery">
            <div class="thumbnail9">
                <img src="" alt="" width="2000" id="cards9"/>
                <h4 id=cards9_title></h4>
                <p id="mileage9"></p>
                <p id="fuel_type9"></p>
                <p id="seats9"></p>
                <p id="price9"></p>
                <p id="availability9"></p>
                <br/>
                <br/>
                <p id="description9"></p>
                <p><input type="button" id="add_btn9" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <div class="thumbnail10">
                <img src="" alt="" width="2000" id="cards10"/>
                <h4 id=cards10_title></h4>
                <p id="mileage10"></p>
                <p id="fuel_type10"></p>
                <p id="seats10"></p>
                <p id="price10"></p>
                <p id="availability10"></p>
                <br/>
                <br/>
                <p id="description10"></p>
                <p><input type="button" id="add_btn10" name="" value="Add to cart" onclick="addItem2Cart(this.name);"/></p>
            </div>
            <!-- <div class="thumbnail11">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards11"/>
                <h4 id=cards11_title></h4>
                <p class="tag11">HTML, CSS, JS, WordPress</p>
                <p class="text_column11">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail12">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards12"/>
                <h4 id=cards12_title></h4>
                <p class="tag12">HTML, CSS, JS, WordPress</p>
                <p class="text_column12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div> -->
        </div>
    </div>
</div>
</body>
</html>