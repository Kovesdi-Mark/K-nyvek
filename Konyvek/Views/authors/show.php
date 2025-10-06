<?php include '../Views/layout.php'; ?>

<h1>
    <?php echo $this->author_model->name; ?>
</h1>
<p>Bio:
    <?php echo $this->author_model->bio; ?>
</p>
<a href="/authors">Back</a>