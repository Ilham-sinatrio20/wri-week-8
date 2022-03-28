<?php 
		//start session
		session_start();

		//Create Constatnts to store non repeating values 
		// define('SITEURL', 'https://www.an-dox.com/food-order/');
		// define('LOCALHOST',  'localhost');
		// define('DB_USERNAME',  'u1035172_privacy_owner');
		// define('DB_PASSWORD', 'lazarus_mission');
		// define('DB_NAME', 'u1035172_food_order');
		
		define('SITEURL', 'http://localhost/wri/week-8-master/');
		define('LOCALHOST',  'localhost');
		define('DB_USERNAME',  'root');
		define('DB_PASSWORD', 'ZeroTwo02');
		define('DB_NAME', 'driver');

		$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //database connections

		$db_select = mysqli_select_db($conn, DB_NAME) or die (mysqli_error()); //connecting database
?>