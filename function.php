<?php

session_start();
if ($_SESSION['connecte'] != true) {
    header('Location: index.php');
}
