<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 04/04/2019
 * Time: 21:11
 */


//allow cross-domain-access
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//open db
$db = new PDO('sqlite:db/chatdb.db');