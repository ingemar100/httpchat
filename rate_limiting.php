<?php
/**
 * Created by PhpStorm.
 * User: Ingemar
 * Date: 04/04/2019
 * Time: 21:06
 */


//rate limiting
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$query = $db->query("SELECT * FROM requests WHERE ip = '$ip'");
$res = $query->fetchAll();

if (sizeof($res) > 0){
    if ($time - $res[0]["last_time"] < 1){
        //deny
        http_response_code(429);
        exit(json_encode("You cannot make more than 1 request per second"));
    }
    else {
        //update lass access
        $qry = $db->prepare('UPDATE requests SET last_time = ? WHERE ip = ?');
        $qry->execute(array($time, $ip));
    }
}
else {
    //insert last access
    $qry = $db->prepare('INSERT INTO requests (ip, last_time) VALUES (?, ?)');
    $qry->execute(array($ip, $time));
}
