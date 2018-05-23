<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 22/05/18
 * Time: 14:21
 */

namespace AppBundle\Notification;


use AppBundle\Mailer\Mail;
use Swift_Mailer;
use Swift_SmtpTransport;

class ArtistListener
{

    public function onArtistCreated(ArtistNotifier $artistNotifier){

        /*$transport = (new Swift_SmtpT ransport('gmail', 25))
            ->setUsername('your username')
            ->setPassword('your password')
        ;
        $msg = Mail::sendMail();
        $mailer = new Swift_Mailer($transport);
        $result = $mailer->send($msg);*/

    }

}