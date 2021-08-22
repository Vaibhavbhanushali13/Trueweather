<?php
$domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
$repository = basename(dirname(__FILE__));
$website_path = $domain.'/'.$repository;

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<title>TrueWheather</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
	</head>


	<body>
    <div class="overlayer"></div>
    <span class="loader">
      <span class="loader-inner"></span>
    </span>
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" class="branding">
						<img src="" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">TrueWheather</h1>
							<small class="site-description">Plan your work according to wheather </small>
						</div>
					</a>

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->


			<div class="hero" data-bg-image="images/banner.png">
				<div class="container">
          <div align="center" id="weather-msg" style="text-align:center;background-color: white;">
            <!-- This is some text in a div element! -->
          </div>
					<div  class="find-location">
						<input type="text" id="search-weather" name="search-weather" placeholder="Find your location...">
						<input type="button" value="Find" onclick="getData()">
					</div>

				</div>
			</div>

			<div class="forecast-table">
        <div class="overlayer"></div>

				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"></div>
								<div class="date"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location"></div>
								<div class="degree">
									<div class="num"></div>
									<div class="forecast-icon">
										<img id="forecast_img" src="" alt="" width=90>
									</div>
								</div>
								<span><img src="images/icon-umberella.png" alt="Humidity"><span class="humidity"></span></span>
								<span><img src="images/icon-wind.png" alt=""><span class="wind_speed"></span></span>
                <span class="weather">Rainy</span>
                <span style="white-space: nowrap;">Visibility: <span class="visibility"></span></span>
                <span>H/L: <span class="TempHL0"></span></span>

							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day1"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img id="forecast_img1" src="" alt="" width=48>
								</div>
								<div class="degree1"></div>
                <small class="weather_status1"></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day2"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img id="forecast_img2" src="" alt="" width=48>
								</div>
								<div class="degree2"></div>
                <small class="weather_status2"></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day3"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img id="forecast_img3" src="" alt="" width=48>
								</div>
								<div class="degree3"></div>
                <small class="weather_status3"></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day4"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img id="forecast_img4" src=""  alt="" width=48>
								</div>
								<div class="degree4"></div>
                <small class="weather_status4"></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day5"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img id="forecast_img5" src=""  alt="" width=48>
								</div>
								<div class="degree5"></div>
                <small class="weather_status5"></small>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day6"></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<img id="forecast_img6" src=""  alt="" width=48>
								</div>
								<div class="degree6"></div>
                <small class="weather_status6"></small>
							</div>
						</div>
					</div>
				</div>
			</div>


			<footer class="site-footer">
        <div class="overlayer"></div>

				<div class="container">
					<p class="colophon" style="text-align:center;">Copyright 2021 TrueWheather.</p>
				</div>
			</footer> <!-- .site-footer -->
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
<script type="text/javascript" src="<?php echo $website_path; ?>/js/custom.js" async></script>
