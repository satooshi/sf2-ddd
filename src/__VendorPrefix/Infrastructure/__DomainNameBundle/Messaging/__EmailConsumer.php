<?php

namespace __VendorPrefix\Infrastructure\__DomainNameBundle\Messaging;

class __EmailConsumer
{
    private $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    public function onMessage($message)
    {
        // $message object contains subject, text body, html body, to, from, BCC, ...
        return $this->mailer->send($message);
    }
}
