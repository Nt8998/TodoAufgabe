<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    require 'todo.php';
    $username = $_SESSION['username'];
    $todos = getTodo();

    $userTodos = array_filter($todos, function($todo) use ($username) {
        return isset($todo['user']) && $todo['user'] == $username;
    });

    include "partials/header.php";
    ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>TODO LIST</h3>
            </div>
            <div class="card-body">
                <p>
                    <a class="btn btn-outline-success" href="create.php">Create new Todo</a>
                </p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Todo</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Kategorie</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($userTodos as $i => $todo): ?>
                        <tr>
                            <td><?php echo $todo['todo'] ?></td>
                            <td><?php echo $todo['date'] ?></td>
                            <td><?php echo $todo['status'] ?></td>
                            <?php if (isset($todo['kategorie'])): ?>
                                <td><?php echo $todo['kategorie'] ?></td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                            <td>
                                <a href="view.php?id=<?php echo $todo['id'] ?>"
                                   class="btn btn-sm btn-outline-info">View</a>
                                <a href="update.php?id=<?php echo $todo['id'] ?>"
                                   class="btn btn-sm btn-outline-secondary">Update</a>
                                <a href="deleteTodo.php?id=<?php echo $todo['id'] ?>"
                                   class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="checkout.php" class="btn btn-dark">Logout</a>
            </div>
        </div>
    </div>

    <?php include "partials/footer.php"; ?>

    <?php
} else {
    header("Location: index.php");
}
?>
