<?php

namespace App\Models;

class Comment
{
    private int $articleId;
    private string $title;
    private string $content;
    private ?string $email;
    private int $userId;
    private ?User $user = null;
    private ?int $id = null;

    public function __construct(
        int    $articleId,
        string $title,
        string $content,
        int $userId,
        string $email = null
    )
    {
        $this->articleId = $articleId;
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->email = $email;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}