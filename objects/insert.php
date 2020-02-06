<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../user/user.php';
require('../config/vendor/autoload.php');
$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$stmt = $user->insert();
$faker = Faker\Factory::create();
$data=[];

for($i=0;$i<10;$i++){
 $data[$i]['first_name']=$faker->name;
 $data[$i]['last_name']=$faker->name;
 $data[$i]['password']=$faker->password;
}
print_r($data);
 
?>