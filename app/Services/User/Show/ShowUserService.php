<?php declare(strict_types=1);

namespace App\Services\User\Show;

use App\Repositories\Article\IArticleRepository;

class ShowUserService
{
    private IUserRepository $userRepository;
    private IArticleRepository $articleRepository;

    public function __construct(IUserRepository $userRepository, IArticleRepository $articleRepository)
    {
        $this -> userRepository = $userRepository;
        $this -> articleRepository = $articleRepository;
    }

    public function execute(ShowUserRequest $request): ShowUserResponse
    {
        $user = $this -> userRepository -> getById($request -> getUserId());

        if ($user === null) {
            // TODO: throw exception
        }

        $articles = $this -> articleRepository -> getByUserId($request -> getUserId());

        foreach ($articles as $article) {
            $author = $this -> userRepository -> getById($article -> getAuthorId());
            $article -> setAuthor($user);
        }

        return new ShowUserResponse($user, $articles);
    }
}