<?php

namespace App;

class Book
{
    public $bookId;
    public $bookName;
    public $price;

    public function __construct($bookId, $bookName, $price)
    {
        $this->bookId = $bookId;
        $this->bookName = $bookName;
        $this->price = $price;
    }
}
