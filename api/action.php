<?php

header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers:* ");
header("Access-Control-Allow-Methods:* ");

$connect = new PDO("mysql:host=127.0.0.1;dbname=userdb", "localhost", "");

$method = $_SERVER['REQUEST_METHOD']; 

if($method === 'GET')
{
	if(isset($_GET['id']))
	{
		$query = "SELECT * FROM users WHERE id = '".$_GET["id"]."'";
		$result = $connect->query($query, PDO::FETCH_ASSOC);
		$data = array();

		foreach($result as $row)
		{
			$data['first_name'] = $row['first_name'];
			$data['email'] = $row['email'];
			$data['password'] = $row['password'];
			$data['dob'] = $row['dob'];
			$data['id'] = $row['id'];
		}

		echo json_encode($data);
	}
	else 
	{
		$query = "SELECT * FROM users ORDER BY id DESC";
		$result = $connect->query($query, PDO::FETCH_ASSOC);
		$data = array();

		foreach($result as $row)
		{
			$data[] = $row;
		}

		echo json_encode($data);
	}
}

if($method === 'POST')
{
	$form_data = json_decode(file_get_contents('php://input'));

	$data = array(
		':first_name'		=>	$form_data->first_name,
		':email'			=>	$form_data->email,
		':password'			=>	$form_data->password,
		':dob'				=>	$form_data->dob
	);

	$query = "
	INSERT INTO users (first_name, email, password, dob) VALUES (:first_name, :email, :password, :dob);
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo json_encode(["success" => "done"]);
}

if($method === 'PUT')
{
	$form_data = json_decode(file_get_contents('php://input'));

	$data = array(
		':first_name'		=>	$form_data->first_name,
		':email'			=>	$form_data->email,
		':password'			=>	$form_data->password,
		':dob'				=>	$form_data->dob,
		':id'				=>	$form_data->id
	);

	$query = "
	UPDATE users 
	SET first_name = :first_name, 
	email = :email,
	password = :password,
	dob = :dob
	WHERE id = :id
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo json_encode(["success" => "done"]);
}

if($method === 'DELETE')
{
	$data = array(
		':id' => $_GET['id']
	);

	$query = "DELETE FROM users WHERE id = :id";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo json_encode(["success" => "done"]);
}

?>
