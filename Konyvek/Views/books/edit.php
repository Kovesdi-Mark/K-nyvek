<?php?>
<h1>Edit Book</h1>
<form method="post">
    Title: <input type="text" name="title" value="<?php echo $this->book_model->title; ?>"><br>
    ISBN: <input type="text" name="isbn" value="<?php echo $this->book_model->isbn; ?>"><br>
    Price: <input type="number" name="price" value="<?php echo $this->book_model->price; ?>"><br>
    Description: <textarea name="description"><?php echo $this->book_model->description; ?></textarea><br>
    Author: <select name="author_id">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author['id']; ?>" <?php if ($author['id'] == $this->book_model->author_id)
                   echo 'selected'; ?>><?php echo $author['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Publisher: <select name="publisher_id">
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher['id']; ?>" <?php if ($publisher['id'] == $this->book_model->publisher_id)
                   echo 'selected'; ?>><?php echo $publisher['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Category: <select name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $this->book_model->category_id)
                   echo 'selected'; ?>><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Update</button>
</form>