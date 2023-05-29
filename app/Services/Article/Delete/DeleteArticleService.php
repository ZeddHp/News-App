<?php declare(strict_types=1);

namespace App\Services\Article\Delete;

use App\Repositories\Article\IArticleRepository;
class DeleteArticleService
{
    private IArticleRepository $articleRepository;

    public function __construct(IArticleRepository $articleRepository)
    {
        $this -> articleRepository = $articleRepository;
    }

    public function execute(int $id): void
    {
        $this -> articleRepository -> delete($id);
    }
}