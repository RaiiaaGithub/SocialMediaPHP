<?php

ini_set("session.cookie_httponly", "True");
ini_set("session.cookie_secure", "True");
session_start(); 
session_regenerate_id();

include_once '../../_database/ApplicationContext.php';
include_once '../../helper/utils.php';

$username = get_post($_POST['username']);
$email = get_post($_POST['email']);
$password = get_post($_POST['password']);
$confirmPassword = get_post($_POST['confirmPassword']);


// Se houver campos vazios
if(empty($username) || empty($password) || empty($email) || empty($confirmPassword)) {
    $_SESSION['auth_message'] = 'Obrigatório preencher todos os campos';
    redirect('../../views/auth/register.php');
}

// Se as password não coicidirem
if($password != $confirmPassword) {
    $_SESSION['auth_message'] = 'As passwords não são iguais';
    redirect('../../views/auth/register.php');
}


// Verifica se já existe utilizador na base de dados
try {
    $select = $dbContext->prepare("SELECT * FROM users WHERE name = ? OR email = ?");
    $select->execute([$username, $email]);
    $res = $select->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $error) {
    print "Error: ".$error->getMessage();
    redirect('../../views/auth/register.php');
}


if(count($res) > 0) {
    $_SESSION['auth_message'] = 'Utilizador já existe';
    redirect('../../views/auth/register.php');
}


// Enviar para a DB
try {
    $stmt = $dbContext->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
    $stmt->execute([$username, $email, sha1($password)]);
} catch(PDOException $error) {
    print "Error: ".$error->getMessage();
    redirect('../../views/auth/register.php');
}

if($stmt->rowCount() > 0) {
    unset($_SESSION['auth_message']); //Sucesso
}


redirect('../../index.php');
