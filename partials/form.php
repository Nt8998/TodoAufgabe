<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                Create Todo
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="todo" value="<?php echo $todo['todo']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" value="<?php echo htmlspecialchars($todo['date']); ?>" class="form-control" required>

                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="nicht erledigt" <?php echo ($todo['status'] == 'nicht erledigt') ? 'selected' : ''; ?>>Nicht erledigt</option>
                        <option value="erledigt" <?php echo ($todo['status'] == 'erledigt') ? 'selected' : ''; ?>>Erledigt</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kategorie</label>
                    <input name="kategorie" value="<?php echo $todo['kategorie']?>" class="form-control">
                </div>


                <button class="btn btn-success">Submit</button>
            </form>

        </div>
    </div>
</div>