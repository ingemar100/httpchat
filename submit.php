<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 03/04/2019
 * Time: 12:36
 */

//get data
$user = strip_tags($_REQUEST['user']);
$message = strip_tags($_REQUEST['message']);
$time = time();

//verify data
if (!empty($user) && !empty($message) && strlen($user) < 20) {

    //insert data
    $db = new PDO('sqlite:db/chatdb.db');
    $qry = $db->prepare('INSERT INTO chat (user, message, time) VALUES (?, ?, ?)');

    //insert into db and return success
    echo $qry->execute(array($user, $message, $time));

    //to do: establish http connection to ensure 1 user per username

}
else {
    echo 0;
}

?>