<?php declare(strict_types=1);

namespace App\Services\Article\Update;

use App\Models\Article;
use App\Repositories\Article\IArticleRepository;

class UpdateArticleService
{
    private IArticleRepository $articleRepository;

    public function __construct(IArticleRepository $articleRepository)
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