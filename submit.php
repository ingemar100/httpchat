<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 03/04/2019
 * Time: 12:36
 */

require_once("api.php");
require_once("rate_limiting.php");


if (!empty($_REQUEST['user']) && !empty($_REQUEST['message']) && !empty($_REQUEST['destination'])){
    //get data
    $user = strip_tags($_REQUEST['user']);
    $message = strip_tags($_REQUEST['message']);
    $destination = strip_tags($_REQUEST['destination']);
    $time = time();

    //verify data
    if (strlen($user) < 20 && strlen($message) < 500 && strlen($destination) < 20) {

        //insert data
        $qry = $db->prepare('INSERT INTO chat (sender, message, time, receiver) VALUES (?, ?, ?, ?)');

        //insert into db and return success
        if (!$qry->execute(array($user, $message, $time, $destination))) {
            http_response_code(400);
            exit(json_encode("Database error"));
        } else {
            echo json_encode("Success");
        }
    }
    else {
        //400 Bad Request
        http_response_code(400);
        exit(json_encode("Input too long"));
    }
}
else {
    //400 Bad Request
    http_response_code(400);
    exit(json_encode("Missing parameter"));
}