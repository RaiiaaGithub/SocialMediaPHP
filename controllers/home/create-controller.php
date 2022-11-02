<?php

require_once '../../helper/utils.php';

ini_set("session.cookie_httponly", "True");
ini_set("session.cookie_secure", "True");
session_start(); 
session_regenerate_id();

$user_id     = $_SESSION['userId'];
$image       = $_FILES;
$title       = get_post($_POST['title']);
$description = get_post($_POST['description']);

print_array(array($user_id, print_array($image), $title, $description))
?>