<?php include '../Views/layout.php'; ?>
<h1>Categories</h1>
<a href="/categories/create">Add Category</a>
<table>
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td>
                <?php echo $category['name']; ?>
            </td>
            <td>
                <a href="/categories/edit/<?php echo $category['id']; ?>">Edit</a>
                <a href="/categories/delete/<?php echo $category['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>