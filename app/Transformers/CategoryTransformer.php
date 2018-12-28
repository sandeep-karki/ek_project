<?php
namespace App\Transformers;

use App\Article;
use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{



    public function transform(Category $category)
    {
        return [
            'id' => (int) $category->id,
            'title' => $category->title,

//            'links'        => [
//                [
//                    'rel' => 'self',
//                    'uri' => '/categories/'.$category->id,
//                ],
//            ],
        ];
    }
}
