<?php declare(strict_types=1);

namespace app\Services\Comment;

class CreateCommentRequest
{
    private int $articleId;
    private string $title;
    private string $content;
    private int $userId;

    public function __construct(int $articleId, string $title, string $content, int $userId)
    {
        $this -> articleId = $articleId;
        $this -> title = $title;
        $this -> content = $content;
        $this -> userId = $userId;
    }

    public function getArticleId(): int
    {
        return $this -> articleId;
    }

    public function getTitle(): string
    {
        return $this -> title;
    }

    public function getContent(): string
    {
        return $this -> content;
    }

    public function getUserId(): int
    {
        return $this -> userId;
    }



}