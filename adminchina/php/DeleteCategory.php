<?php
include_once 'Database.php';
include_once 'Queries.php';

if ( isset($_POST['id'])) {
    if ( Queries::DeleteCategory($_POST['id'])) {
        http_response_code(200);
        exit;
    }
}
http_response_code(500);
