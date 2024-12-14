<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitavox Smart Glove Interface</title>

    <!-- Bootstrap 4 CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

<script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        x.innerHTML = "";
      }
    }

    function showPosition(position) {
      sessionStorage.setItem("a",position.coords.latitude);
      sessionStorage.setItem("b",position.coords.longitude);
      var a=position.coords.latitude;
      var b=position.coords.longitude;
      document.cookie="a="+a;
      document.cookie="b="+b;
    }
    getLocation();

</script>
    
    <style>
        
        body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('image/bg.jpg'); /* Replace with your image */
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        
        .hero-section::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); 
            z-index: -1;
        }

        .title-text {
            color: white; 
            background-color: rgba(0, 0, 0, 0.7);
            font-size: 3.5rem;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            height: 25vh;
            padding-top: 45px;
        }

        .card-custom {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease; 
        }

       
        .card-custom:hover {
            transform: scale(1.05); 
        }

        .card-custom p {
            font-size: 18px;
        }

        .card-custom h5 {
            font-size: 1.25rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card-box {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 35px;
            color: #ffffff;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .card-box .card-title {
            text-transform: uppercase;
            padding: 10px 0px;
        }

        .card-box .card-title i {
            color: rgb(243, 107, 109);
        }

        .footer {
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            font-size: 1em;
            height: 10vh;
        }

        .footer p {
            margin-top: 10px;
            color: #ffffff;
            font-size: 18px;
            font-family: Arial, sans-serif;
            font-weight: 400;
        }

        .map-overlay {
            position: relative;
            width: 100%;
            height: 60vh;
        }

        .map-overlay iframe {
            border-radius: 10px;
            width: 100%;
            height: 100%;
            border: none;
            opacity: 0.7;
        }

        .map-overlay iframe {
            position: relative;
            z-index: 0; 
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade of blue */
            color: white;
        }
    </style>
</head>
<body onload="getLocation()">
<?php
include("connection.php");
$sql="select * from vellore_glove order by id desc limit 1";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$value1=$row["value1"];
$value2=$row["value2"];
$value3=$row["value3"];
$value4=$row["value4"];
$value5=$row["value5"];
$value6=$row["value6"];
$v5=$row["v5"];
$reading_time=$row["reading_time"];
?>
    <h1 class="title-text">Vitavox Smart Glove Interface</h1>

    <div class="hero-section">
        <div class="container-fluid container-content">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card-box mx-4">
                        <h4 class="card-title font-weight-bold"><i class="fa-solid fa-hands"></i> Gesture Translation</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card-custom p-4">
                                    <p class="text-center">Text of the Gesture</p>
                                    <p>MEMS Status: Active</p>
                                    <p>Flex Sensor Status: Active</p>
                                    <?php
                                        if($value1 >= 5.00)
                                        {
                                            ?>
                                            <p class="mt-3">I need my medicine or Please check my vitals; I'm feeling unwell</p>
                                            <?php
                                        }
                                        else if($value1 <= -5.00)
                                        {
                                            ?>
                                            <p class="mt-3">I'm feeling hungry!  Can I have something to eat</p>
                                            <?php
                                        }
                                        if($value2 <= -5.00)
                                        {
                                            ?>
                                            <p class="mt-3">I need help please come quickly</p>
                                            <?php
                                        }
                                        if($value3 > 3000)
                                        {
                                            ?>
                                            <p class="mt-3">Hello there, Nice to meet you</p>
                                            <?php
                                        }
                                        if($value4 > 3000)
                                        {
                                            ?>
                                            <p class="mt-3">Could I please have some water</p>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card-custom p-4">
                                    <h5 class="card-title text-center">Sign language of the gesture</h5>
                                    <?php
                                        if($value1 >= 5.00)
                                        {
                                            ?>
                                            <img src="image/sick.gif" style="width:100%;height:200px">
                                            <?php
                                        }
                                        else if($value1 <= -5.00)
                                        {
                                            ?>
                                            <img src="image/hungry.gif" style="width:100%;height:200px">
                                            <?php
                                        }
                                        if($value2 <= -5.00)
                                        {
                                            ?>
                                            <img src="image/help.gif" style="width:100%;height:200px">
                                            <?php
                                        }
                                        if($value3 > 3000)
                                        {
                                            ?>
                                            <img src="image/hello.gif" style="width:100%;height:200px">
                                            <?php
                                        }
                                        if($value4 > 3000)
                                        {
                                            ?>
                                            <img src="image/water.gif" style="width:100%;height:200px">
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card-custom p-4">
                                    <p class="text-center" style="font-size: 25px; font-weight: 600;">Flex Value 1:</p>
                                    <p class="text-center" style="font-size: 20px;"><?= $value3 ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card-custom p-4">
                                    <p class="text-center" style="font-size: 25px; font-weight: 600;">Flex Value 2:</p>
                                    <p class="text-center" style="font-size: 20px;"><?= $value4 ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card-box mx-4 mt-5">
                        <h4 class="card-title font-weight-bold"><i class="fa-solid fa-heart-pulse"></i> Vital Signs Monitoring</h4>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card-custom p-4">
                                    <p class="text-center" style="font-size: 25px; font-weight: 600;">Heart Rate:</p>
                                    <p class="text-center" style="font-size: 20px;"><?= $v5 ?> -- bpm</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card-custom p-4">
                                    <p class="text-center" style="font-size: 25px; font-weight: 600;">Temperature</p>
                                    <p class="text-center" style="font-size: 20px;"><?= $value6 ?> -- &#8451;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History Button -->
                <div class="col-md-12 text-center mt-4">
                    <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='sensor_fetchdata.php'">
                        <i class="fa-solid fa-history"></i> View History
                    </button>
                </div>

                <div class="col-md-12">
                    <div class="card-box mx-4 mt-5">
                        <h4 class="card-title font-weight-bold"><i class="fa-solid fa-map-marker-alt"></i> Live Location Tracking</h4>
                        <div class="map-overlay">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?= $_COOKIE['a'] ?>,<?= $_COOKIE['b'] ?>&z=15&output=embed"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Vitavox Smart Glove Interface. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
