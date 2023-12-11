<?php
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];

	// Database connection
	$conn = new mysqli('localhost','root','','online_quiz');
	if($conn->connect_error)
	{
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	else 
	{
		$stmt = $conn->prepare("insert into registration(firstName, lastName, username, password, email, contact) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $username, $password, $email, $contact);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
	}
?>

