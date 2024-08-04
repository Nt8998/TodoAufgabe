<?php
session_start();
include 'partials/header.php';
require 'todo.php';

if(!isset($_GET['id'])){
    include 'partials/exception.php';
    exit;
}
$todoId = $_GET['id'];
deleteTodo($todoId);

header("Location: home.php");


?>
