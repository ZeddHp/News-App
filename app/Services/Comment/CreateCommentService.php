<?php declare(strict_types=1);

namespace app\Services\Comment;
use App\Models\Comment;
use App\Repositories\Comments\ICommentRepository;

class CreateCommentService
{
    private ICommentRepository $commentRepository;

    public function __construct(ICommentRepository $commentRepository)
    {
        $this -> commentRepository = $commentRepository;
    }

    public function execute(CreateCommentRequest $request): CreateCommentResponse
    {
        $comment = new Comment(
            $request -> getArticleId(),
            $request -> getTitle(),
            $request -> getContent(),
            $request -> getUserId()
        );

        return $this -> commentRepository -> create($comment);
    }
}