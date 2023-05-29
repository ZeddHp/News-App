<?php declare(strict_types=1);

namespace App\Repositories\Comments;

interface ICommentRepository
{
    public function getByArticleId(int $articleId): array;
}
