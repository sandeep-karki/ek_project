<?php
namespace App\Transformers;

use App\Model\Api\ApiUsers;
use App\Model\Api\ApiUsersProfile;
use League\Fractal\TransformerAbstract;

class ProfileTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'user'
        ];


    public function transform(ApiUsersProfile $profile)
    {
        return [
            'id' => $profile->id,
            'description' => $profile->description,
            'username' => $profile->username,
            'displayName' => $profile->display_name,
            'twitterId' => $profile->twitter_id,
            'facebookId' => $profile->facebook_id,
            'facebookUrl' => $profile->facebook_url,
            'twitterUrl' => $profile->twitter_url,
            'userId' => $profile->user_id,
            'city' => $profile->city,
            'country' => $profile->country,
            'address1' => $profile->address1,
            'address2' => $profile->address2,
            'phone' => $profile->phone,
            'profilePictureImage' => $profile->profile_picture_image,
            'coverPictureImage' => $profile->cover_picture_image,
            'createdAt' => $profile->created_at->toDateTimeString(),
            'updatedAt' => $profile->updated_at->toDateTimeString(),
            'email' => $profile->email,
        ];
    }

    public function includeUser(ApiUsersProfile $profile)
    {
        $user = ApiUsers::find($profile->user_id);
        $userTransformer = new UserTransformer();
        return $this->item($user, $userTransformer, 'user');
    }
}
