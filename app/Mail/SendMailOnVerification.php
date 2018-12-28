<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Traits\utils\Mail;
use App\Util\MailCode;


class SendMailOnVerification extends Mailable
{
    use Queueable, SerializesModels, Mail;

    /**
     * Create a new message instance.
     *
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
     *
     * @return $this
     */
    public function build()
    {
        $this->setMailData(['%user%' => $this->user->first_name, '%code%' =>  $this->token ]);
        $this->setEmailCode(MailCode::CMSUSERSECURITY);
        $this->configureMailData();
        return $this->view('mails.system.email_template')->with(['text' => $this->getNewMessage()]);
    }
}
