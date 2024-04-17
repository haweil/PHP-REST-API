<?php
//headers
header ('Access-Control-Allow-Origin: *');
header ('Content-Type: application/json');

require_once ('../core/post.php');
require_once ('../includes/config.php');

$post = new post($db);

// blog post query
$result =$post->read();

$post_arr = [];
$post_arr['data'] = [];
    if (!empty($result))
    {
        foreach ($result as $res)
        {
            $item =[
                'id' => $res['post_id'],
                'title' => $res['post_title'],
                'body' => $res['post_body'],
                'author'=>$res['author'],
                'category_name' => $res['cat_name'],
                'category_id'=> $res['cat_id'],
                'data' => $res['created_at'],
            ];
            $post_arr ['data'] []=$item;
        }
        echo json_encode($post_arr);
    }
    else {
        echo "No Result";
    }





?>