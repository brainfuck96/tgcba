<?php

include_once 'Database.php';
include_once 'Queries.php';

if(isset($_POST['path']) && isset($_POST['id'])) {
    if (file_exists($_POST['path'])) {
        if (Queries::RemoveImg($_POST['path'], $_POST['id'])) {
            unlink($_POST['path']);
            http_response_code(200);
            exit;
        }
        else {
            http_response_code(500);
            exit;
        }

    } else {
        http_response_code(500);
        exit;
    }
}
http_response_code(500);