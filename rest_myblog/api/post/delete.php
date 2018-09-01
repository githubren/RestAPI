<?php
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-Width');


include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

//Instantiate Blog post object
$post = new Post($db);

//GET raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set Id to update
$post->id = $data->id;

//Delete post
if($post->delete()) {

    echo json_encode(
        array('message' => 'POST Deleted')
        );
} else {

    echo json_encode(
        array('message' => 'Post not Deleted')
     );
}