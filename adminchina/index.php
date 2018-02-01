<?php
include_once "./php/TemaplateHandler.php";
include_once './php/Database.php';
include_once './php/Queries.php';

session_start();
if ( !isset($_SESSION['login']) || $_SESSION['login'] === false)
    header("Location: login.php");

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'edit') {
        if(isset($_GET['id'])) {
            $page = new TemaplateHandler("./templates/edit.tpl");
        }
        else {
            $page = new TemaplateHandler("./templates/edit.tpl");
        }

    }
    else if ($_GET['page'] == 'nanswered') {
        $page = process_answers();
    }
    else if ($_GET['page'] == 'category') {
        $page = new TemaplateHandler("./templates/addCategory.tpl");
    }
    else if ($_GET['page'] == 'exit') {
        echo 'exit';
        exit;
    }
    else if ($_GET['page'] == 'add') {
        if ( isset($_GET['id'])) {
            $page = new TemaplateHandler("./templates/add.tpl");
            $page->SetParameter('add-question', Queries::GetNonAnswerById($_GET['id']));
            $page->SetParameter('add-delete-id', $_GET['id']);
        }
        else {
            $page = new TemaplateHandler("./templates/add.tpl");
            $page->SetParameter('add-question', '');
            $page->SetParameter('add-delete-id', '');
        }

    }
    else {
        echo '404. Page not found!';
        exit;
    }
}
else {
    $page = new TemaplateHandler("./templates/add.tpl");
    $page->SetParameter('add-question', '');
}
$content = $page->Output();
$main = new TemaplateHandler("./templates/main.tpl");
$main->SetParameter("main-content", $content);

echo $main->output();


function process_answers()
{
    $page = new TemaplateHandler("./templates/answers.tpl");
    $answerAll = '';
    $result =  Queries::GetNonAnsweredQuestions();
    foreach ($result as $row) {
        $answer = new TemaplateHandler("./templates/answerItem.tpl");
        $answer->SetParameter("answer-id", $row[0]);
        $answer->SetParameter("answer-text", $row[1]);
        $answerAll .= $answer->Output();
    }
    $page->SetParameter('answers-all', $answerAll);
    return $page;
}
