<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 03/04/2019
 * Time: 12:37
 */

require_once("api.php");
require_once("rate_limiting.php");

if(!empty($_REQUEST['user'])) {
    $user = strip_tags($_REQUEST['user']);

    //query
    $statement = $db->prepare("SELECT sender, message, time FROM chat WHERE receiver = ? ORDER BY time");
    $statement->execute(array($user));

    //prepare json
    //return json
    echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
}
else {
    //400 bad request
    http_response_code(400);
    exit(json_encode("User parameter missing"));
}