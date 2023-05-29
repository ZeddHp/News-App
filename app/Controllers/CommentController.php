<?php declare(strict_types=1);

namespace App\Controllers;

use App\Core\Session;
use app\Services\Comment\CreateCommentRequest;
use app\Services\Comment\CreateCommentService;


class CommentController
{
    private CreateCommentService $createCommentService;

    public function __construct(CreateCommentService $createCommentService)
    {
        $this -> createCommentService = $createCommentService;
    }

    public function create(array $vars)
    {
        $user = Session::get('user');
        $comment = $this->createCommentService->execute(
            new CreateCommentRequest(
                (int)$vars['id'],
                $_POST['title'],
                $_POST['body'],
                $user->getId(),
            ));

        header('Location: /articles/' . $comment->getArticleId());
    }

}