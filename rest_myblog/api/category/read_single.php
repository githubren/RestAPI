<?php
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Categories.php';

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instantiate Blog post object
$cat = new Category($db);

//Get id
$cat->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get post
$cat->read_single();

//Create array
$cat_arr = array(
    'id' => $cat->id,
    'name' => $cat->name,

);

//Make JSON
print_r(json_encode($cat_arr));