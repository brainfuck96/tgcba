<?php

class Queries
{
    public static function GetNonAnsweredQuestions(){
        $mysqli = Database::getConnection();
        $SQL = 'SELECT * FROM non_answered';
        $result = $mysqli->query($SQL);
        $return = $result->fetch_all();
        $mysqli->close();
        return $return;
    }

    public static function GetNonAnswerById($id)
    {
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
            prepare("SELECT question FROM non_answered WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($question);
        $stmt->fetch();
        $mysqli->close();
        return $question;
    }

    public static function GetCategories(){
        $mysqli = Database::getConnection();
        $SQL = 'SELECT * FROM category';
        $result = $mysqli->query($SQL);
        $return = $result->fetch_all();
        $mysqli->close();
        return $return;
    }

    public static function GetQuestions(){
        $mysqli = Database::getConnection();
        $SQL = 'SELECT id, question FROM faq';
        $result = $mysqli->query($SQL);
        $return =  $result->fetch_all();
        $mysqli->close();
        return $return;
    }

    public static function GetAdminUsers($user, $pass){
        $mysqli = Database::getConnection();
        $stmt = $mysqli->prepare('SELECT * FROM admin_user WHERE username = ? AND userpass = ?');
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        $mysqli->close();
        return $count;
    }

    public static function GetQuestion($id){
        $mysqli = Database::getConnection();
        $stmt = $mysqli->prepare('SELECT * FROM faq WHERE id = ?');
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_all();
        $mysqli->close();
        return $category;
    }

    public static function InsertQuestion($category, $question, $answer, $imgs){
        $mysqli = Database::getConnection();
        $stmt =  $mysqli->
            prepare('INSERT INTO faq (cat_id, question, answer, imgs) VALUES (?, ?, ?, ?)');
        $stmt->bind_param("isss", $category, $question, $answer, $imgs);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }

    public static function DeleteNonAnswered($id) {
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
            prepare('DELETE FROM non_answered WHERE id = ?');
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }

    public static function DeleteQuestion($id) {
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
        prepare('DELETE FROM faq WHERE id = ?');
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }

    public static function RemoveImg($path, $id){
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
            prepare("UPDATE faq SET imgs = REPLACE(imgs, ?, '') WHERE id = ?");
        $path .= ';';
        $stmt->bind_param("si", $path, $id);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }

    public static function EditQuestion($category, $question, $answer, $imgs, $id){
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
            prepare("UPDATE faq SET cat_id = ?, question = ?, answer = ?, imgs = CONCAT(COALESCE(imgs,''), ?) WHERE id = ?");
        $stmt->bind_param("isssi", $category, $question, $answer, $imgs, $id);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }

    public static function AddCategory($name) {
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
            prepare('INSERT INTO category (cat_name) VALUES (?)');
        $stmt->bind_param("s", $name);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }

    public static function DeleteCategory($id) {
        $mysqli = Database::getConnection();
        $stmt = $mysqli->
            prepare('DELETE FROM category WHERE id = ?');
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $mysqli->close();
        return $result;
    }
}