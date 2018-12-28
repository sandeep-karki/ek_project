<?php

namespace App;

use App\Traits\CategoryTraits\CategoryRelation;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryRelation;

}
