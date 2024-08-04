<?php
session_start();
include 'partials/header.php';
require 'todo.php';
require 'helper.php';


$todo = [
    'id' => '',
    'user' => '',
    'todo' => '',
    'status' => '',
    'date' => '',
    'kategorie' => '',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $status = $_POST['status'];
    if (!validateDate($date)) {
        echo "Das Datum muss eine Zahl sein.";
        exit;
    }
    if (!in_array($status, ['erledigt', 'nicht erledigt'])) {
        echo "Der Status ist ungültig.";
        exit;
    }
    $todo = createTodo($_POST);
    header("Location: home.php");
}

?>

<?php include 'partials/form.php'; ?>