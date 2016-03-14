<?php

namespace App;


class PotterShoppingCart implements Cart
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
            foreach ($this->bookGroup as &$group) {
                if (!in_array($book, $group)) {
                    $group[] = $book;
                    continue 2;
                }
            }
            $this->bookGroup[] = [$book];
        }


        // 兩本不同的書
        foreach ($this->bookGroup as $group) {
            switch (count($group)) {
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

            $groupTotal = 0;
            foreach ($group as $books) {
                $groupTotal += $book->price;
            }

            $total += $groupTotal * $discount;
        }


        $this->total = $total;
    }
}
