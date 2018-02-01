<?php
include_once 'Database.php';
include_once 'Queries.php';

if (isset($_POST['category'])) {

    if (Queries::AddCategory($_POST['category'])) {
        http_response_code(200);
        echo $_POST['category'];
        exit;
    }
    else {
        http_response_code(500);
        exit;
    }
}
http_response_code(500);