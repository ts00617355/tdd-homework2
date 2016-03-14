<?php
namespace App;

interface Cart
{
    /**
     * 加書到購物車
     * @param $books
     */
    public function addBooksToCart($books);

    /**
     * 計算購物車總和
     *
     */
    public function calculate();
}
