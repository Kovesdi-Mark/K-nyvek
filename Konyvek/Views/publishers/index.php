<?php include '../Views/layout.php'; ?>
<h1>Publishers</h1>
<a href="/publishers/create">Add Publisher</a>
<table>
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($publishers as $publisher): ?>
        <tr>
            <td>
                <?php echo $publisher['name']; ?>
            </td>
            <td>
                <a href="/publishers/edit/<?php echo $publisher['id']; ?>">Edit</a>
                <a href="/publishers/delete/<?php echo $publisher['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>