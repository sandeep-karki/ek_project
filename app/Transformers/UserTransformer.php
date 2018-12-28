<?php
namespace App\Transformers;

use App\Model\Api\V1\ApiUser;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    public function transform(ApiUser $users)
    {
        return [
            'id' => $users->id,
            'email' => $users->email,
            'name' => $users->name,
            'gender' => $users->gender,
            'verified' => $users->verified,
            'socialId' => $users->social_id,
            'accessToken' => $users->token,
            'type' => $users->type,
        ];
    }
    
}
