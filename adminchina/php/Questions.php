<?php
include_once 'Database.php';
include_once 'Queries.php';

$question = Queries::GetQuestions();
echo json_encode($question);

