<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    session_destroy();

    session_unset();

    header('Location:index.php');
} else {
    echo 'Errrrooooorrrr';
}