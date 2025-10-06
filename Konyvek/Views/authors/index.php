<?php include '../layout.php'; ?>
<h1>Authors</h1>
<a href="/authors/create">Add Author</a>
<table>
    <tr>
        <th>Name</th>
        <th>Bio</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($authors as $author): ?>
        <tr>
            <td>
                <?php echo $author['name']; ?>
            </td>
            <td>
                <?php echo $author['bio']; ?>
            </td>
            <td>
                <a href="/authors/show/<?php echo $author['id']; ?>">View</a>
                <a href="/authors/edit/<?php echo $author['id']; ?>">Edit</a>
                <a href="/authors/delete/<?php echo $author['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>