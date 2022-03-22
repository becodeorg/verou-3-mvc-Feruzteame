<?php

require 'View/includes/header.php'
?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
        <ul>
            <li>
                <p><?= $article->title ?></p>
                <p><?= $article->formatPublishDate() ?></p>
                <p><a href="">Detail</a></p>

            </li>
        </ul>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>