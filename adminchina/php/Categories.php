<?php
include_once 'Database.php';
include_once 'Queries.php';

$categories = Queries::GetCategories();
echo json_encode($categories);