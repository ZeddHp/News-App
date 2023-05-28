<?php declare(strict_types=1);

namespace App\Console;

use App\Models\Article;
use App\Services\Article\Delete\ShowArticleService;
use App\Services\Article\IndexArticleService;

class ArticleResponse
{
    private IndexArticleService $indexArticleService;
    private ShowArticleService $showArticleService;

    public function __construct(
        IndexArticleService $indexArticleService,
        ShowArticleService $showArticleService
    )
    {
        $this -> indexArticleService = $indexArticleService;
        $this -> showArticleService = $showArticleService;
    }

    public function execute($id): void
    {
        if(!$id){
            $this -> index();
            exit;
        }
        $this -> show($id);
    }

    private function index(): void
    {
        $service = $this -> indexArticleService;
        $articles = $service -> execute();
        $this -> printArticles($articles);
    }

    private function printIndex(array $articles): void
    {
        foreach($articles as $article){
            echo '[ id ]: ' . $article -> getId() . PHP_EOL;
            echo '[ title ]: ' . $article -> getTitle() . PHP_EOL;
            echo $article -> getContent() . PHP_EOL;
            echo '[ author ]: ' . $article -> getAuthor() -> getName() . PHP_EOL;
            echo str_repeat( '-', 50 ) . PHP_EOL;
        }
    }

    private function printArticleAndComments(Article $article, array $comments): void
    {
        echo '[ title ]: ' . $article -> getTitle() . PHP_EOL;
        echo '[ content ]: ' . $article -> getContent() . PHP_EOL;
        echo '[ author ]: ' . $article -> getAuthor() -> getName() . PHP_EOL;
        echo str_repeat( '-', 50 ) . PHP_EOL;
        echo '[ comments ]:' . PHP_EOL;
        foreach($comments as $comment){
            echo '[ name ]: ' . $comment -> getName() . PHP_EOL;
            echo '[ content ]: ' . $comment -> getBody() . PHP_EOL;
            echo '[ author ]: ' . $comment -> getEmail() . PHP_EOL;
            echo str_repeat( '-', 50 ) . PHP_EOL;
        }
    }
}