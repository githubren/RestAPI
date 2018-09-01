<?php
//Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
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

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

//Create post
if($post->create()) {

    echo json_encode(
        array('message' => 'POST Created')
        );
} else {

    echo json_encode(
        array('message' => 'Post not created')
     );
}
