<?php declare(strict_types=1);

namespace App\Repositories\Article;

use App\Models\Article;
use Carbon\Carbon;
use Doctrine\Common\Cache\Cache;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Cache;

use stdClass;
class JsonPlaceholderArticleRepository implements IArticleRepository
{
    private Client $client;

    public function __construct()
    {
        $this -> client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
        ]);
    }

    public function all(): array
    {
        try {
            $content = $this -> checkCache('articles', '/posts');
            return $this -> buildCollection($content);
        } catch (GuzzleException $e) {
            return [];
        }
    }

    public function getByUserId(int $userId): array
    {
        try {
            $content = $this -> checkCache('articles_user_', '/posts?userId=', $userId);
            return $this -> buildCollection($content);
        } catch (GuzzleException $e) {
            return [];
        }
    }

    public function getById(int $id): ?Article
    {
        try {
            $content = $this -> checkCache('article_' . $id, '/posts/', $id);
            return $this -> buildModel($content);
        } catch (GuzzleException $e) {
            return null;
        }
    }

    private function buildModel(stdClass $article): Article
    {
        return new Article(
            $article -> userId,
            $article -> title,
            $article -> body,
            'https://placehold.co/600x400/gray/white?text=Article+Title',
            $article -> id
        );
    }

    private function buildCollection(string $response): array
    {
        $collection = [];
        foreach (json_decode($response) as $article) {
            $collection[] = $this -> buildModel($article);
        }
        return $collection;
    }

    private function checkCache(string $key, string $url, ?int $id = null): string
    {
        $cache = Cache::has($key);
        if ($cache) {
            Cache::get($key);
        }
        $response = $this -> client -> get($url . $id);
        $content = $response -> getBody() -> getContents();
        Cache::save($key, $content);
        return $content;
    }
}
