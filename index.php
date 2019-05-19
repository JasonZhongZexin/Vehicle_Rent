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
            xhttp.open("GET", "cars.xml", true);
            xhttp.send();
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
                setTitle(i+1,title);
                //alert(id);
                setImage(i+1,model);
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

        // function dispalyItem(index){
        //     document.getElementById(id).style.display = "inline-block";
        // }

        $(document).ready(function(){
            load_cars();
        });
    </script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h4 class="header_title">Car Rental Center</h4>
            <!-- <input type="button" class="reservation_btn" value="Car Reservation" /> -->
        </header>
        <div class="gallery">
            <div class="thumbnail1">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards1"/>
                <h4 id=cards1_title></h4>
                <p class="tag1">HTML, CSS, JS, WordPress</p>
                <p class="text_column1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail2">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards2"/>
                <h4 id=cards2_title></h4>
                <p class="tag2">HTML, CSS, JS, WordPress</p>
                <p class="text_column2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail3">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards3"/>
                <h4 id=cards3_title></h4>
                <p class="tag3">HTML, CSS, JS, WordPress</p>
                <p class="text_column3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail4">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards4"/>
                <h4 id=cards4_title></h4>
                <p class="tag4">HTML, CSS, JS, WordPress</p>
                <p class="text_column4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="gallery">
            <div class="thumbnail5">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards5"/>
                <h4 id=cards5_title></h4>
                <p class="tag5">HTML, CSS, JS, WordPress</p>
                <p class="text_column5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail6">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards6"/>
                <h4 id=cards6_title></h4>
                <p class="tag6">HTML, CSS, JS, WordPress</p>
                <p class="text_column6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail7">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards7"/>
                <h4 id=cards7_title></h4>
                <p class="tag7">HTML, CSS, JS, WordPress</p>
                <p class="text_column7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail8">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards8"/>
                <h4 id=cards8_title></h4>
                <p class="tag8">HTML, CSS, JS, WordPress</p>
                <p class="text_column8">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="gallery">
            <div class="thumbnail9">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards9"/>
                <h4 id=cards9_title></h4>
                <p class="tag9">HTML, CSS, JS, WordPress</p>
                <p class="text_column9">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail10">
                <img src="./images/320i.jpg" alt="" width="2000" id="cards10"/>
                <h4 id=cards10_title></h4>
                <p class="tag10">HTML, CSS, JS, WordPress</p>
                <p class="text_column10">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="thumbnail11">
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
            </div>
        </div>
    </div>
</body>
</html>