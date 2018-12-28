<?php
namespace App\Traits\CategoryTraits;
use App\Article;

/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/12/17
 * Time: 10:49 AM
 */

trait CategoryRelation
{

    /**
     * @return mixed
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class,"article_categories","category_id","article_id");
    }

}