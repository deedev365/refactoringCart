<?php

declare(strict_types=1);

class Order
{
    /**
     * @var int
     */
    private $id = 1234567;

    /**
     * @var string
     */
    private $userEmail = 'client@mail.ru';

    /**
     * @var Item[]
     */
    private $items;

    /**
     * @var Cart
     */
    private $cart;

    /**
     * @param Item[] $items
     * @param Cart $cart
     */
    public function __construct(
        $items,
        Cart $cart   
    ) {
        $this->items = $items;
        $this->cart = $cart;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function sendMail()
    {
        $mailer = new Mailer($this, $this->cart);

        $mailer->sendMail();
    }          
}