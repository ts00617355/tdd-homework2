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
        switch (count($this->bookGroup)) {
            case 2:
                $discount = 0.95;
                break;
            case 3:
                $discount = 0.9;
                break;
            case 4:
                $discount = 0.8;
                break;
            case 5:
                $discount = 0.75;
                break;
            default:
                $discount = 1;
        }

        $this->total = $total * $discount;
    }
}
