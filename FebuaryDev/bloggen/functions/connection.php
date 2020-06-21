<?php
session_start();
 function db_connect(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'blog';

    $db = new mysqli($servername,$username,$password,$db_name);

    if($db->connect_error){
       die($db->connect_error);
    }else{
       return $db;
    }
 }


?>