<?php
$serverName = "localhost" ;
$databaseName = "owen" ;
$firstname = "firstname" ;
$lastname = "lastname" ;
$email = "email" ;
$number = "number" ;
$password = "password" ;
$age = "age " ;
$class = "class" ;

try {
	$conn = new PDO("sqlsrv:Server=$serverName; Database=$databaseName" , $firstname , &lastname , $email , $number , $password , $age , $class) ;
	$conn->setAttribute(PDO : :AFTER_ERRMODE, PDO: :ERRMODE_EXCEPTION) ;
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email =$_POST['email'];
	$number = $_POST['number'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$age = $_POST['age'];
	$class = $_POST['class'];
	
	$sql = "INSERT INTO classes (firstname, lastname, email, number, password, age, class) VALUES (?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$firstname, $lastname, $email, $number, $password, $age, $class]);
	
	echo "Registration successful" ; 
}
catch (PDOException $e) {
	echo "Error: " .$e->getMessage( );
}

$conn = null;

?>