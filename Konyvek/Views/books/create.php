<?php include '../Views/layout.php'; ?>
<h1>Add Book</h1>
<form method="post">
    Title: <input type="text" name="title"><br>
    ISBN: <input type="text" name="isbn"><br>
    Price: <input type="number" name="price"><br>
    Description: <textarea name="description"></textarea><br>
    Author: <select name="author_id" required>
        <option value=""><?php echo "---válassz---"; ?></option>
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Publisher: <select name="publisher_id">
        <option value=""><?php echo "---válassz---"; ?></option>

        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher['id']; ?>"><?php echo $publisher['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Category: <select name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Save</button>
</form>