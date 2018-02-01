<?php
include_once 'Database.php';
include_once 'Queries.php';

if ( !isset($_GET['id'])) {
    http_response_code(404);
    exit;
}

$category = Queries::GetQuestion($_GET['id']);
echo json_encode($category);