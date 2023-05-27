<?php declare(strict_types=1);

namespace App\Services\Article\Update;

use App\Models\Article\ArticleRepository;
class UpdateArticleService
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this -> articleRepository = $articleRepository;
    }

    public function execute(UpdateArticleRequest $request): UpdateArticleResponse
    {
        $article = $this -> articleRepository -> update($request -> getId());

        $article -> update([
            'title' => $request -> getTitle(),
            'content' => $request -> getContent()
        ]);

        $this -> articleRepository -> update($article);

        return new UpdateArticleResponse($article);
    }

}