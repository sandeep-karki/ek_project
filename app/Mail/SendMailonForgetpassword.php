<?php

namespace App\Mail;

use App\EmailTemplate;
use App\Util\MailCode;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Traits\utils\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailonForgetpassword extends Mailable
{
    use Queueable, SerializesModels, Mail;


    public $messages;
    public $app_url;
    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $token
     */
    /**
     * SendMailonForgetpassword constructor.
     * @param $user
     * @param $token
     */
    public function __construct($user,$token)
    {
        $this->token = $token;
        $this->user = $user;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->setMailData(['%username%' => $this->user->first_name, '%token%' => env('CMS_URL') . 'resetpassword/' . $this->token . '/' . $this->user->id]);
        $this->setEmailCode(MailCode::FORGOTPASSWORD);
        $this->configureMailData();
        return $this->view('mails.system.email_template')->with(['text' => $this->getNewMessage()]);

    }
}
