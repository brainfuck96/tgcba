<?php
include_once 'Database.php';
include_once 'Queries.php';

$valid_formats = array("jpg", "png", "gif");
$max_file_size = 1024*100*5; //500 kb
$path = "../img/"; // Upload directory
$count = 0;

if ( !isset($_POST['category']) ||
    !isset($_POST['question']) ||
    !isset($_POST['answer'])) {
    http_response_code(503);
}
else {
    $files = '';

    foreach ($_FILES['files']['name'] as $f => $name) {
        if ($_FILES['files']['error'][$f] == 0) {
            if ($_FILES['files']['size'][$f] > $max_file_size) {
                http_response_code(500);
                exit;
            }
            elseif( !in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                http_response_code(500);
                exit;
            }
        }
    }
    foreach ($_FILES['files']['name'] as $f => $name) {
        if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)) {
            $count++; // Number of successfully uploaded file
            $files .= $path . $name . ';';
        }
    }

    if (Queries::InsertQuestion(
        $_POST['category'], $_POST['question'], $_POST['answer'], $files)) {
        if(isset($_POST['idDelete'])) {
            if (!Queries::DeleteNonAnswered($_POST['idDelete'])) {
                echo 'Но не удалился с блока неотвеченных! Пожалуйста, удалите вручную!';
            }
            http_response_code(200);

        } else {
            http_response_code(200);
        }
    }
    else {
        http_response_code(501);
    }
}