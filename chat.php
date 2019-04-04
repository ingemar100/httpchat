<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 03/04/2019
 * Time: 12:37
 */

//query
$db = new PDO('sqlite:db/chatdb.db');
$statement = $db->query("SELECT * FROM chat ORDER BY time");
$statement->execute();

//prepare json
//print_r($statement->fetchAll());

echo json_encode($statement->fetchAll());
//return json
