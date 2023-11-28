<?php

// src/Controller/MailerController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/Contact', name: 'app_contact')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        // Données des emails directement dans le code
        $emails = [
            [
                "from" => "hello@example.com",
                "to" => "you@example.com",
                "subject" => "Time for Symfony Mailer!",
                "text" => "Sending emails is fun again!",
                "html" => "<p>See Twig integration for better HTML integration!</p>",
            ],
            // Ajoutez d'autres emails si nécessaire
        ];

        // Envoyer chaque email dans le tableau
        foreach ($emails as $emailData) {
            $email = (new Email())
                ->from($emailData['from'])
                ->to($emailData['to'])
                ->subject($emailData['subject'])
                ->text($emailData['text'])
                ->html($emailData['html']);

            $mailer->send($email);
        }

        return new Response('Emails sent successfully!');
    }
}
