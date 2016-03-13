<?php

namespace App;


class PotterShoppingCart
{
    public $books = [];
    public $total = 0;
    public $bookGroup = [];

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
            if (!in_array($book, $this->bookGroup)) {
                $this->bookGroup[] = $book;
            }

            $total += $book->price;
        }


        // 兩本不同的書
        if (2 == count($this->bookGroup)) {
            $total = $total * 0.95;
        }

        $this->total = $total;
    }
}
