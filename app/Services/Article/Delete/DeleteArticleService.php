<?php declare(strict_types=1);

namespace App\Services\Article\Delete;

use App\Repositories\Article\ArticleRepository;
class DeleteArticleService
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this -> articleRepository = $articleRepository;
    }

    public function execute(int $id): void
    {
        $this -> articleRepository -> delete($id);
    }
}