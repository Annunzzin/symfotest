<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 22/05/18
 * Time: 09:32
 */

namespace AppBundle\Mailer;

use Swift_Message;

class Mail
{

    public static function sendMail(){
        $message = Swift_Message::newInstance()->setSubject('hello')
            ->setFrom('nicolas.annunziata.1@gmail.com')
            ->setTo('nicolas.annunziata.1@gmail.com')
            ->setBody('relm');

        return $message;
    }


}