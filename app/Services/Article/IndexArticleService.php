<?php declare(strict_types=1);

namespace App\Services\Article;

class IndexArticleService
{
    private ArticleRepository $articleRepository;
    private UserRepository $userRepository;

    public function __construct(ArticleRepository $articleRepository, UserRepository $userRepository)
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




