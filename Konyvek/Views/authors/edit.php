<?php include '../layout.php'; ?>
<h1>Edit Author</h1>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $this->author_model->name; ?>"><br>
    Bio: <textarea name="bio"><?php echo $this->author_model->bio; ?></textarea><br>
    <button type="submit">Update</button>
</form>