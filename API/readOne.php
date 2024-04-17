<?php

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../core/post.php');
require_once('../includes/config.php');

$post = new post($db);
$id = $_GET['id']; // Get the post ID from the URL parameter
// blog post query
if (isset($_GET['id']))
{
    $result = $post->readOne($id);
    if ($result) {
        $ONE = array();
        $ONE['id'] = $result['post_id'];
        $ONE['title'] = $result['post_title'];
        $ONE['body'] = $result['post_body'];
        $ONE['author'] = $result['author'];
        $ONE['category_name'] = $result['cat_name'];
        $ONE['category_id'] = $result['cat_id'];
        $ONE['date'] = $result['created_at'];
        print_r(json_encode($ONE));
    }
    else {
       echo "ID Not found";
    }
}
else {
    echo "No Result";
}





