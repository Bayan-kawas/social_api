<?php
require('vendor/autoload.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

$faker = Faker\Factory::create();
/*
$users = [];
for($i=6;$i<11;$i++){
    $first_name=$faker->firstName();
    $user = array(
        "first_name" => $faker->firstName(),
        'last_name'=> $faker->lastName(),
        'password'=> $faker->password,
        'email' => $faker->safeEmail,
        'phone_number' => $faker->phoneNumber,
    ); 
    array_push($users,$user);
}


// print_r($users);
// INSERT into users (first_name, last_name, password, email, phone_number) 
// VALUES (.....),
// (........)


$sql = 'INSERT into `users` (`first_name`, `last_name`, `password`, `email`, `phone_number`) VALUES ';

$counter = 0;

foreach($users as $user){
    foreach($user as $key => $value){
        $user[$key] = mysqli_real_escape_string($conn, $value);
    }
    $counter++;
    $sql .= '(';
    $sql .= "'{$user['first_name']}',";
    $sql .= "'{$user['last_name']}',";
    $sql .= "'{$user['password']}',";
    $sql .= "'{$user['email']}',";
    $sql .= "'{$user['phone_number']}'";
    $sql .= ')';
    if($counter < count($users)){
        $sql .= ',';
    }
}

echo $sql;
$result = mysqli_query($conn, $sql);
var_dump(mysqli_error_list($conn));
var_dump($result);*/
///////////////////////////////////////////
 $posts=[];
 $user_id=rand(1,20);
for($i=0;$i<7;$i++){
  $post=[
      'content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'user_id' => rand(1,20)
  ]; 
  array_push($posts,$post);
}


$sql = 'INSERT INTO `posts` (`content`, `user_id`) VALUES ';
$counter2 =  0;
foreach ($posts as $post) {
    $sql .='(';
    $sql .= "'{$post['content']}',";
    $sql .= "{$post['user_id']}";
    $sql .= ')';
    if($counter2 < count($posts)-1){
        $sql .= ',';
    }
}
$result=mysqli_query($conn,$sql);

echo $sql;