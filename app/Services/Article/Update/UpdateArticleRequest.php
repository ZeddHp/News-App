<?php declare(strict_types=1);

namespace App\Services\Article\Update;
class UpdateArticleRequest
{
    private string $title;
    private string $content;
    private int $id;

    public function __construct(string $title, string $content, int $id)
    {
        $this -> title = $title;
        $this -> content = $content;
        $this -> id = $id;
    }

    public function getTitle(): string
    {
        return $this -> title;
    }

    public function getContent(): string
    {
        return $this -> content;
    }

    public function getId(): int
    {
        return $this -> id;
    }
}