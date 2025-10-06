<?php?>
<h1>Books</h1>
<a href="/books/create">Add Book</a>

<form method="get">
    Filter by Author: <select name="author">
        <option value="">All</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author['id']; ?>"><?php echo $author['name']; ?></option>
        <?php endforeach; ?>
    </select>
    Filter by Publisher: <select name="publisher">
        <option value="">All</option>
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher['id']; ?>"><?php echo $publisher['name']; ?></option>
        <?php endforeach; ?>
    </select>
    Filter by Category: <select name="category">
        <option value="">All</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filter</button>
</form>

<table>
    <tr>
        <th>Title</th>
        <th>ISBN</th>
        <th>Price</th>
        <th>Description</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td>
                <?php echo $book['title']; ?>
            </td>
            <td>
                <?php echo $book['isbn']; ?>
            </td>
            <td>
                <?php echo $book['price']; ?>
            </td>
            <td>
                <?php echo $book['description']; ?>
            </td>
            <td>
                <?php echo $book['author']; ?>
            </td>
            <td>
                <?php echo $book['publisher']; ?>
            </td>
            <td>
                <?php echo $book['category']; ?>
            </td>
            <td>
                <a href="/books/show/<?php echo $book['id']; ?>">View</a>
                <a href="/books/edit/<?php echo $book['id']; ?>">Edit</a>
                <a href="/books/delete/<?php echo $book['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>