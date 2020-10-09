<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/email")
     */
    public function sendEmail(MailerInterface $mailer)
    {
        /*$participantEmails = $participantRepository->findAllEmail();

        foreach($participantEmails as $value){
            $email = $value;
        }*/

        $email = (new Email())
            ->from('c.bellod@codeur.online')
            ->to('acscape21@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Inscription à un Escape Game')
            ->html('<p>Vous êtes maintenant inscrit pour cet Escape Game pour le 14 juin 2020 à 13h30</p><p>Pour vous connectez à la platform vous devrez rentrer ce code : 1234</p>');

        $mailer->send($email);

    }
}
