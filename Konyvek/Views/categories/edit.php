<?php include '../layout.php'; ?>
<h1>Edit Category</h1>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $this->category_model->name; ?>"><br>
    <button type="submit">Update</button>
</form>