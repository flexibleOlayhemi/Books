<?php 
$temp = mysqli_connect('localhost','root','','bookstore');
function createDatabase(){
	$servername = "localhost";
	$username	= "root";
	$password	= "";
	$dbname		= "bookstore";


		//check connectio
		$con = mysqli_connect($servername,$username,$password) or die("Unable to connect".mysqli_connect_error());

		//create database
		$query = "CREATE DATABASE IF NOT EXISTS $dbname " ;

		if(mysqli_query($con,$query)){
			$con = mysqli_connect($servername,$username,$password,$dbname);

			//echo "Database created"."</br>";

		//create table 
			$query = "CREATE TABLE IF NOT EXISTS books(
			id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			book_name VARCHAR(25) NOT NULL,
			book_publisher VARCHAR(20) NOT NULL,
			book_price FLOAT
			);
		 ";
		 if (mysqli_query($con,$query)){
		 	//echo "Table created successfully"."</br>";
		 } else {

		 	echo "Error while creating Table"."</br>";
		 }

		}else
		{
			echo "Unable to create database".mysqli_error($con)."</br>";
		}

}
 ?>
