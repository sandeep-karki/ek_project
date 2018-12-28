<?php

namespace App\Services;
use Config;
use URL;
use Mail;
use Auth;
use App\Setting;

class MailService
{

    public function __construct(){
        $this->loginUrl = env('LOGINURL','ekbana.info');
    }

    // New Recruiters
    public function accountCreated($mailData){

        if(!empty($mailData)){
                    $fullName = $mailData['name'];
                    $email = $mailData['email'];
                    $url = "<a href='".$this->loginUrl."'>Login URL</a>";
                    $subject = 'An account has been created in Comlink App';
                    $message = \DB::table('email_templates')->where('title','login-credential')->first();
                    $message_body = $message->email_body;
                    $password = $this->randomPassword();


                    $rawurl = $this->loginUrl;
                    $replace = ['%name%','%email%','%password%','%url%','%rawurl%'];
                    $with = [$fullName,$email,$password,$url,$rawurl];
                    $newMessage = str_replace($replace, $with, $message_body);

                    $mailData['newMessage'] = $newMessage;
                    $mailData['fullName'] = ucfirst($fullName);
                    $mailData['email'] = $email;
                    $mailData['subject'] = $subject;

                    try{
                        $this->sendMail($mailData);
                        $jsonResponse['status'] = 200;
                        $jsonResponse['data'] = 'Email was successfully sent';
                    }
                    catch(Exception $e){
                        $jsonResponse['status'] = 101;
                        $jsonResponse['data'] = 'There was error while sending email.';
                    }
        }
        else{
            $jsonResponse['data'] = 'Data was not found';
        }
        return $jsonResponse;
    }



    public function sendMail($mailData){
        try{
            Mail::queue('email.send', $mailData, function($message) use ($mailData)
            {
                $message->from('admin@gocomlink.com' , 'Comlink');
                $message->to($mailData['email'], $mailData['fullName'])->subject($mailData['subject']);
            });
        }
        catch(Exception $e){
            $jsonResponse['data'] = 'There was error while sending email.';
            return $jsonResponse;
        }
    }

    public function randomPassword($length = 6, $add_dashes = false, $available_sets = 'luds') {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);

        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);

        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }


}
