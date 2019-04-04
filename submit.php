<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 03/04/2019
 * Time: 12:36
 */

require_once("api.php");
require_once("rate_limiting.php");

//get data
$user = strip_tags($_REQUEST['user']);
$message = strip_tags($_REQUEST['message']);
$time = time();

//verify data
if (!empty($user) && !empty($message) && strlen($user) < 20 && strlen($message) < 500) {

    //insert data
    $qry = $db->prepare('INSERT INTO chat (user, message, time) VALUES (?, ?, ?)');

    //insert into db and return success
    if (!$qry->execute(array($user, $message, $time))){
        http_response_code(400);
        exit("Database error");
    }
    else {
        echo "Success";
    }
}
else {
    //400 Bad Request
    http_response_code(400);
    exit("Check your parameters");
}
