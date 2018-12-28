<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 3/9/18
 * Time: 11:36 AM
 */

namespace App\Util;


class MailCode
{
    const TABLENAME         = "email_templates";
    const TWOWAYAUTH        = 'two_way_verify';
    const ADDRESSCHANGE     = 'notify_address_change';
    const ADDRESSCHANGED    = 'notify_address_changed_success';
    const ADDRESSCHANGEVERIFICATION = 'address_change_verify';
    const ADDRESSCHANGEBLOCKED      = 'notify_address_blocked';
    const CMSUSERVERIFICATION       = 'cms_user_email_verification';
    const KILL_SWITCH_VERIFICATION_CODE     = 'kill_switch_verification_code';
    const KILL_SWITCH_NOTIFICATION_CHANGE   = 'kill_switch_notification_change';
    const KILL_SWITCH_NOTIFICATION_BLOCKED  = 'kill_switch_notification_blocked';
    const TWOWAYVERIFYEMAIL                 = 'two_way_verification_email';
    const CMSUSERSECURITY                   = 'verification_code';
    const FORGOTPASSWORD                    = 'forgot_password';

}