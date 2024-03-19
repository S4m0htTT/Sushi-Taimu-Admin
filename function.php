<?php

session_start();
if ($_SESSION['connecte'] != 1) {
    header('Location: index.php');
}
