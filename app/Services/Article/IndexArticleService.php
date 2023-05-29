<?php declare(strict_types=1);

namespace App\Services\Article;

use App\Repositories\Article\IArticleRepository;

class IndexArticleService
{
    private IArticleRepository $articleRepository;
    private IUserRepository $userRepository;

    public function __construct(IArticleRepository $articleRepository, IUserRepository $userRepository)
    {
        $this -> articleRepository = $articleRepository;
        $this -> userRepository = $userRepository;
    }

    public function execute(): array
    {
        $articles = $this -> articleRepository -> getAll();

        foreach ($articles as $article) {
            $author = $this -> userRepository -> getById($article -> getAuthorId());
            $article -> setAuthor($author);
        }
        return $articles;
    }
}




