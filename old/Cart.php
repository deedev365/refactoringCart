<?php

interface iCart
{
    public function calcVat();
    public function notify();
    public function makeOrder();
}
  
class Cart implements iCart
{
    public $items;
    public $order;
 
    public function calcVat()
    {
        $vat = 0;
        foreach ($this->items as $item)
            $vat += $item->getPrice() * 0.20;
 
        return $vat;
    }
  
    public function notify()
    {
        $this->sendMail();
    }
  
    public function makeOrder()
    {
        $p = 0;
        foreach ($this->items as $item) {
            $p += $item->getPrice() * 1.20;
        }
        $this->order = new Order($this->items, $p);
        $this->sendMail();
    }
  
    public function sendMail()
    {
        $m = new SimpleMailer('cartuser', 'j049lj-01');
        $p = 0;
        foreach ($this->items as $item) {
            $p += $item->getPrice() * 1.20;
        }
        $ms = "<p>Оформлен новый заказ №<b>".$this->order->id().
            "</b> на сумму " . $p . " руб.</p>";
        $m->sendToManagers($ms);
    }
}