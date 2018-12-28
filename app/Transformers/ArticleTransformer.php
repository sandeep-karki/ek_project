<?php
namespace App\Transformers;

use App\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
//    protected $defaultIncludes = [
//        'categories'
//    ];


    /**
     * @param Article $article
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => (int) $article->id,
            'title' => $article->title,
            'author' => $article->author,
            'status' => $article->status,
            'createdAt' => (string) $article->created_at,

            'links'        => [
                [
                    'rel' => 'self',
                    'uri' => '/api/v2/articles/'.$article->id,
                ],
            ],
        ];
    }

    /**
     * @param Article $article
     * @return \League\Fractal\Resource\Collection
     */
//    public function includeCategories(Article $article)
//    {
//        $catgories = $article->categories;
//        $categoryTransformer = new CategoryTransformer();
//        return $this->collection($catgories, $categoryTransformer, 'categories');
//    }
}
