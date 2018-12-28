<?php
namespace App\Traits\ArticleTraits;
use App\Category;

/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 10:51 AM
 */

trait ArticleRelation
{

    /**
     * @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,"article_categories","article_id","category_id");
    }

}