<?php

$db_user ='root';
$db_pass ='';
$db_name = 'php-api';
$db_host= 'localhost:3307';

$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>