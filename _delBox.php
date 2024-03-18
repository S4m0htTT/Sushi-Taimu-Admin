<?php
require_once 'callAPI.php';
$del_data = callAPI('DELETE', 'http://localhost:3000/box/'.$_GET['id'], false);
header('Location: index.php');