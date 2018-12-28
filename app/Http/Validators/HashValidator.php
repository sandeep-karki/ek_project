<?php namespace App\Http\Validators;

use \Illuminate\Validation\Validator;
use Hash;

class HashValidator extends Validator {

    public function validateHash($attribute, $value, $parameters) {
        return Hash::check($value, $parameters[0]);
    }

    public function validatePassword($attribute, $value, $parameters)
    {
        return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,32}$/', $value);
    }

    public function validateLongitude($attribute, $value, $parameters)
    {
        // latitude and longitude must be in double

        return preg_match('/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $value);
    }

    public function validateLatitude($attribute, $value, $parameters)
    {
        // latitude and longitude must be in double

        return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?);[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $value);
    }
}