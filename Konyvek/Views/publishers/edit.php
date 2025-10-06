<?php include '../layout.php'; ?>
<h1>Edit Publisher</h1>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $this->publisher_model->name; ?>"><br>
    <button type="submit">Update</button>
</form>