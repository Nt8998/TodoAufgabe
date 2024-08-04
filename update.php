<?php
session_start();
include 'partials/header.php';
require 'todo.php';
require 'helper.php';

if (!isset($_GET['id'])) {
    include 'partials/exception.php';
    exit;
}
$todoId = $_GET['id'];

$todo = getTodoById($todoId);
if (!$todo) {
    include 'partials/exception.php';
    exit;
}

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
    updateTodo($_POST, $todoId);
    header("Location: home.php");
    exit;
}


?>

<?php include 'partials/form.php'; ?>


<?php include "partials/footer.php";
