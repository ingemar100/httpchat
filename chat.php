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
//return json
echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
