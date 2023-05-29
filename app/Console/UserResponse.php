<?php declare(strict_types=1);

namespace App\Console;

use App\Services\Article\Delete\ShowArticleService;
use App\Services\User\IndexUserService;

class UserResponse
{
    private IndexUserService $indexUserService;
    private ShowArticleService $showArticleService;

    public function __construct(IndexUserService $indexUserService, ShowArticleService $showArticleService)
    {
        $this -> indexUserService = $indexUserService;
        $this -> showArticleService = $showArticleService;
    }

    public function execute($id): void
    {
        if (!id ){
            $this -> index();
            exit;
        }
        $this -> show($id);
    }

    public function index(): void
    {
        $users = $this -> indexUserService -> execute();

        foreach ($users as $user) {
            echo $user -> getId() . ' ' . $user -> getName() . PHP_EOL;
        }
    }

    public function show($id): void
    {
        $user = $this -> showArticleService -> execute($id);

        echo $user -> getId() . ' ' . $user -> getName() . PHP_EOL;
    }

    public function printIndex($users): void
    {
        foreach ($users as $user) {
            echo '[ id ]' . $user -> getId() . PHP_EOL;
            echo '[ name ]' . $user -> getName() . PHP_EOL;
            echo '[ username ]' . $user -> getUsername() . PHP_EOL;
            echo '[ email ]' . $user -> getEmail() . PHP_EOL;
            echo '[ phone ] ' . $user->getPhone() . PHP_EOL;
            echo str_repeat('_', 50);
        }
    }

    private function printUserAndPosts(User $user, array $posts): void
    {
        echo '[ name ]' . $user -> getName() . PHP_EOL;
        echo '[ username ]' . $user -> getUsername() . PHP_EOL;
        echo '[ email ]' . $user -> getEmail() . PHP_EOL;
        echo '[ phone ] ' . $user->getPhone() . PHP_EOL;
        echo str_repeat('_', 50);
        echo '[ posts ]:' . PHP_EOL;
        foreach($posts as $post){
            echo '[ title ]: ' . $post -> getTitle() . PHP_EOL;
            echo '[ content ]: ' . $post -> getContent() . PHP_EOL;
            echo str_repeat( '-', 50 ) . PHP_EOL;
        }
    }

}