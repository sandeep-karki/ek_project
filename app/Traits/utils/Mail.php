<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 4/16/18
 * Time: 11:07 AM
 */

namespace App\Traits\utils;


use App\Util\MailCode;

trait Mail
{
    protected $mailData, $emailCode, $newMessage;

    /**
     * @return mixed
     */
    public function getMailData()
    {
        return $this->mailData;
    }

    /**
     * @param mixed $mailData
     */
    public function setMailData($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * @param mixed $emailCode
     */
    public function setEmailCode($emailCode)
    {
        $this->emailCode = $emailCode;
    }

    /**
     * @return mixed
     */
    public function getNewMessage()
    {
        return $this->newMessage;
    }

    /**
     * @param mixed $newMessage
     */
    public function setNewMessage($newMessage)
    {
        $this->newMessage = $newMessage;
    }

    /**
     *
     */
    public function configureMailData() {
        $replace = [];
        $with = [];

        if(!empty($this->getMailData())){
            $message = \DB::table(MailCode::TABLENAME)->where('code',$this->emailCode)->first();
            foreach ($this->getMailData() as $key => $value) {
                array_push($replace, $key);
                array_push($with, $value);
            }
            $message_body = $message->template;
            $newMessage = str_replace($replace, $with, $message_body);
            $this->setNewMessage($newMessage);
        }
    }

}