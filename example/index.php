<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Book;

$books = [
    new Book(1, "哈利波特第一集", 100),
    new Book(2, "哈利波特第二集", 100),
    new Book(9, "其他書", 50)
];

$total = 0;

// 波特活動
$potterBookIds = [1, 2, 3, 4, 5];
foreach ($books as $key => $book) {
    if (in_array($book->bookId, $potterBookIds)) {
        $potterBooks[] = $book;
        unset($books[$key]);
    }
}

if (!empty($potterBooks)) {
    $total += totalWithCart('App\PotterShoppingCart', $potterBooks);
}

// 一般書
if(!empty($books)) {
    $total += totalWithCart('App\ShoppingCart', $books);
}

var_dump($total);

function totalWithCart($cartName, $books) {
    $cart = new $cartName();
    $cart->addBooksToCart($books);
    $cart->calculate();
    return $cart->total;
}






