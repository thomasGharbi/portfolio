<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class EmailNotificationService
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig,
        private ParameterBagInterface $parameterBag
    ) {
    }

    public function notifyContact(Contact $contact): void
    {
        $email = (new Email())
            ->from($this->parameterBag->get('app.mail_from'))
            ->to($this->parameterBag->get('app.admin_mail_to'))
            ->subject('Nouveau message de contact')
            ->html($this->twig->render('emails/contact_notification.html.twig', [
                'contact' => $contact
            ]));

        $this->mailer->send($email);
    }
}
