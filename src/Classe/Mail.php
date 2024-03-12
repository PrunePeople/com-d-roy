<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
 private $api_key = "8a3c8b2bbeddebf140e3c6096851aa76";
 private $api_secret = "8ba194ada32548fa0cb57fcdefa2260f";

    public function send($to_email, $to_name, $subject, $content)
    {
        $mj = new Client($this->api_key, $this->api_secret, true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
        [
            'From' => [
                'Email' => "damien39mail@gmail.com",
                'Name' => "Com D Roy"
            ],
            'To' => [
                [
                    'Email' => $to_email,
                    'Name' => $to_name
                ]
            ],
            'TemplateID' => 4872406,
            'TemplateLanguage' => true,
            'Subject' => $subject,
            'Variables' => [
                'content' => $content

            ]
        ]
    ]
];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
 }
}