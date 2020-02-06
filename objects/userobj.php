<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../user/user.php';
require('../config/vendor/autoload.php');
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$stmt = $user->read();

$num = $stmt->rowCount();



 
// check if more than 0 record found
if($num>0){
 
    // products array
    $users_arr=array();
    $users_arr["records"]=array();
 
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $eachuser=array(
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "password" => $password,
            "email" => $email,
            "phone_number" => $phone_number,
        );
        $faker = Faker\Factory::create();

 
        array_push($users_arr["records"], $eachuser);
    }

 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    
    echo json_encode($users_arr);
}
$data=[];

for($i=0;$i<10;$i++){
 $data[$i]['first_name']=$faker->name;
 $data[$i]['last_name']=$faker->name;
 $data[$i]['password']=$faker->password;
}
print_r($data);
 
// no products found will be here
 

?>