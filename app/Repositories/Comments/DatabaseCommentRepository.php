<?php

namespace App\Repositories\Comments;

use App\Models\Comment;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Exception;
use stdClass;

class DatabaseCommentRepository implements ICommentRepository
{

    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct(QueryBuilder $queryBuilder, Connection $connection)
    {
        $this -> queryBuilder = $queryBuilder;
        $this -> connection = $connection;
    }

    public function getByArticleId(int $articleId): array
    {
        try {
            $comments = $this->queryBuilder
                ->select('*')
                ->from('comments')
                ->where('article_id = :id')
                ->setParameter('id', $articleId)
                ->fetchAllAssociative();

            $commentCollection = [];

            foreach ($comments as $comment) {
                $commentCollection[] = $this->buildModel((object)$comment);
            }

            return $commentCollection;

        } catch (Exception $e) {
            return [];
        }
    }

    public function create(Comment $comment): Comment
    {
        $this->queryBuilder
            ->insert('comments')
            ->values([
                'article_id' => ':articleId',
                'title' => ':title',
                'content' => ':content',
                'user_id' => ':user_id'
            ])
            ->setParameter('articleId', $comment->getArticleId())
            ->setParameter('title', $comment->getTitle())
            ->setParameter('content', $comment->getContent())
            ->setParameter('user_id', $comment->getUserId())
            ->executeStatement();

        $comment->setId((int) $this->connection->lastInsertId());

        return $comment;
    }

    private function buildModel(stdClass $comment): Comment
    {
        return new Comment(
            (int) $comment->article_id,
            $comment->title,
            $comment->body,
            (int) $comment->user_id,
        );
    }


}