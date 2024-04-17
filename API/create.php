<?php
header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-with');
require_once ('../core/post.php');
require_once ('../includes/config.php');

$post = new post($db);

//get raw posted date
$data =json_decode(file_get_contents("php://input"));

$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;
$post->category=$data->category;
if($post->create()) {
    echo json_encode(
        array('message' => 'post created')
    );
}
    else
    {
        echo json_encode(
            array('message' => 'post not created')
        );
    }
