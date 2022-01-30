<?php

declare(strict_types=1);

class Cart
{
    /**
     * @var Item[]
     */
    private $items;

    private const VAT = 0.20;

    /**
     * @param Item[] $items
     */
    public function __construct(
        array $items
    ) {
        $this->items = $items;
    }

    /**
     * @return float
     */
    public function getSumVat(): float
    {
        $vats = 0;

        foreach ($this->items as $item) {
            $vats += $item->getPrice() * self::VAT;
        }
 
        return $vats;
    }
    
    /**
     * @return int
     */
    public function getCount(): int
    {
        return count($this->items); 
    }

    public function printCartItems(): void
    {
        foreach($this->items as $item) {
           echo 'Товар: ' . $item->getName;
           echo ' по цене ' . $item->getPrice * (self::VAT + 1.0) . ' руб. (+ НДС)' . '<br>';    
        }
    }

     /**
     * @return float
     */
    public function getFinalPrice(): float
    {
        $finalPrice = 0;

        foreach ($this->items as $item) {
            $finalPrice += $item->getPrice() * ( cart::VAT + 1.0 );
        }

        return $finalPrice;
    }

    public function makeOrder(): void
    {
        $order = new Order($this->items, $this);

        $order->sendMail();
    }
}