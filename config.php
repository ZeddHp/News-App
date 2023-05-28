<?php

use App\Repositories\Article\DatabaseArticleRepository;
use App\Repositories\Article\IArticleRepository;

return [
    'classes' => [
        IArticleRepository::class => DI\create(DatabaseArticleRepository::class),
        //IUserRepository::class => DI\create(JsonPlaceholderUserRepository::class),
        //ICommentRepository::class => DI\create(JsonPlaceholderCommentRepository::class),
    ]
];