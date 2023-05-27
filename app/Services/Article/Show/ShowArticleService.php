<?php declare(strict_types=1);

namespace App\Services\Article\Delete;

class ShowArticleService
{
    private ArticleRepository $articleRepository;
    private UserRepository $userRepository;
    private CommentRepository $commentRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        UserRepository $userRepository,
        CommentRepository $commentRepository
    ) {
        $this -> articleRepository = $articleRepository;
        $this -> userRepository = $userRepository;
        $this -> commentRepository = $commentRepository;
    }

    public function execute(ShowArticleRequest $request): ShowArticleResponse
    {
        $article = $this -> articleRepository -> getById($request -> getArticleId());

        if ($article == null){
            // TODO throw new ArticleNotFoundException();
        }

        $author = $this -> userRepository -> getById($article -> getAuthorId());
        $article -> setAuthor($author);
        $comments = $this -> commentRepository -> getByArticleId($request -> getArticleId());

        return new ShowArticleResponse($article, $comments);
    }

}