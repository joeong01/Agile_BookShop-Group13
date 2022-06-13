<?php

namespace Tests\Unit;

use Tests\TestCase;

class StockLevelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_retreive_data()
    {
        
        $con = mysqli_connect("localhost", "root", "", "bookstore");

        $products = "SELECT book.ISBN_13, book.bookName, stock.stockLevel, category.categoryName FROM book JOIN stock ON book.ISBN_13 = stock.ISBN_13 JOIN category ON category.categoryID = book.bookCategory ";
        $products_run = mysqli_query($con, $products);
        $products_try = mysqli_fetch_array($products_run);

        if ($products_try > 0) {
            $boolean = true;
        } else {
            $boolean = false;
        }

        $this->assertTrue($boolean);
    }
}
