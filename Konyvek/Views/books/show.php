<?php include '../Views/layout.php'; ?>

<h1>
    <?php echo $book['title']; ?>
</h1>
<p>ISBN:
    <?php echo $book['isbn']; ?>
</p>
<p>Price: $
    <?php echo $book['price']; ?>
</p>
<p>Description:
    <?php echo $book['description']; ?>
</p>
<h2>Author:
    <?php echo $book['author']; ?>
</h2>
<p>Bio:
    <?php echo $book['author_bio']; ?>
</p>
<a href="/books">Back</a>