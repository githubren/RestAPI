<?php
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Categories.php';

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instantiate Blog categories object
$category = new Category($db);

//Blog category query
$result = $category->read();

//Get rowCount()
$num = $result->rowCount();

//Check if any categories
if($num > 0) {
    //Category Array
    $cat_arr = array();
    $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $cat_item = array(
            'id' => $id,
            'name' => $name
        );
        
        //Push to "data"
        array_push($cat_arr['data'], $cat_item);
    }

    //Turn to JSON & output
    echo json_encode($cat_arr);
   
} else {
    //No Category
    echo json_encode(
        array(
            'message' => 'No Category'
        )
    );
}