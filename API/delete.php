<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
require_once('../core/post.php');
require_once('../includes/config.php');

$post = new post($db);

//get raw posted date
$data = json_decode(file_get_contents("php://input"));
// blog post query
$post->id=$data->id;

if ($post->Delete()) {
    echo json_encode(
        array('message' => 'post Deleted')
    );
} else {
    echo json_encode(
        array('message' => 'post not Deleted')
    );
}