<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class CustomValidationRule extends Validator
{

    public function validateOldpassword($attribute,$value,$parameters)
    {

        $password = Auth::guard('web')->user()->password;

        return Hash::check($value, $password);
    }


    public function validatePassword($attribute, $value, $parameters)
    {
        return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,32}$/', $value);
    }

    public function validatePhone($attribute, $value, $parameters)
    {
        // Phone number should start with number 0-9 and can have minus, plus
        // and braces.
        return preg_match("/^([0-9\s\-\+\(\)]*)$/", $value);
    }

    public function validateMobile($attribute, $value, $parameters)
    {
        // Mobile number can start with plus sign and should start with number
        // and can have minus sign and should be between 9 to 12 character long.
        return preg_match("/^\+?\d[0-9-]{9,12}/", $value);
    }

    public function validateLatitude($attribute, $value, $parameters)
    {
        // latitude and longitude must be in double

        return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?);[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $value);
    }

    public function validateLongitude($attribute, $value, $parameters)
    {
        // latitude and longitude must be in double

        return preg_match('/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?);[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/', $value);
    }


    public function validateName($attribute, $value, $parameters){
        return preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $value);
    }

    public function validateNospace($attribute, $value, $parameters){

        if(preg_match('/\s/',$value)){
            return false;
        }else{
            return true;
        }
    }
    public function validateJson($attribute, $value)
    {
        $filetype= $value->getClientOriginalExtension();

        if($filetype=='json')
        {
            return true;
        }
        else
        {
            return false;
        }
        return false;
    }



}