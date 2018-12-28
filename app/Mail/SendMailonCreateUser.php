<?php

namespace App\Mail;

use App\Traits\utils\Mail;
use App\Util\MailCode;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailonCreateUser extends Mailable
{
    use Queueable, SerializesModels, Mail;

    /**
     * Create a new message instance.
     * @return void
     */

    public $token;
    public $user;

    public $template;

    public function __construct($user, $token)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        $this->setMailData(['%user%' => $this->user->first_name, '%verification_link%' => env('CMS_URL') . 'resetpassword/' . $this->token . '/' . $this->user->id]);
        $this->setEmailCode(MailCode::CMSUSERVERIFICATION);
        $this->configureMailData();
        return $this->view('mails.system.email_template')->with(['text' => $this->getNewMessage()]);
    }
}
