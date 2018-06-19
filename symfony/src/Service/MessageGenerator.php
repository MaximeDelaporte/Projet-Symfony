<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/06/2018
 * Time: 11:26
 */

namespace App\Service;

class MessageGenerator
{
    public function getMessage()
    {
        $messages = [
            'You\'ve been disconnected',
        ];

        return $messages;
    }
}