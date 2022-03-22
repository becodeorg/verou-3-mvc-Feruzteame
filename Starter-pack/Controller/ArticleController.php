<?php

declare(strict_types = 1);

class ArticleController
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();
        // Load the view
        require 'View/articles/index.php';

    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        $find = "SELECT * FROM article";
        // TODO: prepare the database connection
        $sendQuery = $this->databaseManager->connection->prepare($find);
        $sendQuery->execute();
        //TODO: fetch all articles as $rawArticles (as a simple array)
        $result =  $sendQuery->fetchAll(PDO::FETCH_ASSOC);
        $rawArticles = $result;
         $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['id'],$rawArticle['title'], $rawArticle['description'],
                          $rawArticle['publish_date']);
        }

        return $articles;

    }

    public function show()
    {
        $find = "SELECT * FROM article WHERE id={$_GET["id"]}";
        // TODO: prepare the database connection
        $sendQuery = $this->databaseManager->connection->prepare($find);
        $sendQuery->execute();
        //TODO: fetch all articles as $rawArticles (as a simple array)
        $result =  $sendQuery->fetch();
        $article = new Article($result['id'],$result['title'], $result['description'],
                      $result['publish_date']);

        require 'View/articles/show.php';
    }

    public function next()
    {
        $current_id = $_GET["id"];
        $query = "SELECT * FROM article WHERE id >  $current_id ORDER BY Id ASC LIMIT 1";
        $this->queryAndInitializeModel($query);
    }

    public function prev()
    {
        $current_id = $_GET["id"];
        $query = "SELECT * FROM article WHERE id <  $current_id ORDER BY Id DESC LIMIT 1";
        $this->queryAndInitializeModel($query);
    }

    private function queryAndInitializeModel(string $query): void
    {
        $sendQuery = $this->databaseManager->connection->prepare($query);
        $sendQuery->execute();
        $result = $sendQuery->fetch();
        if (!is_bool($result)) {
            $article = new Article($result['id'], $result['title'], $result['description'],
                $result['publish_date']);
            require 'View/articles/show.php';
        } else {
            $query = "SELECT * FROM article WHERE id={$_GET["id"]}";
            $this->queryAndInitializeModel($query);
        }
    }
}