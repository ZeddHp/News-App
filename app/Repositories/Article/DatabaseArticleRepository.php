<?php declare(strict_types=1);

namespace App\Repositories\Article;

use App\Core\Database;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

class DatabaseArticleRepository implements IArticleRepository
{
    private QueryBuilder $queryBuilder;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
        $this->queryBuilder = $this->connection->createQueryBuilder();
    }
}