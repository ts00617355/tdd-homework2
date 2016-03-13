<?php

namespace App;


class PotterShoppingCart
{
    public $books = [];
    public $total = 0;

    /**
     * 加書到購物車
     * @param $books
     */
    public function addBooksToCart($books)
    {
        $this->books = array_merge($this->books, $books);
    }

    /**
     * 計算購物車總和
     *
     */
    public function calculate()
    {
        $total = 0;
        foreach ($this->books as $book) {
            $total += $book->price;
        }

        $this->total = $total;
    }
}
