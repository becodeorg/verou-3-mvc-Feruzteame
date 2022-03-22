<?php

declare(strict_types=1);

class Article
{
    public string $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public function __construct(string $id, string $title, ?string $description, ?string $publishDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->publishDate = $publishDate;
        $this->description = $description;
    }

    public function formatPublishDate($format = 'DD-MM-YYYY')
    {
    // TODO: return the date in the required format
        $date = date_create($this->publishDate);
        echo date_format($date, 'd-m-Y');

    }
}