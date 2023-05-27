<?php declare(strict_types=1);

namespace App\Services\Article\Delete;
class ShowArticleRequest
{
    private int $articleId;

    public function __construct(int $articleId)
    {
        $this -> articleId = $articleId;
    }

    public function getArticleId(): int
    {
        return $this -> articleId;
    }


}