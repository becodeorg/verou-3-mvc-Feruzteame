<?php

require 'View/includes/header.php'
?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
        <ul>
            <li>
                <a href="index.php?page=articles-show&id=<?= $article->id ?>">
                  <p><?= $article->title ?></p>
                </a>
                <p><?= $article->formatPublishDate()?></p>
            </li>
        </ul>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>