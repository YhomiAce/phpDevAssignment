<?php
    header('Content-Type: application/json');
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "class/Book.php";
    $name = null;
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
    }
    // echo $name;
    $book = new Book();
    $books = $book->fetchBooks($name);
    $data = [
        "status_code"=> 200,
        "status" => "success",
        "data" => $books
    ];
    $result = json_encode($data);
    print_r($result);
?>