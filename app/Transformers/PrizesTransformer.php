<?php
/**
 * Created by PhpStorm.
 * User: samina-mac-mini
 * Date: 2/22/18
 * Time: 2:15 PM
 */

namespace App\Transformers;


use App\Model\Api\V1\GameResult;
use App\Model\Api\V1\Prizes;
use League\Fractal\TransformerAbstract;

class PrizesTransformer extends TransformerAbstract
{
    private $params = [];

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    public function transform(Prizes $prizes)
    {
        $messages = str_replace('{{code}}',$this->params,$prizes->message);
        return [
            'id' => $prizes->id,
            'displayName' => $prizes->display_name,
            'message' => $messages,

        ];
    }
}