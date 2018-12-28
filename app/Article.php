<?php

namespace App;

use App\Traits\ArticleTraits\ArticleRelation;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use ArticleRelation;

    protected $fillable = ['title','status','author','price'];
}
