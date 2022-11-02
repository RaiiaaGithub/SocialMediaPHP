<?php

function print_array($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function redirect($url, $status = 303) {
    header('Location: ' . $url, true, $status);
    die();
}

function get_post($post_var) {
    return htmlspecialchars($post_var);
}