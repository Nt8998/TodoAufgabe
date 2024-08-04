<?php
session_start();
include 'partials/header.php';
require 'todo.php';

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


?>

    <div class="container">
    <div class="card">
    <div class="card-header">
        <h3>View Todo: <b>
                <?php echo $todo['todo'] ?>
            </b>
        </h3>
    </div>
    <div class="card-body">
        <a class="btn btn-secondary" href="update.php?id=<?php echo $todo['id'] ?>">update</a>
        <a class="btn btn-danger" href="delete.php?id=<?php echo $todo['id'] ?>">delete</a>
    </div>
    <table class="table">
    <tbody>
    <tr>
        <th>
            Name:
        </th>
        <td>
            <?php echo $todo['todo'] ?>
        </td>
    </tr>
    <tr>
        <th>
            Status
        </th>
        <td>
            <?php echo $todo['status'] ?>
        </td>
    </tr>
    <tr>
        <th>
            Date
        </th>
        <td>
            <?php echo $todo['date'] ?>
        </td>
    </tr>
<?php if (isset($todo['kategorie'])): ?>
<tr>
    <th>
        Kategorie
    </th>
    <td>
    <td><?php echo $todo['kategorie'] ?></td>
    </td>
    <?php else: ?>
        <td></td>
    <?php endif; ?>
    </tr>
    </tbody>
    </table>
    </div>
    </div>


    <?php include "partials/footer.php";