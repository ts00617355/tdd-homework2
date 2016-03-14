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

    /**
     * Scenario: 第一集買了一本，第二集也買了一本，價格應為100*2*0.95=190
     */
    public function test_buy_1_first_episode_and_1_second_episode_of_Harry_Potter()
    {
        // arrange
        $books = [
            new Book(1, "哈利波特第一集", 100),
            new Book(2, "哈利波特第二集", 100)
        ];

        $cart = new PotterShoppingCart();
        $cart->addBooksToCart($books);

        //act
        $cart->calculate();
        $result = $cart->total;

        //assert
        $expected = 190;
        $this->assertEquals($expected, $result);
    }

    /**
     * Scenario: 一二三集各買了一本，價格應為100*3*0.9=270
     */
    public function test_buy_first_second_and_third_episode_of_Harry_Potter()
    {
        // arrange
        $books = [
            new Book(1, "哈利波特第一集", 100),
            new Book(2, "哈利波特第二集", 100),
            new Book(3, "哈利波特第三集", 100)
        ];

        $cart = new PotterShoppingCart();
        $cart->addBooksToCart($books);

        //act
        $cart->calculate();
        $result = $cart->total;

        //assert
        $expected = 270;
        $this->assertEquals($expected, $result);

    }

    /**
     * Scenario: 一二三四集各買了一本，價格應為100*4*0.8=320
     */
    public function test_buy_first_second_third_and_forth_episode_of_Harry_Potter()
    {
        // arrange
        $books = [
            new Book(1, "哈利波特第一集", 100),
            new Book(2, "哈利波特第二集", 100),
            new Book(3, "哈利波特第三集", 100),
            new Book(4, "哈利波特第四集", 100),
        ];

        $cart = new PotterShoppingCart();
        $cart->addBooksToCart($books);

        //act
        $cart->calculate();
        $result = $cart->total;

        //assert
        $expected = 320;
        $this->assertEquals($expected, $result);
    }

    /**
     * Scenario: 一次買了整套，一二三四五集各買了一本，價格應為100*5*0.75=375
     */
    public function test_buy_a_set_of_Harry_Potter()
    {
        // arrange
        $books = [
            new Book(1, "哈利波特第一集", 100),
            new Book(2, "哈利波特第二集", 100),
            new Book(3, "哈利波特第三集", 100),
            new Book(4, "哈利波特第四集", 100),
            new Book(5, "哈利波特第五集", 100),
        ];

        $cart = new PotterShoppingCart();
        $cart->addBooksToCart($books);

        //act
        $cart->calculate();
        $result = $cart->total;

        //assert
        $expected = 375;
        $this->assertEquals($expected, $result);
    }
}
