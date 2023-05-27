<?php declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;

class ArticleController{

    private IndexArticleService $indexArticleService;
    private ShowArticleService $showArticleService;
    private CreateArticleService $createArticleService;
    private UpdateArticleService $updateArticleService;
    private DeleteArticleService $deleteArticleService;

    public function __construct(
        IndexArticleService $indexArticleService,
        ShowArticleService $showArticleService,
        CreateArticleService $createArticleService,
        UpdateArticleService $updateArticleService,
        DeleteArticleService $deleteArticleService
    )
    {
        $this -> indexArticleService = $indexArticleService;
        $this -> showArticleService = $showArticleService;
        $this -> createArticleService = $createArticleService;
        $this -> updateArticleService = $updateArticleService;
        $this -> deleteArticleService = $deleteArticleService;
    }





}
