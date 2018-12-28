<?php
return [
    'sign_up' => [
        'validation_rules' => [
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|regex:/([a-zA-Z0-9]*[a-zA-Z][a-zA-Z0-9]*)/|alpha_num|min:6|max:32',
        ]
    ],
    'login' => [
        'validation_rules' => [
            'name' => 'required',
            'profile_picture'=>'required',
            'social_id'=>'required',
            'type'=>'required',
        ]
    ],
];