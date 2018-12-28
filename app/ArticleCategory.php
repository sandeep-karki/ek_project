<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = "article_categories";

    public $timestamps = false;

    protected $primaryKey = null;

    public $incrementing = false;
}
