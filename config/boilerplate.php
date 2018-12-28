<?php
return [
    'sign_up' => [
        'validation_rules' => [
            'name' => 'required',
            'email' => ['required','unique:api_users'],
            'password' => 'required|min:6'
            ]
    ],
    'login' => [
        'validation_rules' => [
            'username' => 'required|email',
            'password' => 'required',
            'grant_type' => 'required',
            'client_id' => 'required',
            'client_secret' =>'required',
        ]
    ],
    'refresh_token' => [
        'validation_rules' => [
            'grant_type' => 'required',
            'client_id' => 'required',
            'client_secret' =>'required',
            'refresh_token' => 'required',
        ]
    ],
    'forgot_password' => [
        'validation_rules' => [
            'email' => 'required|email'
        ]
    ],
    'check_activate_token' => [
        'validation_rules' => [
            'token' => 'required'
        ]
    ],
    'activate_code' => [
        'validation_rules' => [
            'new-password' => 'required',
            'code' => 'required|invalid'
        ]
    ],
    'devices' => [
        'validation_rules' => [
            'device-id' => 'required',
            'device-token' => 'required'
        ]
    ],
    'change_password' => [
        'validation_rules' => [
            'old-password' => 'required',
            'new-password' => 'required',
            'confirm-password' => 'required|same:new-password'
        ]
    ],
    'reset_password' => [
        'release_token' => env('PASSWORD_RESET_RELEASE_TOKEN', false),
        'validation_rules' => [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]
    ]
];