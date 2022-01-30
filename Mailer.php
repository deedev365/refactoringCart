<?php

declare(strict_types=1);

class Mailer
{
    /**
     * @var Order
     */
    private $order;

    /**
    * @param Order $order
    * @param Cart $cart
    */
    public function __construct(
        Order $order,
        Cart $cart
    ) {
        $this->order = $order;
        $this->cart = $cart;
    }

    public function sendMail()
    {
        $simpleMailer = new SimpleMailer();

        $emailBody = "<p>Оформлен новый заказ №<b>" . $this->order->getId();
        $emailBody .= "</b> на сумму " . $this->cart->getFinalPrice() . " руб.</p>";

        $userEmail = $this->order->getUserEmail();
        $simpleMailer->sendToManagers($userEmail, $emailBody);
    } 
}