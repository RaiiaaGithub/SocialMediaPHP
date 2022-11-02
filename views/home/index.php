<?php
require_once '../../helper/utils.php';

ini_set("session.cookie_httponly", "True");
ini_set("session.cookie_secure", "True");
session_start(); 
session_regenerate_id();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    redirect('../auth/login.php');
}
?>

<?php
    require_once '../layout/_header.php';
?>

<main>
    <nav class="navbar">
        <div class="nav-logo">
            <img src="" alt="">
        </div>
        <div class="nav-wrapper">
            <div class="nav-links">
                <div class="nav-link">
                    <a href="create.php"><i>Add</i></a>
                </div>
                <div class="nav-link">
                    <a href=""><i>Notifications</i></a>
                </div>
                <div class="nav-account">
                    <img src="" alt="User">
                </div>
            </div>
        </div>
    </nav>
</main>

<?php
    require_once '../layout/_footer.php';
?>

