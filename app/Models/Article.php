<?php declare(strict_types=1);

namespace App\Models;
use Carbon\Carbon;

class Article
{
    private int $authorId;
    private string $title;
    private string $content;
    private ?string $imageUrl;
    private ?User $author = null;

    // date opened mby
    private string $createdAt;
    private ?int $id;

    public function __construct(
        int $authorId,
        string $title,
        string $content,
        ?string $imageUrl,
        ?int $id = null
    )
    {
        $this -> authorId = $authorId;
        $this -> title = $title;
        $this -> content = $content;
        $this -> imageUrl = $imageUrl;
        $this -> createdAt = Carbon::now() -> toDateTimeString();
        $this -> id = $id;
    }

    //getters
    public function getAuthor(): ?User
    {
        return $this -> author;
    }

    public function getAuthorId(): int
    {
        return $this -> authorId;
    }

    public function getId(): ?int
    {
        return $this -> id;
    }

    public function getTitle(): string
    {
        return $this -> title;
    }

    public function getContent(): string
    {
        return $this -> content;
    }

    public function getImageUrl(): ?string
    {
        return $this -> imageUrl;
    }

    public function getCreatedAt(): string
    {
        return $this -> createdAt;
    }

    //setters
    public function setAuthor(User $author): void
    {
        $this -> author = $author;
    }

    public function setId(int $id): void
    {
        $this -> id = $id;
    }

    public function update(array $attributes): void
    {
        foreach ($attributes as $key => $value) {
            $this -> {$key} = $value;
        }
    }


}