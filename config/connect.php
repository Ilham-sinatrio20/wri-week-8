<?php 
		session_start();
		
		define('SITEURL', 'http://localhost/ilham/');
		define('LOCALHOST',  'localhost');
		define('DB_USERNAME',  'root');
		define('DB_PASSWORD', '');
		define('DB_NAME', 'driver');

		$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD); //database connections

		$db_select = mysqli_select_db($conn, DB_NAME) or die (mysqli_error($conn)); //connecting database
