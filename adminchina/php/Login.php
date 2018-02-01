<?php
include_once "Database.php";
include_once "Queries.php";

if ( !isset($_POST['user']) ||
    !isset($_POST['pass'])) {
    header("Location: ../login.php");
    exit;
}

session_start();
/*if ( !isset($_SESSION['login']) || $_SESSION['login'] === false ){
    header("Location: ../index.php");
    http_response_code(200);
    exit;
}*/

$count = Queries::GetAdminUsers($_POST['user'], $_POST['pass']);
if ($count !== 1) {
    $_SESSION['login'] = false;
    header("Location: ../login.php");
    exit;
}
$_SESSION['user'] = $_POST['user'];
$_SESSION['pass'] = $_POST['pass'];
$_SESSION['login'] = true;
header("Location: ../index.php");
exit;