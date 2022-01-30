<?php

declare(strict_types=1);

spl_autoload_register(function ($className) {
    include $className . '.php';
});

$item1 = new Item(1, 'Молоко', 100.5);
$item2 = new Item(2, 'Арбуз', 120.5);

$cart = new Cart([$item1, $item2]);

echo 'Сейчас в корзине у вас товаров: ' . $cart->getCount() . ' шт.'.'<hr>';
echo $cart->printCartItems() . '<hr>';

echo 'Финальная цена с НДС: ' . $cart->getFinalPrice() . ' руб.' . '<hr>';
echo 'Общая сумма НДС: ' . $cart->getSumVat() . ' руб.' . '<hr>';
echo 'Отправлено письмо клиенту!' . $cart->makeOrder();