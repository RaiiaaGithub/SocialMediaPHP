<?php

ini_set("session.cookie_httponly", "True");
ini_set("session.cookie_secure", "True");
session_start(); 
session_regenerate_id();

include_once '../../_database/ApplicationContext.php';
include_once '../../helper/utils.php';

$username = get_post($_POST['username']);
$password = get_post($_POST['password']) ;

if(empty($username) || empty($password)) {
    $_SESSION('auth_message', 'Obrigatório preencher todos os campos', time() + 3600);
    redirect('../../index.php');
}

$stmt = $dbContext->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
$stmt->execute([$username, sha1($password)]);
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($res) == 1) {
    $_SESSION['logged'] = true;
    $_SESSION['userId'] = $res[0]['id'];
    unset($_SESSION['auth_message']);
    redirect('../../views/home/index.php');
}

$_SESSION['auth_message'] = 'Os dados não correspondem';
redirect('../../views/auth/login.php');




