<?php

declare(strict_types=1);

class SimpleMailer
{
    private const LOGIN = 'cartuser';

    private const PASS = 'j049lj-01';

    private const SUBJECT = 'Новый заказ';

    /**
     * @param string $userEmail
     * @param string $emailBody
     */
    public function sendToManagers(string $userEmail, string $emailBody): void 
    {
        mail($userEmail, self::SUBJECT, $emailBody);
    }
}