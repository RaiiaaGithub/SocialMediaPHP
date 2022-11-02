<?php

if(isset($_SESSION['auth_message'])) {
    $message = $_SESSION['auth_message'];
    echo $message;
}


?>