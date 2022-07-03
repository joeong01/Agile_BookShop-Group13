<?php

namespace Tests\Unit;

use Tests\TestCase;

class PaymentHistoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */    
    public function test_retreive_data()
    {
        
        $con = mysqli_connect("localhost", "root", "", "bookstore");

        $products = "SELECT * FROM invoice where userID = 123";
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