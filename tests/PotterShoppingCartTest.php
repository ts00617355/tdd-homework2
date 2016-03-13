<?php

use App\Book;
use App\PotterShoppingCart;

class PotterShoppingCartTest extends PHPUnit_Framework_TestCase
{
    /**
     * Scenario: 第一集買了一本，其他都沒買，價格應為100*1=100元
     */
    public function test_buy_one_first_episode_of_Harry_Potter()
    {
        // arrange
        $book = new Book(1, "哈利波特第一集", 100);
        $cart = new PotterShoppingCart();
        $cart->addBooksToCart([$book]);

        //act
        $cart->calculate();
        $result = $cart->total;

        //assert
        $expected = 100;
        $this->assertEquals($expected, $result);
    }
}
