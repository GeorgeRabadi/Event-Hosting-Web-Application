<?php

$fullname = $_POST['fullname'];
$userid = $_POST['userid'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Try and connect using the info above.
$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) 
	die('Connection Failed: '.$conn->connect_error);
else
	$stmt = $conn->prepare("insert into users(fullname, userid, password, email, gender) values(?, ?, ?, ?,? ,?)");
	$stmt->bind_param("sssss", $fullname, $userid, $password, $email, $gender);
	$stmt->execute;
	echo "Registration Successful";
	$stmt->close();
	$conn->close();

?>