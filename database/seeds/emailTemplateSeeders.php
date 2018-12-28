<?php

use Illuminate\Database\Seeder;

class emailTemplateSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Template for table header
         */
        $templateHeader = '<table class="body" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td>&nbsp;</td>
            <td class="container">
            <div class="content">
            <table class="main"><!-- START MAIN CONTENT AREA -->
                        <tbody>
                        <tr>
                            <td class="wrapper">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td>
';


        /**
         * Template for table footer
         */
        $templateFooter = '<p>Thank you!</p>
                                            <br>
                                            <p class="pull-right">Yours securely,<br>
                                                Team Ekbana</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <!-- END MAIN CONTENT AREA --></tbody>
                    </table>
                    <!-- START FOOTER -->
                    <div class="footer">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td class="content-block"><span class="apple-link">Ekbana</span></td>
                            </tr>
                            <tr>
                                <td class="content-block powered-by">Powered by Ekbana Pte. Ltd.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END FOOTER --> <!-- END CENTERED WHITE CONTAINER --></div>
            </td>
            <td>&nbsp;</td>
        </tr>
        </tbody>
    </table>
';

        $templates = [
            [
                'title' => ' Chatty User Email Verification',
                'code' => 'email_verification',
                'subject' => 'Email Verification',
                'type' => 'email',
                'template' => $templateHeader . '                         
                                            <p>Dear {{username}},</p>
                                            <p>Thank you for registering in our site. For a genuine user please activate our registration link.</p>
                                            <p>Registration Link : {{token}}</p>
                                            <p>If it wasn\'t you please ignore this message. Like always, if you have any questions please post your question on faq section.</p>                                            
' . $templateFooter
            ],
            [
                'title' => 'Forgot Password',
                'code' => 'forgot_password',
                'type' => 'email',
                'subject' => 'Forgot Password',
                'template' => $templateHeader . '          
                                    <p>Dear %username%,</p>
									<p>We got request for your password reset. Please activate through reset Link.</p>
									<p>Reset Link : <a href="%token%">Reset your password </a></p>
                                    <p>If it wasn\'t you please ignore this message. Like always, if you have any questions please post your question on faq section.</p>
                                            
' . $templateFooter
            ],
            [
                'title' => 'Phone Verification',
                'code' => 'verify_phone',
                'from' => 'noreply@ekbana.info',
                'type' => 'email',
                'subject' => 'Verify Phone',
                'template' => $templateHeader . '                
                                            <p>Dear {{username}},</p>
                                            <p>We got request to change your phone no. To update your phone number please use code given below.</p>
                                            <p>Verification Code : {{verification_code}}</p>
                                            <p>If it wasn\'t you please ignore this message. Like always, if you have any questions please post your question on faq section.</p>                                           
                ' . $templateFooter
            ],
            [
                'title' => 'CMS User Email Verification',
                'code' => 'cms_user_email_verification',
                'type' => 'email',
                'subject' => 'User Email Verification',
                'from' => 'info@chattyexchange.com',
                'template' => $templateHeader . '
                                            <p>Dear %user%,</p>
                                            <p>We got request to verify your account. To verify your account, visit the following link.</p>
                                            <p><a href="%verification_link%">Verify now </a></p>
                                            <p>If it wasn\'t you please ignore this message. Like always, if you have any questions please post your question on faq section.</p>                                           
                            ' . $templateFooter
            ],
            [
                'title' => 'Verification Code',
                'code' => 'two_way_verify',
                'type' => 'email',
                'subject' => 'User Verification Code',
                'from' => 'info@chattyexchange.com',
                'template' => $templateHeader . '
                                            <p>Dear %user%,</p>
                                            <p>Currently there is signin attempt on process from your account. This email is generated for you login verification.</p>
                                                <p>If you are attempting to sign-in, please use the following code to confirm your identity:</p>
                                            <p><strong>%code%</strong></p>
                                            <p>Here are the details of the sign-in attempt:<br>
                                                %signInDate%<br>
                                                Account: %user%<br>
                                                Region: %regionName%<br>
                                                City: %cityName%<br>
                                                Zip Code: %zipCode%<br>
                                                IP Address: %ip%<br>
                                                Browser: %browser%</p>
                                            <p>If this wasn’t you, please reset your password. Like always, if you have any questions please post your question on faq section.</p>
                                            
                            ' . $templateFooter
            ],
            [
                'title' => 'User Blocked',
                'code' => 'kill_switch_notification_blocked',
                'type' => 'email',
                'subject' => 'User Blocked',
                'from' => 'info@chattyexchange.com',
                'template' => $templateHeader . '
                                            <p>Dear admin,</p>
                                            <p>%user% is blocked for too many invalid attempts to change master kill switch.</p>                                                    
                            ' . $templateFooter
            ],
            [
                'title' => 'Two Way Verification',
                'code' => 'two_way_verification_email',
                'type' => 'email',
                'subject' => 'Verification',
                'from' => 'info@chattyexchange.com',
                'template' => $templateHeader . '
                                            <p>Dear %user%,</p>
                                           <p>Your verification code is:</p>
                                            <p><strong>%code%</strong></p>                                                  
                            ' . $templateFooter
            ],
            [
                'title' => 'Verification Code',
                'code' => 'verification_code',
                'type' => 'email',
                'subject' => 'Verification',
                'from' => 'info@ekbana.com',
                'template' => $templateHeader . '
                                             <p>Dear %user%</p>

                                            <p>Currently there is signin attempt on process from your account. This email is generated for you login verification.</p>
                                            
                                            <p>If you are attempting to sign-in, please use the following code to confirm your identity:</p>
                                            
                                            <p><strong>%code%</strong></p>
                                            
                                            
                                            <p>If this wasn’t you, please reset your password. Like always, if you have any questions please contact our team.</p>
                                            
                                            <p>Thank you!</p>
                                             
                                            
                                            <p>Yours securely,<br />
                                            Ek Team</p>
                                                                                        
                            ' . $templateFooter
            ]

        ];
        \App\EmailTemplate::truncate();

        foreach ($templates as $template) {
            \App\EmailTemplate::create($template);

        }


    }
}
