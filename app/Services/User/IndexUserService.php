<?php declare(strict_types=1);

namespace App\Services\User;

class IndexUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this -> userRepository = $userRepository;
    }

    public function execute(): array
    {
        return $this -> userRepository -> getAll();
    }

}