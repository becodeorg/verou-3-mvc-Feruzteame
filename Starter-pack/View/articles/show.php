<?php

require 'View/includes/header.php' ?>

   // Use any data loaded in the controller here

<section>

    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <?php // TODO: links to next and previous ?>
    <a href="index.php?page=article-prev&id=<?= $article->id ?>">Previous article</a>
    <a href="index.php?page=article-next&id=<?= $article->id ?>">Next article</a>
</section>

<?php require 'View/includes/footer.php'?>