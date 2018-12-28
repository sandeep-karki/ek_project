<?php
/**
 * Created by PhpStorm.
 * User: samina-mac-mini
 * Date: 2/2/18
 * Time: 1:03 PM
 */

namespace App\Transformers;


use League\Fractal\TransformerAbstract;

class StaticTransformer extends TransformerAbstract
{
    public function transform($data)
    {
        return $data;
    }

}