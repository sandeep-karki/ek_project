<?php
namespace App\Services;
/**
 * Created by PhpStorm.
 * User: samina
 * Date: 12/14/16
 * Time: 5:18 PM
 */
class ConstantApiMessageService
{
    const NOUSERNAME = 'Username doesnot exist.';
    const JSONPARSEERROR = 'JSON parse error - Expecting property name at line 1 column 2 (char 1).';
    const MISSINGJSONDATA = 'Missing `data` Member at documents top level.' ;
    const VALIDJSONID = 'JSON API resource objects MUST have a valid id';
    const VALIDJSONTYPE = 'JSON API resource objects MUST have a valid type';
    const VALIDJSONATTRIBUTE = 'JSON API resource objects MUST have a valid attribute';
    const VALIDJSONLINK= 'JSON API resource objects MUST have a valid link';
    const NOTFOUNDPROFILEID = 'Profile id requested does not exist!';
    const INVALIDEMAILRESPONSE ='Email requested does not exist';
    const INVALIDTOKENRESPONSE ='Invalid Token provided';
    const FORGGOTPASSWORDMESSAGE = 'Forgot Password';
    const FORGOTPASSWORDRESPONSE = 'Thank you!.We have sent an activation link to your email.Please click the activation link provided to your email.';
    const TOKENINVALIDRESPONSE = 'Invalid Token';
    const EXPIREDTOKEN = 'The token you requested has been expired.Please request another token.';
    const PASSWORDCHANGED = 'Your Password has been changed sucessfully';
    const VALIDTOKEN = 'Valid Token';
    const GRANTYPERROR = 'Unsupported Grant Type';
    const SERVERERROR = 'Internal Server Error' ;
    const CLIENTYPERROR = 'Unsupported Client Type';
    const CLIENTYPERRORREQUIRED = 'Client type is required';
    const ADMINNOTAUTHORIZED = 'Admin cannot be added as employee!';
    const INVALIDCOMPANYCODE = 'Invalid company code!';
    const USERALREADYEXISTS = 'User already exists with this email!';
    const EMPLOYEENOTFOUND = 'Data not found!';
    const FILTERBTCOMPANY = 'Filter by company code is missing!';
    const FILTERBTCOMPANYMISSING = 'Company code is missing in relationship data!';
    const MAXQUOTAEXCEED = 'Maxmium quota exceeded, please buy our premium service for more quota!';
    const RELATIONIDERROR = "%s id missing";
    const RESOURCENOTFOUND = '%s not found';
    const NOTADMIN = 'Invalid credential!';
    const INVALID = '%s is invalid';
    const SUCCESS = '%s success';
    const INSUFFICIENTDATA = 'Data insufficient, 7 data required';
    const NOTFOUNDID = '%s of given id %s not found';
    const RESOURCEINUSE = "%s in use can't delete";
    const LOGINDENIED = "Login denied for the user";
    const QUOTAEXCEEDED = "%s quota exceeded";
}