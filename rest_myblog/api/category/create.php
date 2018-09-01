<?php
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-Width');


include_once '../../config/Database.php';
include_once '../../models/Categories.php';

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instantiate Blog post object
$cat = new Category($db);

//GET raw posted data
$data = json_decode(file_get_contents("php://input"));

$cat->name = $data->name;

//Create post
if($cat->create()) {

    echo json_encode(
        array('message' => 'Category Created')
        );
} else {

    echo json_encode(
        array('message' => 'Category not created')
     );
}
