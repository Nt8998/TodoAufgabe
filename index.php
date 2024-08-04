<?php
include 'partials/header.php';
?>


<div class="container">
    <div class="card-body">
    <form action = 'check_login.php' method="post" class="border shadow p-4 rounded">
        <h1 class="text-center p-2">Login</h1>
        <?php if(isset($_GET['error'])):?>
        <div class="alert alert-danger" role="alert">Es ist ein Fehler aufgetreten</div>
        <?php endif;?>
        <div>
            <label for="username" class="form-label">Nutzername</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
    </div>
</div>

<?php include "partials/footer.php";