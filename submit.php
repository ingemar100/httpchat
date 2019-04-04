<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 03/04/2019
 * Time: 12:36
 */

//get data
$user = $_REQUEST['user'];
$message = $_REQUEST['message'];
$time = time();

//verify data


//insert data
$db = new PDO('sqlite:db/chatdb.db');
$qry = $db->prepare(
    'INSERT INTO chat (user, message, time) VALUES (?, ?, ?)');
echo $qry->execute(array($user, $message, $time));

//to do: establish http connection to ensure 1 user per username
?>