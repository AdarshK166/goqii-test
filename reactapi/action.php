<?php

header("Access-Control-Allow-Origin:* ");
header("Access-Control-Allow-Headers:* ");
header("Access-Control-Allow-Methods:* ");

$host = "localhost";
$user = "root";
$password = "";
$db = "userdb";

$connect = mysqli_connect($host, $user, $password, $db);

$method = $_SERVER['REQUEST_METHOD']; 

if($method === 'GET')
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        $data = array();

        while($row = mysqli_fetch_assoc($result))
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
        $result = mysqli_query($connect, $query);
        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }

        echo json_encode($data);
    }
}

if($method === 'POST')
{
    $form_data = json_decode(file_get_contents('php://input'));

    $first_name = $form_data->first_name;
    $email = $form_data->email;
    $password = $form_data->password;
    $dob = $form_data->dob;

    $query = "INSERT INTO users (first_name, email, password, dob) VALUES ('$first_name', '$email', '$password', '$dob')";

    mysqli_query($connect, $query);

    echo json_encode(["success" => "done"]);
}

if($method === 'PUT')
{
    $form_data = json_decode(file_get_contents('php://input'));

    $first_name = $form_data->first_name;
    $email = $form_data->email;
    $password = $form_data->password;
    $dob = $form_data->dob;
    $id = $form_data->id;

    $query = "UPDATE users SET first_name = '$first_name', email = '$email', password = '$password', dob = '$dob' WHERE id = '$id'";

    mysqli_query($connect, $query);

    echo json_encode(["success" => "done"]);
}

if($method === 'DELETE')
{
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = '$id'";

    mysqli_query($connect, $query);

    echo json_encode(["success" => "done"]);
}

?>
